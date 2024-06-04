<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\LogHistori;
use App\Models\Pendaftaran;
use App\Models\Seleksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KandidatController extends Controller
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
        $kandidat = Kandidat::orderBy('id', 'desc')->get();
        return view('back.kandidat.index', compact('kandidat'));
    }

    public function detail($id)
    {
         
        // Ambil detail kandidat beserta relasi yang diperlukan
        $detail_kandidat = Kandidat::with(['pendaftaran', 'pengalamanKerja', 'user'])->where('id', $id)->first();

        return view('back.kandidat.detail', compact('detail_kandidat'));
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
    public function edit($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        return response()->json($kandidat);
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
        $kandidat = Kandidat::findOrFail($id);

        // Ambil hanya bidang-bidang yang ditentukan dari permintaan
        $input = $request->all();
       

        // Update kandidat data di database
        $kandidat->update($input);

        if ($request->has('email')) {
            User::where('id', $kandidat->kandidat->user_id)->update([
                'email' => $request->email
            ]);
        }

        if ($request->has('password') && $request->password != null) {
            User::where('id', $kandidat->kandidat->user_id)->update([
                'password' => Hash::make($request->password)
            ]);
        }

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'Update Detail Verifikasi', $kandidat->id, $loggedInUserId, json_encode($kandidat->getOriginal()), json_encode($kandidat));

        return response()->json(['message' => 'Data Berhasil Diupdate']);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kandidat = Kandidat::find($id);

        if (!$kandidat) {
            return response()->json(['message' => 'Data kandidat not found'], 404);
        }

        // Periksa apakah NIK ada di tabel pendaftaran
        $nikExistsInPendaftaran = Pendaftaran::where('nik', $kandidat->nik)->exists();

        // Periksa apakah ID ada di tabel seleksi
        $idExistsInSeleksi = Seleksi::where('id', $kandidat->id)->exists();

        if ($nikExistsInPendaftaran || $idExistsInSeleksi) {
            return response()->json(['message' => 'Data kandidat tidak dapat dihapus karena NIK terkait ada di tabel pendaftaran atau ID terkait ada di tabel seleksi'], 422);
        }

        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldBuktiFileName = $kandidat->foto; // Nama file saja
        $oldBuktiPath = public_path('upload/foto/' . $oldBuktiFileName);

        if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
            unlink($oldBuktiPath);
        }

        $kandidat->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'kandidat', $id, $loggedInUserId, json_encode($kandidat), null);

        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }




    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus







}
