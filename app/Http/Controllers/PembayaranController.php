<?php

namespace App\Http\Controllers;


use App\Models\LogHistori;
use App\Models\Seleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PembayaranController extends Controller
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
        $pembayaran = Seleksi::select('seleksi.*', 'pendaftaran.*') 
            ->join('kandidat', 'seleksi.kandidat_id', '=', 'kandidat.id') 
            ->join('pendaftaran', 'kandidat.nik', '=', 'pendaftaran.nik') 
            ->orderBy('seleksi.id', 'asc') // Mengurutkan berdasarkan id seleksi secara ascending
            ->get();
    
        return view('back.pembayaran.index', compact('pembayaran'));
    }

    public function penempatan()
    {
        $pembayaran = Seleksi::select('seleksi.*', 'pendaftaran.*') 
            ->join('kandidat', 'seleksi.kandidat_id', '=', 'kandidat.id') 
            ->join('pendaftaran', 'kandidat.nik', '=', 'pendaftaran.nik') 
            ->orderBy('seleksi.id', 'asc') // Mengurutkan berdasarkan id seleksi secara ascending
            ->get();
    
        return view('back.pembayaran.penempatan', compact('pembayaran'));
    }

    public function commitment_fee()
    {
        $pembayaran = Seleksi::select('seleksi.*', 'pendaftaran.*') 
            ->join('kandidat', 'seleksi.kandidat_id', '=', 'kandidat.id') 
            ->join('pendaftaran', 'kandidat.nik', '=', 'pendaftaran.nik') 
            ->orderBy('seleksi.id', 'asc') // Mengurutkan berdasarkan id seleksi secara ascending
            ->get();
    
        return view('back.pembayaran.commitment_fee', compact('pembayaran'));
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
            'nama_pembayaran' => 'required|unique:pembayaran,nama_pembayaran',

        ], [
            'nama_pembayaran.required' => 'Nama Pembayaran Wajib diisi',
            'nama_pembayaran.unique' => 'Nama Pembayaran sudah digunakan',

        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $input = $request->all();

        // Simpan data spp ke database menggunakan fill()
        $pembayaran = new Seleksi();
        $pembayaran->fill($input);
        $pembayaran->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Pembayaran', $pembayaran->id, $loggedInUserId, null, json_encode($pembayaran));


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
        $pembayaran = Seleksi::findOrFail($id);
        return response()->json($pembayaran);
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
            'nama_pembayaran' => 'required',

        ], [
            'nama_pembayaran.required' => 'Nama Pembayaran Wajib diisi',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $pembayaran = Seleksi::findOrFail($id);
        $oldData = $pembayaran->getOriginal();

        // Update data
        $pembayaran->update([
            'nama_pembayaran' => $request->nama_pembayaran,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
        ]);


        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Pembayaran', $pembayaran->id, $loggedInUserId, json_encode($oldData), json_encode($pembayaran));

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
        $pembayaran = Seleksi::findOrFail($id);

        if (!$pembayaran) {
            return response()->json(['message' => 'Data Pembayaran not found'], 404);
        }

        $pembayaran->delete();
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Delete', 'Pembayaran', $id, $loggedInUserId, json_encode($pembayaran), null);

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }









    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus







}
