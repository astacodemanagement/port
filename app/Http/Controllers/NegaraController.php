<?php

namespace App\Http\Controllers;

use App\Models\Negara;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NegaraController extends Controller
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
        $negara = Negara::orderBy('id', 'desc')->get();
        return view('back.negara.index', compact('negara'));
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
            'nama_negara' => 'required|unique:negara,nama_negara',
            'kode_negara' => 'required',
        ], [
            'nama_negara.required' => 'Nama Negara Wajib diisi',
            'nama_negara.unique' => 'Nama Negara sudah digunakan',
            'kode_negara.required' => 'Kode Negara Wajib diisi',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $input = $request->all();
    
        // Handle logo
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = $this->convertImageToWebp($image, 'upload/negara/');
    
            if ($imageName) {
                $input['logo'] = $imageName;
            }
        }
    
        Negara::create($input);
    
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Negara', $request->id, $loggedInUserId, null, json_encode($input));
    
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
        $negara = Negara::findOrFail($id);
        return response()->json($negara);
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
        'nama_negara' => 'required',
        'kode_negara' => 'required',
    ], [
        'nama_negara.required' => 'Nama Negara Wajib diisi',
        'kode_negara.required' => 'Kode Negara Wajib diisi',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $negara = Negara::findOrFail($id);
    $oldData = $negara->getOriginal();

    $input = $request->all();

    // Handle logo
    if ($request->hasFile('logo')) {
        $image = $request->file('logo');
        $imageName = $this->convertImageToWebpUpdate($image, 'upload/negara/');

        if ($imageName) {
            // Hapus file logo lama jika ada
            if ($negara->logo && file_exists(public_path('upload/negara/' . $negara->logo))) {
                unlink(public_path('upload/negara/' . $negara->logo));
            }

            $input['logo'] = $imageName;
        }
    }

    // Update data
    $negara->update($input);

    $loggedInUserId = Auth::id();
    $this->simpanLogHistori('Update', 'Negara', $negara->id, $loggedInUserId, json_encode($oldData), json_encode($negara));

    return response()->json(['message' => 'Data berhasil diupdate.']);
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
    $negara = Negara::findOrFail($id);

    if (!$negara) {
        return response()->json(['message' => 'Data Negara not found'], 404);
    }

    // Hapus file logo jika ada
    if ($negara->logo && file_exists(public_path('upload/negara/' . $negara->logo))) {
        unlink(public_path('upload/negara/' . $negara->logo));
    }

    $loggedInUserId = Auth::id();
    $oldData = json_encode($negara->toArray());

    // Hapus data dari database
    $negara->delete();

    // Simpan log histori untuk operasi delete
    $this->simpanLogHistori('Delete', 'Negara', $id, $loggedInUserId, $oldData, null);

    return response()->json(['message' => 'Data berhasil dihapus.']);
}

  

   

  
 
   

    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
  






}
