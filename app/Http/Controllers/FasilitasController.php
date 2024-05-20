<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FasilitasController extends Controller
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
        $fasilitas = Fasilitas::orderBy('id', 'desc')->get();
        return view('back.fasilitas.index', compact('fasilitas'));
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
            'nama_fasilitas' => 'required|unique:fasilitas,nama_fasilitas',
            
        ], [
            'nama_fasilitas.required' => 'Nama Fasilitas Wajib diisi',
            'nama_fasilitas.unique' => 'Nama Fasilitas sudah digunakan',
           
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $input = $request->all();

        // Simpan data spp ke database menggunakan fill()
        $fasilitas = new Fasilitas();
        $fasilitas->fill($input);
        $fasilitas->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Fasilitas', $fasilitas->id, $loggedInUserId, null, json_encode($fasilitas));


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
        $fasilitas = Fasilitas::findOrFail($id);
        return response()->json($fasilitas);
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
            'nama_fasilitas' => 'required',
           
        ], [
            'nama_fasilitas.required' => 'Nama Fasilitas Wajib diisi',
            
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $kategoriJob = Fasilitas::findOrFail($id);
        $oldData = $kategoriJob->getOriginal();

        // Update data
        $kategoriJob->update([
            'nama_fasilitas' => $request->nama_fasilitas,
            'keterangan' => $request->keterangan,
        ]);


        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Fasilitas', $kategoriJob->id, $loggedInUserId, json_encode($oldData), json_encode($kategoriJob));

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
        $kategoriJob = Fasilitas::findOrFail($id);
            
        if (!$kategoriJob) {
            return response()->json(['message' => 'Data Fasilitas not found'], 404);
        }

        $kategoriJob->delete();
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Delete', 'Fasilitas', $id, $loggedInUserId, json_encode($kategoriJob), null);

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

  

   

  
 
   

    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
  






}
