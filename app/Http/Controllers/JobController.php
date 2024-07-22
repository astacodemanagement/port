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
use App\Traits\UploadFile;


class JobController extends Controller
{

    use UploadFile;
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
            'mitra' => 'nullable',
            'tanggal_tutup' => 'nullable|date',
            'gaji' => 'required',
            'jenis_pembayaran' => 'required|in:Bulan,Jam',
            'estimasi' => 'required',
            'gaji_diterima' => 'required|in:Bersih,Kotor',
            // 'tanggal_kurs' => 'nullable|date',
            // 'nominal_kurs' => 'nullable',
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
            'pendidikan' => 'nullable',
        ], [
            'nama_job.required' => 'Nama Job Wajib diisi',
            'nama_perusahaan.required' => 'Nama Perusahaan Wajib diisi',
            'gaji.required' => 'Gaji Wajib diisi',
            'gaji.numeric' => 'Gaji harus berupa angka',
            'estimasi.required' => 'Estimasi Wajib diisi',
            'jenis_pembayaran.required' => 'Jenis Pembayaran Wajib diisi',
            'jenis_pembayaran.in' => 'Jenis Pembayaran harus berupa Bulan atau Jam',

            'gaji_diterima.required' => 'Status Gaji Diterima Wajib diisi',
            'gaji_diterima.in' => 'Status Gaji Diterima harus berupa Bersih atau Kotor',
            'tanggal_kurs.date' => 'Tanggal Kurs harus berupa tanggal yang valid',
    
            'negara_id.required' => 'Negara Wajib diisi',
            'negara_id.exists' => 'Negara yang dipilih tidak valid',
            'kategori_job_id.required' => 'Kategori Job Wajib diisi',
            'kategori_job_id.exists' => 'Kategori Job yang dipilih tidak valid',
            'kontrak_kerja.required' => 'Kontrak Kerja Wajib diisi',
            'jam_kerja.required' => 'Jam Kerja Wajib diisi',
            'hari_kerja.required' => 'Hari Kerja Wajib diisi',
            'cuti_kerja.required' => 'Cuti Kerja Wajib diisi',
            'jenis_kelamin.in' => 'Jenis Kelamin harus berupa Laki-laki atau Perempuan',
            'tinggi_badan.numeric' => 'Tinggi Badan harus berupa angka',
            'berat_badan.numeric' => 'Berat Badan harus berupa angka',
            'link_video.url' => 'Link Video harus berupa URL yang valid',
            'fasilitas_id.required' => 'Fasilitas Wajib diisi',
            'fasilitas_id.array' => 'Fasilitas harus berupa array',
            'fasilitas_id.min' => 'Pilih minimal satu fasilitas',
        ]);
    
        // Mulai transaksi database
        DB::beginTransaction();
        try {
            // Hapus karakter titik dari input nominal sebelum menyimpan ke database
            $nominalFields = ['gaji', 'estimasi_minimal', 'estimasi_maksimal', 'nominal_kurs'];
            $jobData = $request->except('fasilitas_id'); // kecualikan fasilitas_id jika tidak ada dalam tabel job
    
            foreach ($nominalFields as $field) {
                if (isset($jobData[$field])) {
                    $jobData[$field] = str_replace('.', '', $jobData[$field]);
                }
            }
            
            // Handle image upload and conversion to WebP
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = $this->convertImageToWebp($file, 'upload/gambar/');
    
                if ($filename) {
                    $jobData['gambar'] = $filename;
                }
            }
    
            // Simpan ke dalam tabel job dengan semua gambar yang diterima
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
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()], 500);
        }
    }
    
    private function convertImageToWebp($image, $destinationPath)
    {
        // Pastikan direktori tujuan ada
        if (!file_exists(public_path($destinationPath))) {
            mkdir(public_path($destinationPath), 0777, true);
        }
    
        // Ambil nama file asli dan ekstensinya
        $originalFileName = $image->getClientOriginalName();
    
        // Ambil tipe MIME dari gambar
        $imageMimeType = $image->getMimeType();
    
        // Filter hanya tipe MIME gambar yang didukung (misalnya, image/jpeg, image/png, dll.)
        if (strpos($imageMimeType, 'image/') === 0) {
            // Gabungkan waktu dengan nama file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName);
    
            // Simpan gambar asli ke tujuan yang diinginkan
            $image->move(public_path($destinationPath), $imageName);
    
            // Path gambar asli
            $sourceImagePath = public_path($destinationPath . $imageName);
    
            // Path untuk menyimpan gambar WebP
            $webpImagePath = $destinationPath . pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
    
            // Baca gambar asli dan konversi ke WebP jika tipe MIME didukung
            switch ($imageMimeType) {
                case 'image/jpeg':
                    $sourceImage = @imagecreatefromjpeg($sourceImagePath);
                    break;
                case 'image/png':
                    $sourceImage = @imagecreatefrompng($sourceImagePath);
                    break;
                    // Tambahkan jenis MIME lain jika diperlukan
                default:
                    // Jenis MIME tidak didukung, tangani kasus ini sesuai kebutuhan Anda
                    return null;
            }
    
            // Jika gambar asli berhasil dibaca
            if ($sourceImage !== false) {
                // Buat gambar baru dalam format WebP
                imagewebp($sourceImage, public_path($webpImagePath));
    
                // Hapus gambar asli dari memori
                imagedestroy($sourceImage);
    
                // Hapus file asli setelah konversi selesai
                @unlink($sourceImagePath);
    
                // Kembalikan hanya nama file gambar WebP
                return pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
            } else {
                // Gagal membaca gambar asli, tangani kasus ini sesuai kebutuhan Anda
                return null;
            }
        } else {
            // Tipe MIME gambar tidak didukung, tangani kasus ini sesuai kebutuhan Anda
            return null;
        }
    }
    

    public function updateStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_id' => 'required|exists:job,id',
            'status' => 'required|in:publish,draft'
        ], [
            'job_id.required' => 'ID Job wajib diisi',
            'job_id.exists' => 'ID Job tidak valid',
            'status.required' => 'Status wajib diisi',
            'status.in' => 'Status tidak valid',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $job = Job::findOrFail($request->job_id);

            // Ambil status sebelum diupdate
            $oldStatus = $job->status;

            // Update status
            $job->status = $request->status;
            $job->save();

            // Ambil status setelah diupdate
            $newStatus = $job->status;

            // Simpan log histori dengan data lama dan data baru hanya untuk status
            $loggedInUserId = Auth::id();
            $this->simpanLogHistori('Update', 'Job', $job->id, $loggedInUserId, json_encode(['status' => $oldStatus]), json_encode(['status' => $newStatus]));

            return response()->json(['message' => 'Status berhasil diupdate'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat mengupdate status job: ' . $e->getMessage()], 500);
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
        'gaji' => 'required|min:6',
        'jenis_pembayaran' => 'required|in:Bulan,Jam',
        'estimasi' => 'required',
        'gaji_diterima' => 'required|in:Bersih,Kotor',
        'tanggal_kurs' => 'nullable|date',
        // 'nominal_kurs' => 'required|nullable',
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
        'pendidikan' => 'nullable',
        'ketentuan' => 'nullable|min:6',
    ], [
        'nama_job.required' => 'Nama Job Wajib diisi',
        'nama_perusahaan.required' => 'Nama Perusahaan Wajib diisi',
        'gaji.required' => 'Gaji Wajib diisi',
        'gaji.numeric' => 'Gaji harus berupa angka',
        'gaji.min' => 'Gaji minimal 6 digit',
        'jenis_pembayaran.required' => 'Jenis Pembayaran Wajib diisi',
        'jenis_pembayaran.in' => 'Jenis Pembayaran harus berupa Bulan atau Jam',
        'estimasi' => 'Estimasi Wajib diisi',
        'gaji_diterima.required' => 'Status Gaji Diterima Wajib diisi',
        'gaji_diterima.in' => 'Status Gaji Diterima harus berupa Bersih atau Kotor',
        'tanggal_kurs.date' => 'Tanggal Kurs harus berupa tanggal yang valid',
        // 'nominal_kurs.required' => 'Nominal Kurs Wajib diisi',
    ]);
    
        

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    DB::beginTransaction();
    try {
        $job = Job::findOrFail($id);
        $oldData = $job->getOriginal();

        // Ambil semua input dari request, kecualikan 'fasilitas_id'
        $requestData = $request->only([
            'nama_job', 'nama_perusahaan', 'mitra', 'tanggal_tutup', 'gaji', 'jenis_pembayaran',
            'estimasi', 'estimasi', 'gaji_diterima', 'tanggal_kurs', 'nominal_kurs',
            'negara_id', 'kategori_job_id', 'kontrak_kerja', 'jam_kerja', 'hari_kerja', 'cuti_kerja',
            'masa_percobaan', 'mata_uang_gaji', 'kerja_lembur', 'bahasa', 'deskripsi', 'jenis_kelamin',
            'tinggi_badan', 'berat_badan', 'rentang_usia', 'level_bahasa', 'pengalaman_kerja', 'paragraf_galeri',
            'link_video', 'info_lain', 'disclaimer', 'ketentuan', 'pendidikan'
        ]);

        // Hilangkan karakter titik dari input yang bersifat nominal
        $nominalFields = ['gaji', 'estimasi', 'nominal_kurs'];
        foreach ($nominalFields as $field) {
            if (isset($requestData[$field])) {
                $requestData[$field] = str_replace('.', '', $requestData[$field]);
            }
        }

        // Handle gambar
        if ($request->hasFile('gambar')) {
            // Unlink gambar lama
            if ($job->gambar) {
                $dir = 'upload/gambar/';
                if (File::exists(public_path($dir . $job->gambar))) {
                    File::delete(public_path($dir . $job->gambar));
                }
            }

            // Upload gambar baru
            $file = $request->file('gambar');
            $filename = $this->convertImageToWebpUpdate($file, 'upload/gambar/');

            if ($filename) {
                $requestData['gambar'] = $filename;
            }
        }

        // Update data job
        $job->update($requestData);

        // Update tabel benefit
        // Handle checkbox update: update jika checked, delete jika unchecked
        $existingBenefits = Benefit::where('job_id', $id)->pluck('fasilitas_id')->toArray();
        $requestBenefitIds = $request->fasilitas_id;

        // Hapus benefits yang tidak ada di request
        $deleteBenefits = array_diff($existingBenefits, $requestBenefitIds);
        if ($deleteBenefits) {
            Benefit::where('job_id', $id)->whereIn('fasilitas_id', $deleteBenefits)->delete();
        }

        // Tambah benefits yang ada di request tetapi tidak ada di existing
        $addBenefits = array_diff($requestBenefitIds, $existingBenefits);
        if ($addBenefits) {
            foreach ($addBenefits as $benefit) {
                Benefit::create([
                    'job_id' => $job->id,
                    'fasilitas_id' => $benefit,
                ]);
            }
        }

        // Commit transaksi jika tidak ada kesalahan
        DB::commit();

        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Job', $job->id, $loggedInUserId, json_encode($oldData), json_encode($job));

        return response()->json(['message' => 'Data berhasil diupdate.']);
    } catch (\Exception $e) {
        DB::rollback();
        return response()->json(['error' => 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage()], 500);
    }
}

