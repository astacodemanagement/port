<?php

namespace App\Http\Controllers;

use App\Models\KategoriJob;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KategoriJobController extends Controller
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
        $kategori_job = KategoriJob::orderBy('id', 'desc')->get();
        return view('back.kategori_job.index', compact('kategori_job'));
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
            'nama_kategori_job' => 'required|unique:kategori_job,nama_kategori_job',
            'urutan' => 'required|numeric',
        ], [
            'nama_kategori_job.required' => 'Nama Kategori Wajib diisi',
            'nama_kategori_job.unique' => 'Nama Kategori sudah digunakan',
            'urutan.required' => 'Urutan Wajib diisi',
            'urutan.numeric' => 'Urutan harus berupa angka',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $input = $request->all();

        // Simpan data spp ke database menggunakan fill()
        $kategori_job = new KategoriJob();
        $kategori_job->fill($input);
        $kategori_job->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Kategori Job', $kategori_job->id, $loggedInUserId, null, json_encode($kategori_job));


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
        $kategori_job = KategoriJob::findOrFail($id);
        return response()->json($kategori_job);
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
            'nama_kategori_job' => 'required',
            'urutan' => 'required|numeric',
        ], [
            'nama_kategori_job.required' => 'Nama Kategori Wajib diisi',
            'urutan.required' => 'Urutan Wajib diisi',
            'urutan.numeric' => 'Urutan harus berupa angka',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $kategoriJob = KategoriJob::findOrFail($id);
        $oldData = $kategoriJob->getOriginal();

        // Update data
        $kategoriJob->update([
            'nama_kategori_job' => $request->nama_kategori_job,
            'urutan' => $request->urutan,
        ]);


        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Kategori Job', $kategoriJob->id, $loggedInUserId, json_encode($oldData), json_encode($kategoriJob));

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
        $kategoriJob = KategoriJob::findOrFail($id);
            
        if (!$kategoriJob) {
            return response()->json(['message' => 'Data Kategori Job not found'], 404);
        }

        $kategoriJob->delete();
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Delete', 'Kategori Job', $id, $loggedInUserId, json_encode($kategoriJob), null);

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

  

   

  
 
   

    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
  






}
