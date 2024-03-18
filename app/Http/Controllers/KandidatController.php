<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\LogHistori;
use App\Models\Pendaftaran;
use App\Models\Seleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $detail_kandidat = Kandidat::where('id', $id)->first();


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
        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama_kandidat' => 'required|unique:kandidat,nama_kandidat',
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'nama_kandidat.required' => 'Nama Kandidat Wajib diisi',
            'gambar.required' => 'Gambar Kandidat Wajib diisi',
            'nama_kandidat.unique' => 'Nama Kandidat sudah digunakan',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $input = $request->all();  // Pindahkan ini ke bawah validasi

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'upload/foto/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['gambar'] = $imageName;
        }

        // Simpan data spp ke database menggunakan fill()
        $kandidat = new Kandidat();
        $kandidat->fill($input);
        $kandidat->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Kandidat', $kandidat->id, $loggedInUserId, null, json_encode($kandidat));

        return response()->json(['message' => 'Data Berhasil Disimpan']);
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
        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama_kandidat' => 'required|unique:kandidat,nama_kandidat,' . $id,
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'nama_kandidat.required' => 'Nama Kandidat Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $kandidat = Kandidat::findOrFail($id);

        $input = $request->except(['_token', '_method']); // Exclude unnecessary fields

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'upload/foto/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);

            // Hapus file gambar lama jika ada
            if ($kandidat->gambar && file_exists(public_path('upload/foto/' . $kandidat->gambar))) {
                unlink(public_path('upload/foto/' . $kandidat->gambar));
            }

            $input['gambar'] = $imageName;
        }

        // Update kandidat data di database
        $kandidat->update($input);

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'Kandidat', $kandidat->id, $loggedInUserId, json_encode($kandidat->getOriginal()), json_encode($kandidat));

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
