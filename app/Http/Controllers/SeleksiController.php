<?php

namespace App\Http\Controllers;

use App\Models\Seleksi;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SeleksiController extends Controller
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
        $seleksi = Seleksi::orderBy('id', 'desc')->get();
        return view('back.seleksi.index', compact('seleksi'));
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
            'judul' => 'required|unique:seleksi,judul',
        ], [
            'judul.required' => 'Nama Seleksi Wajib diisi',
            'judul.unique' => 'Nama Seleksi sudah digunakan',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $input = $request->all();

        // Simpan data spp ke database menggunakan fill()
        $seleksi = new Seleksi();
        $seleksi->fill($input);
        $seleksi->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Seleksi', $seleksi->id, $loggedInUserId, null, json_encode($seleksi));


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
        $seleksi = Seleksi::findOrFail($id);
        return response()->json($seleksi);
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
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
        ], [
            'judul.required' => 'Nama Seleksi Wajib diisi',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $seleksi = Seleksi::findOrFail($id);
        $oldData = $seleksi->getOriginal();

        $input = $request->all();
        $seleksi->update($input);


        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Seleksi', $seleksi->id, $loggedInUserId, json_encode($oldData), json_encode($seleksi));

        return response()->json(['message' => 'Data berhasil diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seleksi = Seleksi::findOrFail($id);

        if (!$seleksi) {
            return response()->json(['message' => 'Data Seleksi not found'], 404);
        }

        $seleksi->delete();
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Delete', 'Seleksi', $id, $loggedInUserId, json_encode($seleksi), null);

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }









    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus







}
