<?php

namespace App\Http\Controllers;

use App\Models\Alasan;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AlasanController extends Controller
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
        $alasan = Alasan::orderBy('id', 'desc')->get();
        return view('back.alasan.index', compact('alasan'));
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
            'judul' => 'required|unique:alasan,judul',
        ], [
            'judul.required' => 'Nama Alasan Wajib diisi',
            'judul.unique' => 'Nama Alasan sudah digunakan',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $input = $request->all();

        // Simpan data spp ke database menggunakan fill()
        $alasan = new Alasan();
        $alasan->fill($input);
        $alasan->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Alasan', $alasan->id, $loggedInUserId, null, json_encode($alasan));


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
        $alasan = Alasan::findOrFail($id);
        return response()->json($alasan);
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
            'judul.required' => 'Nama Alasan Wajib diisi',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $alasan = Alasan::findOrFail($id);
        $oldData = $alasan->getOriginal();

        $input = $request->all();
        $alasan->update($input);


        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Alasan', $alasan->id, $loggedInUserId, json_encode($oldData), json_encode($alasan));

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
        $alasan = Alasan::findOrFail($id);

        if (!$alasan) {
            return response()->json(['message' => 'Data Alasan not found'], 404);
        }

        $alasan->delete();
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Delete', 'Alasan', $id, $loggedInUserId, json_encode($alasan), null);

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }









    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus







}
