<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
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
        $review = Review::orderBy('id', 'desc')->get();
        return view('back.review.index', compact('review'));
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
            'nama_review' => 'required|unique:review,nama_review',
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'nama_review.required' => 'Nama Review Wajib diisi',
            'gambar.required' => 'Gambar Review Wajib diisi',
            'nama_review.unique' => 'Nama Review sudah digunakan',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $input = $request->all();  // Pindahkan ini ke bawah validasi
    
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'upload/review/';
            $imageName = $this->convertImageToWebp($image, $destinationPath);
            $input['gambar'] = $imageName;
        }
    
        // Simpan data ke database menggunakan fill()
        $review = new Review();
        $review->fill($input);
        $review->save();
    
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Review', $review->id, $loggedInUserId, null, json_encode($review));
    
        return response()->json(['message' => 'Data Berhasil Disimpan']);
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
        $review = Review::findOrFail($id);
        return response()->json($review);
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
        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama_review' => 'required|unique:review,nama_review,' . $id,
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'nama_review.required' => 'Nama Review Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $review = Review::findOrFail($id);
    
        $input = $request->except(['_token', '_method']); // Exclude unnecessary fields
    
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'upload/review/';
            $imageName = $this->convertImageToWebpUpdate($image, $destinationPath);
    
            // Hapus file gambar lama jika ada
            if ($review->gambar && file_exists(public_path('upload/review/' . $review->gambar))) {
                unlink(public_path('upload/review/' . $review->gambar));
            }
    
            $input['gambar'] = $imageName;
        }
    
        // Update review data di database
        $review->update($input);
    
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'Review', $review->id, $loggedInUserId, json_encode($review->getOriginal()), json_encode($review));
    
        return response()->json(['message' => 'Data Berhasil Diupdate']);
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
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['message' => 'Data review not found'], 404);
        }

        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldBuktiFileName = $review->gambar; // Nama file saja
        $oldBuktiPath = public_path('upload/review/' . $oldBuktiFileName);

        if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
            unlink($oldBuktiPath);
        }

        $review->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'review', $id, $loggedInUserId, json_encode($review), null);


        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }




    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus







}
