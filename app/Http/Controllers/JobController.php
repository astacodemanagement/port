<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Fasilitas;
use App\Models\Galeri;
use App\Models\Gambar;
use App\Models\Job;
use App\Models\KategoriJob;
use App\Models\LogHistori;
use App\Models\Negara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Support\Facades\File;


class JobController extends Controller
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
        $job = Job::with('negara')->orderBy('id', 'desc')->get();
        return view('back.job.index', compact('job'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fasilitas = Fasilitas::all();  // Mengambil semua data fasilitas dari tabel
        return view('back.job.create', ['fasilitas' => $fasilitas]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'nama_job' => 'required',
            'nama_perusahaan' => 'required',
            'fasilitas_id' => 'required|array|min:1',
            // tambahkan validasi lain sesuai kebutuhan
        ]);
    
        // Mulai transaksi database
        DB::beginTransaction();
        try {
            // Simpan ke dalam tabel job dengan semua input yang diterima
            $jobData = $request->except('fasilitas_id'); // kecualikan fasilitas_id jika tidak ada dalam tabel job
            $job = Job::create($jobData);
    
            // Simpan ke dalam tabel benefit
            foreach ($request->fasilitas_id as $benefit) {
                Benefit::create([
                    'job_id' => $job->id,
                    'fasilitas_id' => $benefit,
                ]);
            }
    
            // Commit transaksi jika tidak ada kesalahan
            DB::commit();
    
            // Mendapatkan ID pengguna yang sedang login
            $loggedInUserId = Auth::id();
            // Simpan log histori untuk operasi Create dengan ruangan_id yang sedang login
            $this->simpanLogHistori('Create', 'Job', $job->id, $loggedInUserId, null, json_encode($job));
            return response()->json(['message' => 'Data berhasil disimpan'], 200);
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data' . $e->getMessage()], 500);
        }
    }
    



    public function uploadGambar(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:job,id',
            'nama_gambar' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $nama_gambar = $request->nama_gambar;
        $job_id = $request->job_id;

        // $gambarJob = Gambar::where('job_id', $job_id)->first();

        // Simpan gambar di dalam direktori 'public/upload/galeri/'
        $destinationPath = 'upload/gambar/';
        $imageName = time() . '_' . $gambar->getClientOriginalName();
        // $gambar->move(public_path($destinationPath), $imageName);

        $manager = new ImageManager(new Driver());
        // $image = $manager->read($gambar);
        $manager->read($gambar)->save($destinationPath . $imageName);
        $manager->read($gambar)->cover(300, 300)->save($destinationPath . 'thumb_300_' . $imageName);
        $manager->read($gambar)->cover(432, 132)->save($destinationPath . 'thumb_wrapper_' . $imageName);
        $manager->read($gambar)->cover(580, 500)->save($destinationPath . 'thumb_' . $imageName);

        // if ($gambarJob && $saveImg) {
        //     if (File::exists(public_path($destinationPath . $gambarJob->gambar))) {
        //         File::delete(public_path($destinationPath . $gambarJob->gambar));
        //     }
        //     if (File::exists(public_path($destinationPath .'thumb_300_' . $gambarJob->gambar))) {
        //         File::delete(public_path($destinationPath .'thumb_300_' . $gambarJob->gambar));
        //     }
        //     if (File::exists(public_path($destinationPath .'thumb_' . $gambarJob->gambar))) {
        //         File::delete(public_path($destinationPath .'thumb_' . $gambarJob->gambar));
        //     }

        //     $gambarJob->delete();
        // }


        // Simpan informasi gambar ke tabel gambar
        Gambar::create([
            'job_id' => $job_id,
            'nama_gambar' => $nama_gambar,
            'gambar' => $imageName,
        ]);

        return response()->json(['message' => 'Gambar berhasil diupload'], 200);
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
        // Muat relasi 'benefits' pada model 'Job'
        $data = Job::with('benefits')->where('id', $id)->first();
        $fasilitas = Fasilitas::all();
        $negara = Negara::all();
        $kategori_job = KategoriJob::all();
    
        return view('back.job.edit', compact('data', 'fasilitas', 'negara', 'kategori_job'));
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
            'nama_job' => 'required',
            'nama_perusahaan' => 'required',
            'mitra' => 'nullable',
            'tanggal_tutup' => 'nullable|date',
            'gaji' => 'required|numeric|min:6',
            'jenis_pembayaran' => 'required|in:Bulan,Jam',
            'estimasi_minimal' => 'required|numeric|min:6',
            'estimasi_maksimal' => 'required|numeric|min:6',
            'gaji_diterima' => 'required|in:Bersih,Kotor',
            'tanggal_kurs' => 'nullable|date',
            'nomimal_kurs' => 'nullable|numeric',
            'negara_id' => 'required|exists:negara,id',
            'kategori_job_id' => 'required|exists:kategori_job,id',
            'kontrak_kerja' => 'required',
            'jam_kerja' => 'required',
            'hari_kerja' => 'required',
            'cuti_kerja' => 'required',
            'masa_percobaan' => 'nullable',
            'mata_uang_gaji' => 'nullable',
            'kerja_lembur' => 'nullable',
            'bahasa' => 'nullable',
            'deskripsi' => 'nullable',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'tinggi_badan' => 'nullable|numeric',
            'berat_badan' => 'nullable|numeric',
            'rentang_usia' => 'nullable',
            'level_bahasa' => 'nullable',
            'pengalaman_kerja' => 'nullable',
            'paragraf_galeri' => 'nullable',
            'link_video' => 'nullable|url',
            'info_lain' => 'nullable',
            'disclaimer' => 'nullable',
            'fasilitas_id' => 'required|array|min:1',
        ], [
            'nama_job.required' => 'Nama Job Wajib diisi',
            'nama_perusahaan.required' => 'Nama Perusahaan Wajib diisi',
            'hari_kerja.required' => 'Hari kerja wajib diisi',
            'cuti_kerja.required' => 'Cuti kerja wajib diisi',
            'masa_percobaan.required' => 'Masa percobaan wajib diisi',
            'mata_uang_gaji.required' => 'Mata uang gaji wajib diisi',
            'kerja_lembur.required' => 'Kerja lembur wajib diisi',
            'bahasa.required' => 'Bahasa wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
            'tinggi_badan.required' => 'Tinggi badan wajib diisi',
            'tinggi_badan.numeric' => 'Tinggi badan harus berupa angka',
            'berat_badan.required' => 'Berat badan wajib diisi',
            'berat_badan.numeric' => 'Berat badan harus berupa angka',
            'rentang_usia.required' => 'Rentang usia wajib diisi',
            'level_bahasa.required' => 'Level bahasa wajib diisi',
            'pengalaman_kerja.required' => 'Pengalaman kerja wajib diisi',
            'disclaimer.required' => 'Disclaimer wajib diisi',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        try {
            $kategoriJob = Job::findOrFail($id);
            $oldData = $kategoriJob->getOriginal();
    
            // Update data
           
    
            $requestData = $request->only([
                'nama_job', 'nama_perusahaan', 'mitra', 'tanggal_tutup', 'gaji', 'jenis_pembayaran',
                'estimasi_minimal', 'estimasi_maksimal', 'gaji_diterima', 'tanggal_kurs', 'nomimal_kurs',
                'negara_id', 'kategori_job_id', 'kontrak_kerja', 'jam_kerja', 'hari_kerja', 'cuti_kerja',
                'masa_percobaan', 'mata_uang_gaji', 'kerja_lembur', 'bahasa', 'deskripsi', 'jenis_kelamin',
                'tinggi_badan', 'berat_badan', 'rentang_usia', 'level_bahasa', 'pengalaman_kerja', 'paragraf_galeri',
                'link_video', 'info_lain', 'disclaimer'
            ]);
            
            $kategoriJob->update($requestData);
            // send ke tabel benefit
            
            $benefit = Benefit::where('job_id', $id)->get();
            foreach ($request->fasilitas_id as $fasilitasId) {
                Benefit::updateOrCreate(
                    ['job_id' => $id, 'fasilitas_id' => $fasilitasId],
                    ['job_id' => $id, 'fasilitas_id' => $fasilitasId]
                );
            }
            $loggedInUserId = Auth::id();
            $this->simpanLogHistori('Update', 'Job', $kategoriJob->id, $loggedInUserId, json_encode($oldData), json_encode($kategoriJob));
    
            return response()->json(['message' => 'Data berhasil diupdate.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage()], 500);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Hapus data pada tabel benefit
        Benefit::where('job_id', $id)->delete();

        // Hapus data pada tabel gambar
        Gambar::where('job_id', $id)->delete();

        // Hapus file gambar pada folder public/upload/gambar/
        $gambar = Gambar::where('job_id', $id)->pluck('gambar')->first();
        if ($gambar) {
            $gambarPath = public_path($gambar);

            // Pastikan file ada sebelum dihapus
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
        }

        // Hapus data pada tabel job
        Job::destroy($id);

        return response()->json(['message' => 'Job berhasil dihapus beserta benefit dan gambar terkait'], 200);
    }


    public function getList()
    {
        $negaraList = Negara::all(['id', 'nama_negara']);
        return response()->json($negaraList);
    }

    public function getKategoriJobList()
    {
        $kategori_job_list = KategoriJob::all(['nama_kategori_job', 'id']);
        return response()->json($kategori_job_list);
    }

    // public function getKategoriJob()
    // {
    //     $kategoriJobList = KategoriJob::pluck('nama_kategori_job', 'id');
    //     return response()->json(['kategoriJobList' => $kategoriJobList]);
    // }
}