<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\KategoriJob;
use App\Models\Pendaftaran;
use App\Models\LogHistori;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class BelumVerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    
    public function index(Request $request)
{
    // Ambil input filter dan search dari request
    $search = $request->input('search');
    $filter_job = $request->input('filter_job');
    $filter_gender = $request->input('filter_gender');
    $filter_height = $request->input('filter_height');

    // Inisialisasi query untuk pendaftaran yang belum diverifikasi
    $query = Pendaftaran::where('status', 'Belum Verifikasi(Pending)')->with('kandidat');

    // Filter berdasarkan pencarian
    if ($search) {
        $query->whereHas('kandidat', function ($q) use ($search) {
            $q->where('nama_lengkap', 'like', '%' . $search . '%');
        });
    }

    // Filter berdasarkan kategori pekerjaan
    if ($filter_job) {
        $query->where('kategori_job_id', $filter_job);
    }

    // Filter berdasarkan jenis kelamin
    if ($filter_gender) {
        $query->whereHas('kandidat', function ($q) use ($filter_gender) {
            $q->where('jenis_kelamin', $filter_gender);
        });
    }

    // Filter berdasarkan tinggi badan
    if ($filter_height) {
        $query->whereHas('kandidat', function ($q) use ($filter_height) {
            $q->where('tinggi_badan', $filter_height);
        });
    }

    // Urutkan dan paginasi hasilnya
    $belum_diverifikasi = $query->orderBy('id', 'desc')->paginate(4);

    // Ambil semua kategori pekerjaan
    $kategori_job = KategoriJob::all();

    return view('back.belum_diverifikasi.index', compact('belum_diverifikasi', 'search', 'kategori_job', 'filter_job', 'filter_gender', 'filter_height'));
}



public function updateStatus(Request $request)
{
    $pendaftaranId = $request->input('pendaftaran_id');
    $status = $request->input('status');
    $alasan_reject = $request->input('alasan_reject');

    // Mulai transaksi database
    DB::beginTransaction();

    try {
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

        // Update the status in the kandidat table
        Kandidat::where('pendaftaran_id', $pendaftaranId)->update([
            'status' => $status,
        ]);

        // Get the updated data after the update
        $updatedData = Pendaftaran::findOrFail($pendaftaranId)->getOriginal();

        // Log the histori
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Belum Verifikasi', $pendaftaranId, $loggedInUserId, json_encode($oldData), json_encode($updatedData));

        // Commit transaksi
        DB::commit();

        return response()->json(['message' => 'Status updated successfully']);
    } catch (\Exception $e) {
        // Jika ada kesalahan, rollback transaksi
        DB::rollBack();

        return response()->json(['message' => 'Failed to update status', 'error' => $e->getMessage()], 500);
    }
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
            'status_paid_cf', 'tanggal_refund_cf', 'bayar_refund_cf'
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




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data['belum_diverifikasi'] = Pendaftaran::where('id', $id)
            ->with(['kandidat', 'pengalamanKerja'])
            ->first();
        $data["user_id"] = $data['belum_diverifikasi']->kandidat->user_id;
        $data['user_info'] = User::where('id', $data["user_id"])->first();
         
        return view('back.belum_diverifikasi.detail', $data);
    }
    

    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
