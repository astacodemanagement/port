<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
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
        $faq = Faq::orderBy('id', 'desc')->get();
        return view('back.faq.index', compact('faq'));
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
            'pertanyaan' => 'required|unique:faq,pertanyaan',
            'compro' => 'required|in:1,2',
        ], [
            'pertanyaan.required' => 'Nama Faq Wajib diisi',
            'pertanyaan.unique' => 'Nama Faq sudah digunakan',
            'compro.required' => 'Pilih Compro',
            'compro.in' => 'Pilih Compro yang tersedia',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $input = $request->all();

        // Simpan data spp ke database menggunakan fill()
        $faq = new Faq();
        $faq->fill($input);
        $faq->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Faq', $faq->id, $loggedInUserId, null, json_encode($faq));


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
        $faq = Faq::findOrFail($id);
        return response()->json($faq);
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
            'pertanyaan' => 'required',
        ], [
            'pertanyaan.required' => 'Nama Faq Wajib diisi',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $faq = Faq::findOrFail($id);
        $oldData = $faq->getOriginal();

        $input = $request->all();
        $faq->update($input);


        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Faq', $faq->id, $loggedInUserId, json_encode($oldData), json_encode($faq));

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
        $faq = Faq::findOrFail($id);

        if (!$faq) {
            return response()->json(['message' => 'Data Faq not found'], 404);
        }

        $faq->delete();
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Delete', 'Faq', $id, $loggedInUserId, json_encode($faq), null);

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }




 







}
