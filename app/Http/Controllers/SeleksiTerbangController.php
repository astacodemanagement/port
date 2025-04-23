<?php

namespace App\Http\Controllers;

use App\Models\Seleksi;
use App\Models\LogHistori;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SeleksiTerbangController extends Controller
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
        ->join('kategori_job', 'job.kategori_job_id', '=', 'kategori_job.id')
        ->join('negara', 'job.negara_id', '=', 'negara.id')
        ->join('pendaftaran', 'kandidat.pendaftaran_id', '=', 'pendaftaran.id') 
            ->where('seleksi.status', 'Terbang') // Menambahkan klausa where untuk status
            ->select(
                'seleksi.*',
                'kandidat.nama_lengkap',
                'kandidat.no_paspor',
                'kandidat.referensi',
                'kandidat.alamat',
                'kandidat.email',
                'kandidat.no_hp',
                'kandidat.tempat_lahir',
                'kandidat.tanggal_lahir',
                'kandidat.tanggal_lahir',
                'job.nama_job',
                'negara.nama_negara',
                'job.nama_perusahaan',
                'kategori_job.nama_kategori_job',
                'job.mitra',
                'kategori_job.urutan as kategori_urutan'
            )
            ->get();
    
        // Cetak hasil query ke konsol untuk diinspeksi
        \Illuminate\Support\Facades\Log::info('Query Result:', ['seleksi' => $seleksi]);
    
        $seleksi_group = $seleksi->groupBy('job_id');
    
        return view('back.seleksi_terbang.index', compact('seleksi', 'seleksi_group'));
    }
    
    public function detail($id)
    {
        // $seleksi = Seleksi::select('seleksi.*', 'job.nama_job as nama_job', 'kandidat.nama_lengkap as nama_lengkap')
        $seleksi_terbang = Seleksi::select('*')
            ->join('job', 'seleksi.job_id', '=', 'job.id')
            ->join('kandidat', 'seleksi.kandidat_id', '=', 'kandidat.id')
            ->where('seleksi.id', $id)
            ->first();

        return view('back.seleksi_terbang.detail', compact('seleksi_terbang'));
    }


     
    public function updateStatus(Request $request)
    {
        $seleksi_id = $request->input('id');
        $status = $request->input('status');
        $keterangan_seleksi_terbang = $request->input('keterangan_seleksi_terbang');
        $keterangan_batal = $request->input('keterangan_batal');

        // Get the original data before the update
        $seleksi = Seleksi::findOrFail($seleksi_id);
        $oldData = $seleksi->getOriginal();

        // Prepare update data based on status
        $updateData = [
            'status' => $status,
        ];

        if ($status === 'Batal') {
            // Untuk status Batal
            $updateData['tanggal_batal'] = Carbon::now()->toDateString();
            $updateData['keterangan_batal'] = $keterangan_batal;
        } else {
            // Untuk status Selesai Kontrak
            $updateData['tanggal_seleksi_terbang'] = Carbon::now()->toDateString();
            $updateData['keterangan_seleksi_terbang'] = $keterangan_seleksi_terbang;
            $updateData['tanggal_selesai_kontrak'] = Carbon::now()->toDateString();
        }

        // Update the status in the database
        Seleksi::where('id', $seleksi_id)->update($updateData);

        // Get the updated data after the update
        $updatedData = Seleksi::findOrFail($seleksi_id)->getOriginal();

        // Log the histori
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori(
            'Update', 
            'Seleksi Terbang', 
            $seleksi_id, 
            $loggedInUserId, 
            json_encode($oldData), 
            json_encode($updatedData)
        );

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
