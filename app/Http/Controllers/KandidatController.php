<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\LogHistori;
use App\Models\Pendaftaran;
use App\Models\Provinsi;
use App\Models\Screaning;
use App\Models\Seleksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Traits\UploadFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use UploadFile;

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
        $data['kandidat'] = Kandidat::orderBy('id', 'desc')->get();

        return view('back.kandidat.index', $data);
    }

    public function detail($id)
    {

        $data['provinsi'] = Provinsi::all();
        $data['kota'] = Kota::all();
        $data['kecamatan'] = Kecamatan::all();
        $data['detail_kandidat'] = Kandidat::with(['pendaftaran', 'pengalamanKerja', 'user'])->where('id', $id)->first();

        return view('back.kandidat.detail', $data);
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
        $kandidat = Kandidat::findOrFail($id);
      
        return response()->json($kandidat);
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
         // dd($request->all());
         $request->validate([
             'nik' => 'required|numeric|digits:16',
             'nama_lengkap' => 'required',
             'tempat_lahir' => 'required',
             'tanggal_lahir' => 'required|date_format:Y-m-d',
             'usia' => 'required|numeric',
             'berat_badan' => 'required|numeric',
             'tinggi_badan' => 'required|numeric',
             'agama' => 'required',
             'status_kawin' => 'required',
             'alamat' => 'required|min:5',
             'provinsi_id' => 'required',
             'kota_id' => 'required',
             'kecamatan_id' => 'required',
             'no_telp_darurat' => 'nullable|numeric|digits_between:6,14',
             'no_paspor' => 'nullable|numeric|digits_between:1,16',
             'tanggal_pengeluaran_paspor' => 'nullable|date_format:Y-m-d',
             'masa_kadaluarsa' => 'nullable|date_format:Y-m-d',
             'kantor_paspor' => 'nullable|min:3',
             'kondisi_paspor' => 'nullable',
             'no_hp' => 'required|numeric|digits_between:6,14',
             'email' => 'required|email',
             'jumlah_anak' => 'nullable|numeric',
             'password' => 'nullable|min:8',
             'no_wa' => 'nullable|numeric|digits_between:6,14',
             'foto' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp',
             'paspor' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
             'ktp' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
             'sertifikat_kompetensi' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
             'paklaring' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
             'kk' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
             'akta_lahir' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
             'ijazah' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
             'buku_nikah' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
             'sertifikat_bahasa_inggris' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
             'have_kids' => 'nullable|boolean',
             'total_kids' => 'nullable|numeric',
             'old_kids' => 'nullable|numeric',
             'willing_to_work' => 'nullable|boolean',
             'willing_to_obey_rules' => 'nullable|boolean',
             'motivation_work' => 'nullable|boolean',
             'health' => 'nullable|in:Healthy,no',
             'pyschical_disability' => 'nullable|boolean',
             'pyschical_disability_explain' => 'nullable',
             'operation' => 'nullable|boolean',
             'operation_explain' => 'nullable',
             'disease' => 'nullable|boolean',
             'disease_explain' => 'nullable',
             'pregnant' => 'nullable|boolean',
             'pregnant_explain' => 'nullable',
             'declaration' => 'nullable|boolean',
                
         ]);
     
         $kandidat = Kandidat::find($id);
     
         if (!$kandidat) {
             return response()->json(['message' => 'Kandidat tidak ditemukan'], 404);
         }
         $screaning = $request->only([
             'have_kids', 'total_kids', 'old_kids', 'willing_to_work', 'willing_to_obey_rules',
             'motivation_work', 'health', 'pyschical_disability', 'pyschical_disability_explain',
             'operation', 'operation_explain', 'disease', 'disease_explain', 'pregnant',
             'pregnant_explain', 'declaration'
         ]);
   
            $screaning['have_kids'] = $request->has('have_kids') ? 1 : 0;
            $screaning['willing_to_work'] = $request->has('willing_to_work') ? 1 : 0;
            $screaning['willing_to_obey_rules'] = $request->has('willing_to_obey_rules') ? 1 : 0;
            $screaning['motivation_work'] = $request->has('motivation_work') ? 1 : 0;
            $screaning['pyschical_disability'] = $request->has('pyschical_disability') ? 1 : 0;
            $screaning['operation'] = $request->has('operation') ? 1 : 0;
            $screaning['disease'] = $request->has('disease') ? 1 : 0;
            $screaning['pregnant'] = $request->has('pregnant') ? 1 : 0;
            $screaning['declaration'] = $request->has('declaration') ? 1 : 0;

         Screaning::updateOrCreate(['id_kandidat' => $kandidat->id], $screaning);
         $data = $request->only([
             'nik', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'usia',
             'berat_badan', 'tinggi_badan', 'agama', 'status_kawin', 'alamat', 'provinsi_id',
             'kota_id', 'kecamatan_id', 'referensi', 'nama_referensi', 'nama_keluarga',
             'hubungan', 'no_telp_darurat', 'no_paspor', 'tanggal_pengeluaran_paspor',
             'masa_kadaluarsa', 'kantor_paspor', 'kondisi_paspor', 'no_hp', 'email',
             'level_bahasa_inggris', 'memiliki_anak', 'usia_anak', 'yakin_kerja_diluar_negeri',
             'jumlah_anak', 'patuh_peraturan', 'motivasi', 'apa_anda_sehat', 'keterbatasan_fisik',
             'keterangan_keterbatasan_fisik', 'pernah_operasi', 'keterangan_pernah_operasi',
             'riwayat_penyakit_rawat', 'keterangan_riwayat_penyakit_rawat', 'apa_anda_hamil',
             'penjelasan_dokumen', 'video_diri', 'video_skill', 'no_wa'
         ]);
     
         $data['ada_ktp'] = $request->has('ada_ktp') ? 'Ya' : 'Tidak';
         $data['ada_kk'] = $request->has('ada_kk') ? 'Ya' : 'Tidak';
         $data['ada_akta_lahir'] = $request->has('ada_akta_lahir') ? 'Ya' : 'Tidak';
         $data['ada_ijazah'] = $request->has('ada_ijazah') ? 'Ya' : 'Tidak';
         $data['ada_buku_nikah'] = $request->has('ada_buku_nikah') ? 'Ya' : 'Tidak';
         $data['ada_paspor'] = $request->has('ada_paspor') ? 'Ya' : 'Tidak';
     
         $arrDoc = [
             ['input' => 'file_foto', 'field' => 'foto', 'dir' => 'foto'],
             ['input' => 'file_paspor', 'field' => 'paspor', 'dir' => 'paspor'],
             ['input' => 'file_ktp', 'field' => 'ktp', 'dir' => 'ktp'],
             ['input' => 'file_kk', 'field' => 'kk', 'dir' => 'kartu-keluarga'],
             ['input' => 'file_sertifikat_kompetensi', 'field' => 'sertifikat_kompetensi', 'dir' => 'sertifikat-kompetensi'],
             ['input' => 'file_sertifikat_bahasa_inggris', 'field' => 'sertifikat_bahasa_inggris', 'dir' => 'sertifikat-bahasa-inggris'],
             ['input' => 'file_paklaring', 'field' => 'paklaring', 'dir' => 'paklaring'],
             ['input' => 'file_akta_lahir', 'field' => 'akta_lahir', 'dir' => 'akta-lahir'],
             ['input' => 'file_ijazah', 'field' => 'ijazah', 'dir' => 'ijazah'],
             ['input' => 'file_buku_nikah', 'field' => 'buku_nikah', 'dir' => 'buku-nikah'],
         ];
     
         foreach ($arrDoc as $doc) {
             /** UPLOAD */
             if ($request->hasFile($doc['input'])) {
                 $file = $request->{$doc['input']};
                 $filename = $file->hashName();
                 $fileExtention = $file->extension();
                 $dir = 'upload/' . $doc['dir'] . '/';
                 
                 if ($fileExtention === 'pdf') {
                     $upload = $this->uploadFile($file, $dir, $filename);
                 } else {
                     $upload = $this->uploadImage($file, $dir, $filename, [['width' => '400', 'height' => '400']]);
                 }
     
                 if ($upload) {
                     if (File::exists(public_path($dir . $kandidat->{$doc['field']}))) {
                         File::delete(public_path($dir . $kandidat->{$doc['field']}));
                     }
     
                     if (File::exists(public_path($dir . 'thumb_' . $kandidat->{$doc['field']}))) {
                         File::delete(public_path($dir . 'thumb_' . $kandidat->{$doc['field']}));
                     }
                     $data[$doc['field']] = $filename;
                 }
             }
         }
     
         $kandidat->update($data);
     
         $user = User::find($kandidat->user_id);
     
         if ($request->has('email')) {
             $user->update(['email' => $request->email]);
         }
     
         if ($request->filled('password')) {
             $user->update(['password' => Hash::make($request->password)]);
         }
     
         $this->simpanLogHistori('Update', 'kandidat', $id, Auth::id(), null, json_encode($data));
     
         return response()->json(['message' => 'Data Berhasil Diupdate']);
     }
     



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kandidat = Kandidat::find($id);

        if (!$kandidat) {
            return response()->json(['message' => 'Data kandidat not found'], 404);
        }

        // Periksa apakah NIK ada di tabel pendaftaran
        $nikExistsInPendaftaran = Pendaftaran::where('nik', $kandidat->nik)->exists();

        // Periksa apakah ID ada di tabel seleksi
        $idExistsInSeleksi = Seleksi::where('id', $kandidat->id)->exists();

        if ($nikExistsInPendaftaran || $idExistsInSeleksi) {
            return response()->json(['message' => 'Data kandidat tidak dapat dihapus karena NIK terkait ada di tabel pendaftaran atau ID terkait ada di tabel seleksi'], 422);
        }

        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldBuktiFileName = $kandidat->foto; // Nama file saja
        $oldBuktiPath = public_path('upload/foto/' . $oldBuktiFileName);

        if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
            unlink($oldBuktiPath);
        }

        $kandidat->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'kandidat', $id, $loggedInUserId, json_encode($kandidat), null);

        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }




    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus







}
