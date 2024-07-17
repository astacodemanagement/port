<?php

namespace App\Http\Controllers;

use App\Models\Alasan;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AlasanController extends Controller
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
        $alasan = Alasan::orderBy('id', 'desc')->get();
        return view('back.alasan.index', compact('alasan'));
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
            'nama_alasan' => 'required|unique:alasan,nama_alasan',
            'gambar' => 'required|mimes:jpeg,jpg,png,gif,webp|max:2048', // Menambahkan webp ke validasi
        ], [
            'nama_alasan.required' => 'Nama Alasan Wajib diisi',
            'nama_alasan.unique' => 'Nama Alasan sudah digunakan',
            'gambar.required' => 'Gambar Alasan Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG, GIF, dan WebP',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $input = $request->all();
    
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'upload/alasan/';
    
            // Mengubah gambar ke format WebP
            $imageName = $this->convertImageToWebp($image, $destinationPath);
            if (!$imageName) {
                return response()->json(['errors' => ['gambar' => ['Gagal mengonversi gambar ke format WebP.']]], 422);
            }
    
            $input['gambar'] = $imageName;
        }
    
        // Simpan data alasan ke database menggunakan fill()
        $alasan = new Alasan();
        $alasan->fill($input);
        $alasan->save();
    
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Alasan', $alasan->id, $loggedInUserId, null, json_encode($alasan));
    
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
                case 'image/gif':
                    $sourceImage = @imagecreatefromgif($sourceImagePath);
                    break;
                case 'image/webp':
                    // Jika gambar sudah dalam format WebP, langsung gunakan
                    $sourceImage = @imagecreatefromwebp($sourceImagePath);
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
        $alasan = Alasan::findOrFail($id);
        return response()->json($alasan);
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
            'nama_alasan' => 'required|unique:alasan,nama_alasan,' . $id,
            'gambar' => 'nullable|mimes:jpeg,jpg,png,gif,webp|max:2048', // Menambahkan webp ke validasi
        ], [
            'nama_alasan.required' => 'Nama Alasan Wajib diisi',
            'nama_alasan.unique' => 'Nama Alasan sudah digunakan',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG, GIF, dan WebP',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $alasan = Alasan::findOrFail($id);
        $oldData = $alasan->getOriginal();
    
        $input = $request->except(['_token', '_method']); // Exclude unnecessary fields
    
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'upload/alasan/';
    
            // Mengubah gambar ke format WebP
            $imageName = $this->convertImageToWebpUpdate($image, $destinationPath);
            if (!$imageName) {
                return response()->json(['errors' => ['gambar' => ['Gagal mengonversi gambar ke format WebP.']]], 422);
            }
    
            // Hapus file gambar lama jika ada
            if ($alasan->gambar && file_exists(public_path('upload/alasan/' . $alasan->gambar))) {
                unlink(public_path('upload/alasan/' . $alasan->gambar));
            }
    
            $input['gambar'] = $imageName;
        }
    
        // Update alasan data di database
        $alasan->update($input);
    
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'Alasan', $alasan->id, $loggedInUserId, json_encode($oldData), json_encode($alasan));
    
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
                case 'image/gif':
                    $sourceImage = @imagecreatefromgif($sourceImagePath);
                    break;
                case 'image/webp':
                    // Jika gambar sudah dalam format WebP, langsung gunakan
                    $sourceImage = @imagecreatefromwebp($sourceImagePath);
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
        $alasan = Alasan::find($id);

        if (!$alasan) {
            return response()->json(['message' => 'Data alasan not found'], 404);
        }

        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldBuktiFileName = $alasan->gambar; // Nama file saja
        $oldBuktiPath = public_path('upload/alasan/' . $oldBuktiFileName);

        if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
            unlink($oldBuktiPath);
        }

        $alasan->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'alasan', $id, $loggedInUserId, json_encode($alasan), null);


        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }




    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus







}
