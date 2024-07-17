<?php

namespace App\Http\Controllers;

use App\Models\LogHistori;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
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
        $log->id_entitas = $idEntitas; // Pastikan $idEntitas adalah integer yang valid
        $log->aksi = $aksi;
        $log->waktu = now(); // Menggunakan waktu saat ini
        $log->pengguna = $pengguna;
        $log->data_lama = $dataLama;
        $log->data_baru = $dataBaru;
        $log->save();
    }
    
    public function index()
    {
     $partner = Partner::paginate(10);
    return view('back.partner.index', compact('partner'));   
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
            'name' => 'required|unique:partner,name',
            'logo' => 'required|max:10240|mimes:jpeg,jpg,bmp,png,webp',
            'compro' => 'required|in:1,2',
        ], [
            'name.required' => 'Nama Partner Wajib diisi',
            'name.unique' => 'Nama Partner sudah digunakan',
            'logo.required' => 'Logo Wajib diisi',
            'logo.max' => 'Ukuran Logo maksimal 10MB',
            'logo.mimes' => 'Format Logo harus jpeg, jpg, bmp, png, webp',
            'compro.required' => 'Company profile Wajib diisi',
            'compro.in' => 'Company profile harus PSI atau Akama',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $imageName = null;
    
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $destinationPath = 'upload/partner/';
            $imageName = $this->convertImageToWebp($image, $destinationPath);
        }
    
        Partner::create([
            'name' => $request->name,
            'logo' => $imageName,
            'compro' => $request->compro,
        ]);
    
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Partner', $request->name, $loggedInUserId, null, null);
    
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
                case 'image/bmp':
                    $sourceImage = @imagecreatefrombmp($sourceImagePath);
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
        //
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
        'name' => 'required|unique:partner,name,' . $id,
        'logo' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp',
        'compro' => 'required|in:1,2',
    ], [
        'name.required' => 'Nama Partner Wajib diisi',
        'name.unique' => 'Nama Partner sudah digunakan',
        'logo.max' => 'Ukuran Logo maksimal 10MB',
        'logo.mimes' => 'Format Logo harus jpeg, jpg, bmp, png, webp',
        'compro.required' => 'Company profile Wajib diisi',
        'compro.in' => 'Company profile harus PSI atau Akama',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $partner = Partner::findOrFail($id);
    $oldData = $partner->getOriginal();

    // Handle logo if provided
    if ($request->hasFile('logo')) {
        $image = $request->file('logo');
        $destinationPath = 'upload/partner/';
        $imageName = $this->convertImageToWebpUpdate($image, $destinationPath);

        // Hapus file logo lama jika ada
        if ($partner->logo && file_exists(public_path('upload/partner/' . $partner->logo))) {
            unlink(public_path('upload/partner/' . $partner->logo));
        }

        $partner->logo = $imageName;
    }

    // Update data
    $partner->update([
        'name' => $request->name,
        'compro' => $request->compro,
    ]);

    $loggedInUserId = Auth::id();

    // Simpan log histori untuk operasi Update dengan user_id yang sedang login
    $this->simpanLogHistori('Update', 'Partner', $partner->id, $loggedInUserId, json_encode($oldData), json_encode($partner));

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
            case 'image/bmp':
                $sourceImage = @imagecreatefrombmp($sourceImagePath);
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
        $partner = Partner::find($id);

        if (!$partner) {
            return response()->json(['message' => 'Data partner not found'], 404);
        }

        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldBuktiFileName = $partner->logo; // Nama file saja
        $oldBuktiPath = public_path('upload/partner/' . $oldBuktiFileName);

        if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
            unlink($oldBuktiPath);
        }

        $partner->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'partner', $id, $loggedInUserId, json_encode($partner), null);


        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }


}
