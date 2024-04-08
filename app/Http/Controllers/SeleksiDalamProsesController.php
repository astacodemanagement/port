<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\DetailBayar;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Seleksi;
use App\Models\LogHistori;
use App\Models\Pendaftaran;
use App\Models\RefundDetailBayar;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SeleksiDalamProsesController extends Controller
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
            ->where('seleksi.status', 'Dalam Proses') // Menambahkan klausa where untuk status
            ->select(
                'seleksi.*',
                'kandidat.nama_lengkap',
                'kandidat.no_paspor',
                'kandidat.referensi',
                'job.nama_job',
                'job.nama_negara',
                'job.nama_perusahaan',
                'job.nama_kategori_job',
                'job.mitra',
                'kategori_job.urutan as kategori_urutan'
            )
            ->get();
        $supplierList = Supplier::pluck('nama_supplier', 'id'); // Definisikan $supplierList di sini
    
        // Cetak hasil query ke konsol untuk diinspeksi
        \Illuminate\Support\Facades\Log::info('Query Result:', ['seleksi' => $seleksi]);
    
        $seleksi_group = $seleksi->groupBy('job_id');
    
        return view('back.seleksi_dalam_proses.index', compact('seleksi', 'seleksi_group','supplierList'));
    }
    

    public function detail($id)
    {
        $agency = Agency::orderBy('id', 'desc')->get();
        $employer = Employer::orderBy('id', 'desc')->get();
        $detail_bayar = DetailBayar::orderBy('id', 'desc')->get();
        $refund_detail_bayar = RefundDetailBayar::orderBy('id', 'desc')->get();
        $seleksi_dalam_proses = Seleksi::select(
                'seleksi.*',
                'job.nama_job as nama_job',
                'kandidat.nama_lengkap as nama_lengkap',
                'pendaftaran.*',
                'supplier.nama_supplier as nama_supplier' // tambahkan kolom nama_supplier
            )
            ->join('job', 'seleksi.job_id', '=', 'job.id')
            ->join('kandidat', 'seleksi.kandidat_id', '=', 'kandidat.id')
            ->join('pendaftaran', 'kandidat.nik', '=', 'pendaftaran.nik')
            ->leftJoin('supplier', 'seleksi.supplier_id', '=', 'supplier.id') // melakukan left join dengan tabel supplier
            ->where('seleksi.id', $id)
            ->first();
    
        // Load daftar pekerjaan
        $jobList = Job::pluck('nama_job', 'id');
    
        // Kirim nilai ID ke tampilan menggunakan compact
        return view('back.seleksi_dalam_proses.detail', compact('seleksi_dalam_proses', 'detail_bayar', 'refund_detail_bayar', 'id', 'jobList', 'agency', 'employer'));
    }
    
    public function getAgencyAlamat($id)
    {
        $agency = Agency::find($id);
        if ($agency) {
            return response()->json(['alamat' => $agency->alamat]);
        } else {
            return response()->json(['error' => 'Agency not found'], 404);
        }
    }

    // Metode untuk mengambil alamat employer berdasarkan ID
    public function getEmployerAlamat($id)
    {
        $employer = Employer::find($id);
        if ($employer) {
            return response()->json(['alamat' => $employer->alamat]);
        } else {
            return response()->json(['error' => 'Employer not found'], 404);
        }
    }



    public function updateStatus(Request $request)
    {
        $mik = $request->has('mik') ? true : false;
        $iktt = $request->has('iktt') ? true : false;
        $mjk = $request->has('mjk') ? true : false;
        $jak = $request->has('jak') ? true : false;
        $vt = $request->has('vt') ? true : false;
        $vd = $request->has('vd') ? true : false;
        $pap = $request->has('pap') ? true : false;


        $cek_kualifikasi_id = $request->input('id');
        $status = $request->input('status');
        $keterangan_dalam_proses = $request->input('keterangan_dalam_proses');
        $tanggal_ak = $request->input('tanggal_ak');
        $tanggal_validity = $request->input('tanggal_validity');
        $tanggal_terbit = $request->input('tanggal_terbit');
        $tanggal_habis = $request->input('tanggal_habis');
        $tanggal_berangkat = $request->input('tanggal_berangkat');
        $jam_terbang = $request->input('jam_terbang');
        $supplier_id = $request->input('supplier_id');
        $keterangan_dalam_proses = $request->input('keterangan_dalam_proses');


        // Get the original data before the update
        $cek_kualifikasi = Seleksi::findOrFail($cek_kualifikasi_id);
        $oldData = $cek_kualifikasi->getOriginal();

        // Update the status in the database
        Seleksi::where('id', $cek_kualifikasi_id)->update([
            'status' => $status,
            'tanggal_dalam_proses' => Carbon::now()->toDateString(),
            'keterangan_dalam_proses' => $keterangan_dalam_proses,
            'mik' => $mik,
            'iktt' => $iktt,
            'mjk' => $mjk,
            'jak' => $jak,
            'vt' => $vt,
            'vd' => $vd,
            'pap' => $pap,
            'tanggal_ak' => $tanggal_ak,
            'tanggal_validity' => $tanggal_validity,
            'tanggal_terbit' => $tanggal_terbit,
            'tanggal_habis' => $tanggal_habis,
            'tanggal_berangkat' => $tanggal_berangkat,
            'jam_terbang' => $jam_terbang,
            'supplier_id' => $supplier_id,
            'keterangan_dalam_proses' => $keterangan_dalam_proses,

        ]);

        // Get the updated data after the update
        $updatedData = Seleksi::findOrFail($cek_kualifikasi_id)->getOriginal();

        // Log the histori
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Lolos Kualifikasi', $cek_kualifikasi_id, $loggedInUserId, json_encode($oldData), json_encode($updatedData));

        return response()->json(['message' => 'Status updated successfully']);
    }


    public function updateDetail(Request $request, $id)
    {

        // Validasi request
        $validator = Validator::make($request->all(), [
            // 'tanggal_bayar' => 'required|date',
            'bukti_bayar' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            // 'tanggal_bayar.required' => 'Tanggal Bayar Wajib diisi',
            // 'tanggal_bayar.date' => 'Tanggal Bayar harus dalam format tanggal yang valid',
            'bukti_bayar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'bukti_bayar.max' => 'Ukuran bukti bayar tidak boleh lebih dari 2 MB',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Temukan seleksi berdasarkan ID
        $seleksi = Seleksi::findOrFail($id);

        // Tetapkan nilai atribut seleksi berdasarkan permintaan
        // $seleksi->biaya_penempatan = $request->biaya_penempatan;
        // $seleksi->biaya_id = $request->biaya_id;
        // $seleksi->biaya_mcu = $request->biaya_mcu;

        // Hapus karakter titik dan koma dari nilai total_biaya sebelum disimpan
        $seleksi->total_biaya = str_replace(['.', ','], '', $request->total_biaya);
        $seleksi->total_bayar = str_replace(['.', ','], '', $request->total_bayar);
        $seleksi->sisa_bayar = str_replace(['.', ','], '', $request->sisa_bayar);
        $seleksi->biaya_penempatan = str_replace(['.', ','], '', $request->biaya_penempatan);
        $seleksi->biaya_id = str_replace(['.', ','], '', $request->biaya_id);
        $seleksi->biaya_mcu = str_replace(['.', ','], '', $request->biaya_mcu);
        $seleksi->keterangan = $request->keterangan;
        $seleksi->id_ktkln = $request->id_ktkln;
        $seleksi->job_terselect = $request->job_terselect;
        $seleksi->gaji_akhir = str_replace(['.', ','], '', $request->gaji_akhir);
        $seleksi->employer_id = $request->employer_id;
        $seleksi->agency_id = $request->agency_id;
        $seleksi->durasi_kontrak = $request->durasi_kontrak;



        if ($request->hasFile('bukti_bayar')) {
            $image = $request->file('bukti_bayar');
            $destinationPath = 'upload/bukti_bayar/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);

            // Hapus file bukti_bayar lama jika ada
            if ($seleksi->bukti_bayar && file_exists(public_path('upload/bukti_bayar/' . $seleksi->bukti_bayar))) {
                unlink(public_path('upload/bukti_bayar/' . $seleksi->bukti_bayar));
            }

            $seleksi->bukti_bayar = $imageName;
        }

        // Update seleksi data di database
        $seleksi->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'Update Detail Verifikasi', $seleksi->id, $loggedInUserId, json_encode($seleksi->getOriginal()), json_encode($seleksi));

        return response()->json(['message' => 'Data Berhasil Diupdate']);
    }


    public function tambahPembayaran(Request $request)
    {
        // Ubah validasi pada controller menjadi 'tanggal_bayar'
        $validator = Validator::make($request->all(), [
            'tanggal_bayar' => 'required',
            'bukti_bayar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'tanggal_bayar.required' => 'Tanggal Pembayaran Wajib diisi', // Ubah pesan validasi
            'bukti_bayar.required' => 'Gambar Galeri Wajib diisi',
            'bukti_bayar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'bukti_bayar.max' => 'Ukuran bukti_bayar tidak boleh lebih dari 2 MB',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $seleksi_id = $request->input('seleksi_id');
        $tanggal_bayar = $request->input('tanggal_bayar');
        $jumlah_bayar = $request->input('jumlah_bayar');

        $input = [
            'seleksi_id' => $seleksi_id,
            'tanggal_bayar' => $tanggal_bayar,
            'jumlah_bayar' => str_replace(['.', ','], '', $jumlah_bayar)
        ];

        if ($request->hasFile('bukti_bayar')) {
            $image = $request->file('bukti_bayar');
            $destinationPath = 'upload/bukti_bayar/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['bukti_bayar'] = $imageName;
        }

        // Simpan data spp ke database menggunakan fill()
        $detail_bayar = new DetailBayar();
        $detail_bayar->fill($input);
        $detail_bayar->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Tambah Pembayaran', $detail_bayar->id, $loggedInUserId, null, json_encode($detail_bayar));

        return response()->json(['message' => 'Data Berhasil Disimpan']);
    }

    public function tambahPembayaranRefund(Request $request)
    {
        // Ubah validasi pada controller menjadi 'tanggal_bayar_refund'
        $validator = Validator::make($request->all(), [
            'tanggal_bayar_refund' => 'required',
            'bukti_bayar_refund' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'tanggal_bayar_refund.required' => 'Tanggal Pembayaran Wajib diisi', // Ubah pesan validasi
            'bukti_bayar_refund.required' => 'Gambar Galeri Wajib diisi',
            'bukti_bayar_refund.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'bukti_bayar_refund.max' => 'Ukuran bukti_bayar_refund tidak boleh lebih dari 2 MB',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $seleksi_id = $request->input('seleksi_id');
        $tanggal_bayar_refund = $request->input('tanggal_bayar_refund');
        $jumlah_bayar_refund = $request->input('jumlah_bayar_refund');

        $input = [
            'seleksi_id' => $seleksi_id,
            'tanggal_bayar_refund' => $tanggal_bayar_refund,
            'jumlah_bayar_refund' => str_replace(['.', ','], '', $jumlah_bayar_refund)
        ];

        if ($request->hasFile('bukti_bayar_refund')) {
            $image = $request->file('bukti_bayar_refund');
            $destinationPath = 'upload/bukti_bayar_refund/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['bukti_bayar_refund'] = $imageName;
        }

        // Simpan data spp ke database menggunakan fill()
        $detail_bayar_refund = new RefundDetailBayar();
        $detail_bayar_refund->fill($input);
        $detail_bayar_refund->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Tambah Refund Pembayaran', $detail_bayar_refund->id, $loggedInUserId, null, json_encode($detail_bayar_refund));

        return response()->json(['message' => 'Data Berhasil Disimpan']);
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
    public function delete($id)
    {
        $bukti_bayar = DetailBayar::find($id);

        if (!$bukti_bayar) {
            return response()->json(['message' => 'Data bukti_bayar not found'], 404);
        }

        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldBuktiFileName = $bukti_bayar->bukti_bayar; // Nama file saja
        $oldBuktiPath = public_path('upload/bukti_bayar/' . $oldBuktiFileName);

        if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
            unlink($oldBuktiPath);
        }

        $bukti_bayar->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'bukti_bayar', $id, $loggedInUserId, json_encode($bukti_bayar), null);


        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }


    public function destroy($id)
    {
        $bukti_bayar = DetailBayar::find($id);

        if (!$bukti_bayar) {
            return response()->json(['message' => 'Data bukti_bayar not found'], 404);
        }

        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldBuktiFileName = $bukti_bayar->bukti_bayar; // Nama file saja
        $oldBuktiPath = public_path('upload/bukti_bayar/' . $oldBuktiFileName);

        if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
            unlink($oldBuktiPath);
        }

        $bukti_bayar->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'bukti_bayar', $id, $loggedInUserId, json_encode($bukti_bayar), null);


        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }











    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus







}