private function convertImageToWebpUpdate($image, $destinationPath)
{
    // Pastikan direktori tujuan ada
    if (!file_exists(public_path($destinationPath))) {
        mkdir(public_path($destinationPath), 0777, true);
    }

    // Ambil nama file asli dan ekstensinya
    $originalFileName = $image->getClientOriginalName();

    // Ambil tipe MIME dari gambar
    $imageMimeType = $image->getMimeType();

    // Filter hanya tipe MIME gambar yang didukung (misalnya, image/jpeg, image/png, dll.)
    if (strpos($imageMimeType, 'image/') === 0) {
        // Gabungkan waktu dengan nama file asli
        $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName);

        // Simpan gambar asli ke tujuan yang diinginkan
        $image->move(public_path($destinationPath), $imageName);

        // Path gambar asli
        $sourceImagePath = public_path($destinationPath . $imageName);

        // Path untuk menyimpan gambar WebP
        $webpImagePath = $destinationPath . pathinfo($imageName, PATHINFO_FILENAME) . '.webp';

        // Baca gambar asli dan konversi ke WebP jika tipe MIME didukung
        switch ($imageMimeType) {
            case 'image/jpeg':
                $sourceImage = @imagecreatefromjpeg($sourceImagePath);
                break;
            case 'image/png':
                $sourceImage = @imagecreatefrompng($sourceImagePath);
                break;
                // Tambahkan jenis MIME lain jika diperlukan
            default:
                // Jenis MIME tidak didukung, tangani kasus ini sesuai kebutuhan Anda
                return null;
        }

        // Jika gambar asli berhasil dibaca
        if ($sourceImage !== false) {
            // Buat gambar baru dalam format WebP
            imagewebp($sourceImage, public_path($webpImagePath));

            // Hapus gambar asli dari memori
            imagedestroy($sourceImage);

            // Hapus file asli setelah konversi selesai
            @unlink($sourceImagePath);

            // Kembalikan hanya nama file gambar WebP
            return pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
        } else {
            // Gagal membaca gambar asli, tangani kasus ini sesuai kebutuhan Anda
            return null;
        }
    } else {
        // Tipe MIME gambar tidak didukung, tangani kasus ini sesuai kebutuhan Anda
        return null;
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
}
