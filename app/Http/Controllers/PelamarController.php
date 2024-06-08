<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\KategoriJob;
use App\Models\LogHistori;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PelamarController extends Controller
{
    private function simpanLogHistori($aksi, $tabelAsal, $idEntitas, $pengguna, $dataLama, $dataBaru)
    {
        $log = new LogHistori();
        $log->tabel_asal = $tabelAsal;
        $log->id_entitas = $idEntitas;
        $log->aksi = $aksi;
        $log->waktu = now(); // Menggunakan waktu saat ini
        $log->pengguna = $pengguna;
        $log->data_lama = $dataLama;
        $log->data_baru = $dataBaru;
        $log->save();
    }


    public function index(Request $request, $status)
    {
        $data['status'] = $status;
        $search = $request->input('search');

        if ($search) {
            $data['pelamar'] = Pendaftaran::where('status', $status)->with('kandidat')
                ->whereHas('kandidat', function ($query) use ($search) {
                    $query->where('provinsi', 'like', '%' . $search . '%');
                })
                ->orWhere('nama_lengkap', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc')->paginate(4);
        } else {
            $data['pelamar'] = Pendaftaran::where('status', $status)->orderBy('id', 'desc')->with('kandidat')->paginate(4);
        }
        // dd($data['pelamar']);
        $data['filter_job'] = $request->input('filter_job');
        if ($data["filter_job"]) {
            $data['pelamar'] = Pendaftaran::where('status', $status)
                ->where('kategori_job_id', $data['filter_job'])
                ->with('kandidat')
                ->orderBy('id', 'desc')->paginate(4);
        }
        $data['filter_gender'] = $request->input('filter_gender');
        if ($data["filter_gender"]) {
            $data['pelamar'] = Pendaftaran::where('status', $status)
                ->whereHas('kandidat', function ($query) use ($data) {
                    $query->where('jenis_kelamin', $data['filter_gender']);
                })
                ->with('kandidat')
                ->orderBy('id', 'desc')
                ->paginate(4);
        }
        $data['filter_height'] = $request->input('filter_height');
        if ($data["filter_height"]) {
            $data['pelamar'] = Pendaftaran::where('status', $status)
                ->whereHas('kandidat', function ($query) use ($data) {
                    $query->where('tinggi_badan', $data['filter_height']);
                })
                ->with('kandidat')
                ->orderBy('id', 'desc')
                ->paginate(4);
        }

        // dd($data);
        $data['kategori_job'] = KategoriJob::all();

        return view('back.pelamar.index', $data);
    }



    public function updateStatus(Request $request)
    {
        $pendaftaranId = $request->input('pendaftaran_id');
        $status = $request->input('status');
        // $blacklist = $request->input('blacklist');
        $alasan_reject = $request->input('alasan_reject');

        // Get the original data before the update
        $belum_diverifikasi = Pendaftaran::findOrFail($pendaftaranId);
        $oldData = $belum_diverifikasi->getOriginal();

        // Update the status in the database
        Pendaftaran::where('id', $pendaftaranId)->update([
            'status' => $status,
            'tanggal_reject_verifikasi' => Carbon::now()->toDateString(),
            'tanggal_sudah_verifikasi' => Carbon::now()->toDateString(),
            'tanggal_cek_verifikasi' => Carbon::now()->toDateString(),
            'alasan_reject' => $alasan_reject,

        ]);

        // Get the updated data after the update
        $updatedData = Pendaftaran::findOrFail($pendaftaranId)->getOriginal();

        // Log the histori
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Belum Verifikasi', $pendaftaranId, $loggedInUserId, json_encode($oldData), json_encode($updatedData));

        return response()->json(['message' => 'Status updated successfully']);
    }


    public function detail($id)
    {
        $data['belum_diverifikasi'] = Pendaftaran::where('id', $id)
            ->with(['kandidat', 'pengalamanKerja'])
            ->first();
        $data["user_id"] = $data['belum_diverifikasi']->kandidat->user_id;
        $data['user_info'] = User::where('id', $data["user_id"])->first();

        return view('back.belum_diverifikasi.detail', $data);
    }


    public function updateDetail(Request $request, $id)
    {
        $verifikasi = Pendaftaran::findOrFail($id);
        // update level bahasa inggris di tabel kandidat
        Kandidat::where('pendaftaran_id', $id)->first()->update([
            'level_bahasa_inggris' => $request->level_bahasa_inggris,
            'pic_level' => $request->pic_level,
            'catatan_level' => $request->catatan_level
        ]);
        $input = $request->only([
            'bayar_cf', 'bukti_tf_cf', 'tanggal_tf_cf',
            'status_paid_cf', 'tanggal_refund_cf', 'bayar_refund_cf', 'catatan_pembayaran_cf'
        ]);

        if ($request->has('bayar_cf')) {
            $input['bayar_cf'] = str_replace(',', '', $request->input('bayar_cf'));
        }

        if ($request->has('bayar_refund_cf')) {
            $input['bayar_refund_cf'] = str_replace(',', '', $request->input('bayar_refund_cf'));
        }

        if ($request->hasFile('bukti_tf_cf')) {
            $image = $request->file('bukti_tf_cf');
            $destinationPath = 'upload/bukti_tf_cf/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);

            // Hapus file bukti_tf_cf lama jika ada
            if ($verifikasi->bukti_tf_cf && file_exists(public_path('upload/bukti_tf_cf/' . $verifikasi->bukti_tf_cf))) {
                unlink(public_path('upload/bukti_tf_cf/' . $verifikasi->bukti_tf_cf));
            }

            $input['bukti_tf_cf'] = $imageName;
        }

        // Update verifikasi data di database
        $verifikasi->update($input);

        if ($request->has('email')) {
            User::where('id', $verifikasi->kandidat->user_id)->update([
                'email' => $request->email
            ]);
        }

        if ($request->has('password') && $request->password != null) {
            User::where('id', $verifikasi->kandidat->user_id)->update([
                'password' => Hash::make($request->password)
            ]);
        }

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'Update Detail Verifikasi', $verifikasi->id, $loggedInUserId, json_encode($verifikasi->getOriginal()), json_encode($verifikasi));

        return response()->json(['message' => 'Data Berhasil Diupdate']);
    }
}
