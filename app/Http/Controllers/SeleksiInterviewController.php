<?php

namespace App\Http\Controllers;

use App\Models\Seleksi;
use App\Models\LogHistori;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SeleksiInterviewController extends Controller
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
            ->where('seleksi.status', 'Interview')  
            ->select(
                'seleksi.*',
                'kandidat.nama_lengkap',
                'job.nama_job',
                'negara.nama_negara',
                'job.nama_perusahaan',
                'kategori_job.nama_kategori_job',
                'job.mitra',
                'kategori_job.urutan as kategori_urutan',

                'pendaftaran.bayar_cf'            
                )
            ->get();
    
        // Cetak hasil query ke konsol untuk diinspeksi
        \Illuminate\Support\Facades\Log::info('Query Result:', ['seleksi' => $seleksi]);
    
        $seleksi_group = $seleksi->groupBy('job_id');
        // dd($seleksi_group);
    
        return view('back.seleksi_interview.index', compact('seleksi', 'seleksi_group'));
    }
    

     
    public function updateStatus(Request $request)
    {
        $cek_kualifikasi_id = $request->input('id');
        $status = $request->input('status');
        $keterangan_dari_interview = $request->input('keterangan_dari_interview');
        $keterangan_batal = $request->input('keterangan_batal');

        // Get the original data before the update
        $cek_kualifikasi = Seleksi::findOrFail($cek_kualifikasi_id);
        $oldData = $cek_kualifikasi->getOriginal();

        // Prepare update data based on selected status
        $updateData = [
            'status' => $status,
        ];

        if ($status === 'Batal') {
            $updateData['tanggal_batal'] = Carbon::now()->toDateString();
            $updateData['keterangan_batal'] = $keterangan_batal;
        } else {
            $updateData['tanggal_dari_interview'] = Carbon::now()->toDateString();
            $updateData['keterangan_dari_interview'] = $keterangan_dari_interview;
        }

        // Update the status in the database
        Seleksi::where('id', $cek_kualifikasi_id)->update($updateData);

        // Get the updated data after the update
        $updatedData = Seleksi::findOrFail($cek_kualifikasi_id)->getOriginal();

        // Log the histori
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Interview', $cek_kualifikasi_id, $loggedInUserId, json_encode($oldData), json_encode($updatedData));

        return response()->json(['message' => 'Status updated successfully']);
    }

    public function updateStatusMultiple(Request $request)
    {
        // Mengambil ID dari baris tabel yang dipilih
        $selectedIds = $request->input('ids');
        $status = $request->input('status');
        $keterangan_dari_interview = $request->input('keterangan');
        $keterangan_batal = $request->input('keterangan_multiple_batal');

        // Memastikan minimal satu ID dipilih
        if (empty($selectedIds)) {
            return response()->json(['message' => 'Tidak ada data yang dipilih untuk diperbarui.'], 422);
        }

        // Update status untuk setiap ID yang dipilih
        foreach ($selectedIds as $id) {
            // Prepare update data based on selected status
            $updateData = [
                'status' => $status,
            ];

            if ($status === 'Batal') {
                $updateData['tanggal_batal'] = Carbon::now()->toDateString();
                $updateData['keterangan_batal'] = $keterangan_batal;
            } else {
                $updateData['tanggal_dari_interview'] = Carbon::now()->toDateString();
                $updateData['keterangan_dari_interview'] = $keterangan_dari_interview;
            }

            Seleksi::where('id', $id)->update($updateData);

            // Log histori untuk setiap ID yang diperbarui
            $cek_kualifikasi = Seleksi::findOrFail($id);
            $loggedInUserId = Auth::id();
            $this->simpanLogHistori('Update', 'Interview', $id, $loggedInUserId, json_encode($cek_kualifikasi->getOriginal()), json_encode($cek_kualifikasi));
        }

        return response()->json(['message' => 'Status berhasil diperbarui untuk semua data yang dipilih.']);
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

}
