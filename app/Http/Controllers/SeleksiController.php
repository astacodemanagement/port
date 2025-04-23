<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Seleksi;
use App\Models\LogHistori;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $seleksi = DB::table('seleksi')
            ->join('kandidat', 'seleksi.kandidat_id', '=', 'kandidat.id')
            ->join('job', 'seleksi.job_id', '=', 'job.id')
            ->join('negara', 'job.negara_id', '=', 'negara.id')
            ->join('kategori_job', 'job.kategori_job_id', '=', 'kategori_job.id', 'left')
            ->join('pendaftaran', 'kandidat.pendaftaran_id', '=', 'pendaftaran.id')  
            ->where('seleksi.status', 'Cek Kualifikasi')  
            ->select(
                'seleksi.*',
                'kandidat.nama_lengkap',
                'job.nama_job',
                'negara.nama_negara',
                'job.nama_perusahaan',
                'kategori_job.nama_kategori_job',
                'job.mitra',
                'kategori_job.urutan as kategori_urutan',
                'pendaftaran.bayar_cf'            )
            ->get();
    
        \Illuminate\Support\Facades\Log::info('Query Result:', ['seleksi' => $seleksi]);
    
        $seleksi_group = $seleksi->groupBy('job_id');
        // dd($seleksi_group);
    
        return view('back.seleksi.index', compact('seleksi', 'seleksi_group'));
    }
    



    public function updateStatus(Request $request)
    {
        $cek_kualifikasi_id = $request->input('id');
        $status = $request->input('status');

        $cek_kualifikasi = Seleksi::findOrFail($cek_kualifikasi_id);
        $oldData = $cek_kualifikasi->getOriginal();

        Seleksi::where('id', $cek_kualifikasi_id)->update([
            'status' => $status,
            'tanggal_cek_kualifikasi' => Carbon::now()->toDateString()
        ]);
        if($status = 'Batal'){
            Seleksi::where('id', $cek_kualifikasi_id)->update([
                'keterangan_batal' => $request->input('keterangan_batal')
            ]);
        }
        $updatedData = Seleksi::findOrFail($cek_kualifikasi_id)->getOriginal();

        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Cek Kualifikasi', $cek_kualifikasi_id, $loggedInUserId, json_encode($oldData), json_encode($updatedData));

        return response()->json(['message' => 'Status updated successfully']);
    }

    public function updateStatusMultiple(Request $request)
    {
        $selectedIds = $request->input('ids');
        $status = $request->input('status');


        if (empty($selectedIds)) {
            return response()->json(['message' => 'Tidak ada data yang dipilih untuk diperbarui.'], 422);
        }

        foreach ($selectedIds as $id) {
            Seleksi::where('id', $id)->update([
                'status' => $status,
                'tanggal_cek_kualifikasi' => Carbon::now()->toDateString()
            ]);

            $cek_kualifikasi = Seleksi::findOrFail($id);
            $loggedInUserId = Auth::id();
            $this->simpanLogHistori('Update', 'Cek Kualifikasi', $id, $loggedInUserId, json_encode($cek_kualifikasi->getOriginal()), json_encode($cek_kualifikasi));
        }

        return response()->json(['message' => 'Status berhasil diperbarui untuk semua data yang dipilih.']);
    }




    public function detail($id)
    {
       
        $seleksi = Seleksi::select(
            'seleksi.*',
            'job.nama_job as nama_job',
            'kandidat.nama_lengkap as nama_lengkap',
            'pendaftaran.*'
        )
            ->join('job', 'seleksi.job_id', '=', 'job.id')
            ->join('kandidat', 'seleksi.kandidat_id', '=', 'kandidat.id')
            ->join('pendaftaran', 'kandidat.pendaftaran_id', '=', 'pendaftaran.id')  
            ->where('seleksi.id', $id)
            ->first();
            
    
        return view('back.seleksi.detail', compact('seleksi', 'id'));
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
    public function edit($id)
    {
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









    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus







}
