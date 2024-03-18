<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\LogHistori;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function index()
    {
        $belum_diverifikasi = Pendaftaran::where('status', 'Pending')->orderBy('id', 'desc')->paginate(4); // Ganti 10 dengan jumlah item per halaman yang diinginkan
        return view('back.belum_diverifikasi.index', compact('belum_diverifikasi'));
    }


    public function updateStatus(Request $request)
    {
        $pendaftaranId = $request->input('pendaftaran_id');
        $status = $request->input('status');
        // $blacklist = $request->input('blacklist');

        // Get the original data before the update
        $belum_diverifikasi = Pendaftaran::findOrFail($pendaftaranId);
        $oldData = $belum_diverifikasi->getOriginal();

        // Update the status in the database
        Pendaftaran::where('id', $pendaftaranId)->update(['status' => $status]);

        // Get the updated data after the update
        $updatedData = Pendaftaran::findOrFail($pendaftaranId)->getOriginal();

        // Log the histori
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Belum Verifikasi', $pendaftaranId, $loggedInUserId, json_encode($oldData), json_encode($updatedData));

        return response()->json(['message' => 'Status updated successfully']);
    }

    public function updateDetail(Request $request, $id)
    {
        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama_negara' => 'required',
            'bukti_tf_cf' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'nama_negara.required' => 'Nama negara Wajib diisi',
            'bukti_tf_cf.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'bukti_tf_cf.max' => 'Ukuran bukti_tf_cf tidak boleh lebih dari 2 MB',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $verifikasi = Pendaftaran::findOrFail($id);

        $input = $request->except(['_token', '_method','bayar_cf','bayar_refund_cf']); // Exclude unnecessary fields
       
 
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
            if ($verifikasi->bukti_tf_cf && file_exists(public_path('upload/verifikasi/' . $verifikasi->bukti_tf_cf))) {
                unlink(public_path('upload/bukti_tf_cf/' . $verifikasi->bukti_tf_cf));
            }

            $input['bukti_tf_cf'] = $imageName;
        }

  
   
        // Update verifikasi data di database
        $verifikasi->update($input);

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
        $belum_diverifikasi = Pendaftaran::where('id', $id)->first();


        return view('back.belum_diverifikasi.detail', compact('belum_diverifikasi'));
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
