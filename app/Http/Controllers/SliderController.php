<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $validator;

     public function __construct()
     {
         // Define validation rules and messages
         $this->validator = Validator::make([], [
             'nama_slider' => 'required',
             'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
             'compro' => 'required|in:1,2',
         ], [
             'nama_slider.required' => 'Nama Slider Wajib diisi',
             'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
             'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
             'compro.required' => 'Pilih salah satu dari pilihan yang tersedia',
             'compro.in' => 'Pilihan yang dipilih tidak valid, opsinya hanya PSI atau AK AMA',
         ]);
     }
    
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
        $slider = Slider::orderBy('id', 'desc')->get();
        return view('back.slider.index', compact('slider'));
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
        $validator = Validator::make($request->all(), $this->validator->getRules(), $this->validator->getMessageBag()->toArray());
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $input = $request->all();  // Pindahkan ini ke bawah validasi
    
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'upload/slider/';
            
            // Konversi gambar ke WebP
            $imageName = $this->convertImageToWebp($image, $destinationPath);
            if ($imageName) {
                $input['gambar'] = $imageName;
            } else {
                return response()->json(['error' => 'Gagal mengonversi gambar ke WebP'], 500);
            }
        }
    
        // Simpan data spp ke database menggunakan fill()
        $slider = new Slider();
        $slider->fill($input);
        $slider->save();
    
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Slider', $slider->id, $loggedInUserId, null, json_encode($slider));
    
        return response()->json(['message' => 'Data Berhasil Disimpan']);
    }
    
    // Fungsi untuk mengonversi gambar ke WebP
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
        $slider = Slider::findOrFail($id);
        return response()->json($slider);
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
        $validator = Validator::make($request->all(), $this->validator->getRules(), $this->validator->getMessageBag()->toArray());
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $slider = Slider::findOrFail($id);
        $oldData = $slider->getOriginal();
    
        $input = $request->except(['_token', '_method']); // Exclude unnecessary fields
    
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'upload/slider/';
    
            // Konversi gambar ke WebP
            $imageName = $this->convertImageToWebpUpdate($image, $destinationPath);
            if ($imageName) {
                // Hapus file gambar lama jika ada
                if ($slider->gambar && file_exists(public_path('upload/slider/' . $slider->gambar))) {
                    unlink(public_path('upload/slider/' . $slider->gambar));
                }
                $input['gambar'] = $imageName;
            } else {
                return response()->json(['error' => 'Gagal mengonversi gambar ke WebP'], 500);
            }
        }
    
        // Update slider data di database
        $slider->update($input);
    
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'Slider', $slider->id, $loggedInUserId, json_encode($oldData), json_encode($slider));
    
        return response()->json(['message' => 'Data Berhasil Diupdate']);
    }
    
    // Fungsi untuk mengonversi gambar ke WebP
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
        $slider = Slider::find($id);

        if (!$slider) {
            return response()->json(['message' => 'Data slider not found'], 404);
        }

        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldBuktiFileName = $slider->gambar; // Nama file saja
        $oldBuktiPath = public_path('upload/slider/' . $oldBuktiFileName);

        if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
            unlink($oldBuktiPath);
        }

        $slider->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'slider', $id, $loggedInUserId, json_encode($slider), null);


        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }




    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus







}
