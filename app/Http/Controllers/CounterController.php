<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CounterController extends Controller
{
    protected $validator;

    public function __construct()
    {
        // Define validation rules and messages
        $this->validator = Validator::make([], [
            'nama' => 'required',
            'jumlah' => 'required|numeric',
            'urutan' => 'required|numeric',
            'compro' => 'required|in:1,2',
        ], [
            'nama.required' => 'Nama Slider Wajib diisi',
            'jumlah.required' => 'Jumlah Slider Wajib diisi',
            'jumlah.numeric' => 'Jumlah Slider harus berupa angka',
            'urutan.required' => 'Urutan Slider Wajib diisi',

            'urutan.numeric' => 'Urutan Slider harus berupa angka',
            'compro.required' => 'Pilih salah satu dari pilihan yang tersedia',
            'compro.in' => 'Pilihan yang dipilih tidak valid, opsinya hanya PSI atau AK AMA',
        ]);
    }
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['counter'] = Counter::orderBy('id', 'desc')->get();
        return view('back.counter.index', $data);
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
        $validator = Validator::make($request->all(), $this->validator->getRules(), $this->validator->getMessageBag()->toArray());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Counter::create($request->all());
        $loggedInUserId = Auth::id();
        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Counter', $request->id, $loggedInUserId, null, json_encode($request->all()));
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
        $counter = Counter::findOrFail($id);
        return response()->json($counter);
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
        $validator = Validator::make($request->all(), $this->validator->getRules(), $this->validator->getMessageBag()->toArray());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $counter = Counter::findOrFail($id);
        $counter->update($request->all());
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'Slider', $counter->id, $loggedInUserId, json_encode($counter), json_encode($request->all()));

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
        Counter::destroy($id);
        $loggedInUserId = Auth::id();

        $this->simpanLogHistori('Delete', 'Slider', $id, $loggedInUserId, null, null);

        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
}
