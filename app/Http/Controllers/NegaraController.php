<?php

namespace App\Http\Controllers;

use App\Models\Negara;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NegaraController extends Controller
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
        $negara = Negara::orderBy('id', 'desc')->get();
        return view('back.negara.index', compact('negara'));
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
        // dd($request->all());

        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama_negara' => 'required|unique:negara,nama_negara',
            'kode_negara' => 'required',
        ], [
            'nama_negara.required' => 'Nama Negara Wajib diisi',
            'nama_negara.unique' => 'Nama Negara sudah digunakan',
            'kode_negara.required' => 'Kode Negara Wajib diisi',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $input = $request->all();
        // handle logo
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $destinationPath = 'upload/negara/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['logo'] = $imageName;
        }
        Negara::create($input);

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Negara', $request->id, $loggedInUserId, null, json_encode($input));


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
        $negara = Negara::findOrFail($id);
        return response()->json($negara);
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
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama_negara' => 'required',
            'kode_negara' => 'required',
        ], [
            'nama_negara.required' => 'Nama Negara Wajib diisi',
            'kode_negara.required' => 'Kode Negara Wajib diisi',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $kategoriJob = Negara::findOrFail($id);
        $oldData = $kategoriJob->getOriginal();

        // handle logo
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $destinationPath = 'upload/negara/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);

            // Hapus file logo lama jika ada
            if ($kategoriJob->logo && file_exists(public_path('upload/negara/' . $kategoriJob->logo))) {
                unlink(public_path('upload/negara/' . $kategoriJob->logo));
            }

            $kategoriJob->logo = $imageName;
        }
        // Update data
        $kategoriJob->update([
            'logo' =>  $imageName,
            'nama_negara' => $request->nama_negara,
            'kode_negara' => $request->kode_negara,
        ]);


        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Negara', $kategoriJob->id, $loggedInUserId, json_encode($oldData), json_encode($kategoriJob));

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
        $kategoriJob = Negara::findOrFail($id);
            
        if (!$kategoriJob) {
            return response()->json(['message' => 'Data Negara not found'], 404);
        }

        $kategoriJob->delete();
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Delete', 'Negara', $id, $loggedInUserId, json_encode($kategoriJob), null);

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

  

   

  
 
   

    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
  






}
