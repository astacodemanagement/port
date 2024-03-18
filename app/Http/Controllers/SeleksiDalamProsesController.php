<?php

namespace App\Http\Controllers;

use App\Models\DetailBayar;
use App\Models\Seleksi;
use App\Models\LogHistori;
use App\Models\Pendaftaran;
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

        // Cetak hasil query ke konsol untuk diinspeksi
        \Illuminate\Support\Facades\Log::info('Query Result:', ['seleksi' => $seleksi]);

        $seleksi_group = $seleksi->groupBy('job_id');

        return view('back.seleksi_dalam_proses.index', compact('seleksi', 'seleksi_group'));
    }

    public function detail($id)
    {
        // $seleksi = Seleksi::select('seleksi.*', 'job.nama_job as nama_job', 'kandidat.nama_lengkap as nama_lengkap')
        $seleksi_dalam_proses = Seleksi::select('*')
            ->join('job', 'seleksi.job_id', '=', 'job.id')
            ->join('kandidat', 'seleksi.kandidat_id', '=', 'kandidat.id')
            ->where('seleksi.id', $id)
            ->first();

        return view('back.seleksi_dalam_proses.detail', compact('seleksi_dalam_proses'));
    }



    public function updateStatus(Request $request)
    {
        $cek_kualifikasi_id = $request->input('id');
        $status = $request->input('status');
        $keterangan_dalam_proses = $request->input('keterangan_dalam_proses');


        // Get the original data before the update
        $cek_kualifikasi = Seleksi::findOrFail($cek_kualifikasi_id);
        $oldData = $cek_kualifikasi->getOriginal();

        // Update the status in the database
        Seleksi::where('id', $cek_kualifikasi_id)->update([
            'status' => $status,
            'tanggal_dalam_proses' => Carbon::now()->toDateString(),
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
        $seleksi->biaya_penempatan = $request->biaya_penempatan;
        $seleksi->biaya_id = $request->biaya_id;
        $seleksi->biaya_mcu = $request->biaya_mcu;

        // Hapus karakter titik dan koma dari nilai total_biaya sebelum disimpan
        $seleksi->total_biaya = str_replace(['.', ','], '', $request->total_biaya);

        $seleksi->total_bayar = $request->total_bayar;
        $seleksi->sisa_bayar = $request->sisa_bayar;

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

        $input = $request->all();  // Pindahkan ini ke bawah validasi

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
