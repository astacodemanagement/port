<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 

class BelumVerifikasiController extends Controller
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
        $belum_diverifikasi = Pendaftaran::where('status', 'Pending')->orderBy('id', 'desc')->paginate(4); // Ganti 10 dengan jumlah item per halaman yang diinginkan
        return view('back.belum_diverifikasi.index', compact('belum_diverifikasi'));
    }
    

    public function updateStatus(Request $request)
    {
        $pendaftaranId = $request->input('pendaftaran_id');
        $status = $request->input('status');

        // Get the original data before the update
        $belum_diverifikasi = Pendaftaran::findOrFail($pendaftaranId);
        $oldData = $belum_diverifikasi->getOriginal();

        // Update the status in the database
        Pendaftaran::where('id', $pendaftaranId)->update(['status' => $status]);

        // Get the updated data after the update
        $updatedData = Pendaftaran::findOrFail($pendaftaranId)->getOriginal();

        // Log the histori
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Belum Verifikasi', $pendaftaranId, $loggedInUserId, json_encode($oldData), json_encode($updatedData));

        return response()->json(['message' => 'Status updated successfully']);
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
    public function detail($id)
    {
        $belum_diverifikasi = Pendaftaran::where('id', $id)->first();
       
    
        return view('back.belum_diverifikasi.detail', compact('belum_diverifikasi'));
    }

    public function edit($id)
    {
        $belum_diverifikasi = Pendaftaran::where('id', $id)->first();
       
    
        return view('back.belum_diverifikasi.detail', compact('belum_diverifikasi'));
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
    }
}
