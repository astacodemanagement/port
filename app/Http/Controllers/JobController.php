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
        $job = Job::orderBy('id', 'desc')->get();
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
            'negara_id' => 'required|exists:negara,id',
        ]);

        // Dapatkan nama_negara dari input hidden
        $namaNegara = $request->input('nama_negara');
        dd($request->all());
        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Simpan uke dalam tabel job
            $job = Job::create([
                'nama_job' => $request->nama_job,
                'nama_perusahaan' => $request->nama_perusahaan,
                'negara_id' => $request->negara_id,
                'nama_negara' => $namaNegara,
            ]);

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

            
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data'], 500);
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
        $data = Job::where('id', $id)->first();
        $fasilitas = Fasilitas::all();
        $negara = Negara::all();  // Daftar semua negara
        $kategori_job = KategoriJob::all();  // Daftar semua kategori pekerjaan
        
        return view('back.job.edit', compact('data', 'fasilitas','negara','kategori_job'));
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
        ], [
            'nama_job.required' => 'Nama Job Wajib diisi',
            'urutan.required' => 'Urutan Wajib diisi',
            'urutan.numeric' => 'Urutan harus berupa angka',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $kategoriJob = Job::findOrFail($id);
        $oldData = $kategoriJob->getOriginal();

        // Update data
        $kategoriJob->update([
            'nama_job' => $request->nama_job,
            'urutan' => $request->urutan,
        ]);


        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Job', $kategoriJob->id, $loggedInUserId, json_encode($oldData), json_encode($kategoriJob));

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
