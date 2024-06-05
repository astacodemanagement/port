<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\LogHistori;
use App\Models\Pendaftaran;
use App\Models\Provinsi;
use App\Models\Seleksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KandidatController extends Controller
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
       $validate = Validator::make($request->all(), [
            'nik' => 'required|min:16|max:16',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'usia' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
          
            'alamat' => 'required',
            'provinsi_id' => 'required',
            'kota_id' => 'required',
            'kecamatan_id' => 'required',
            'referensi' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            
            'foto' => 'required',
        ]);
        Kandidat::find($id)->update([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'status_kawin' => $request->status_kawin,
            'alamat' => $request->alamat,
            'provinsi_id' => $request->provinsi_id,
            'kota_id' => $request->kota_id,
            'kecamatan_id' => $request->kecamatan_id,
            'referensi' => $request->referensi,
            'nama_referensi' => $request->nama_referensi,
            'nama_keluarga' => $request->nama_keluarga,
            'hubungan' => $request->hubungan,
            'no_telp_darurat' => $request->no_telp_darurat,
            'no_paspor' => $request->no_paspor,
            'tanggal_pengeluaran_paspor' => $request->tanggal_pengeluaran_paspor,
            'masa_kadaluarsa' => $request->masa_kadaluarsa,
            'kantor_paspor' => $request->kantor_paspor,
            'kondisi_paspor' => $request->kondisi_paspor,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
     
            'foto' => $request->foto,
            'level_bahasa_inggris' => $request->level_bahasa_inggris,
            'sertifikat_bahasa_inggris' => $request->sertifikat_bahasa_inggris,
            'memiliki_anak' => $request->memiliki_anak,
            'jumlah_anak' => $request->jumlah_anak,
            'usia_anak' => $request->usia_anak,
            'yakin_kerja_diluar_negeri' => $request->yakin_kerja_diluar_negeri,
            'patuh_peraturan' => $request->patuh_peraturan,
            'motivasi' => $request->motivasi,
            'apa_anda_sehat' => $request->apa_anda_sehat,
            'keterbatasan_fisik' => $request->keterbatasan_fisik,
            'keterangan_keterbatasan_fisik' => $request->keterangan_keterbatasan_fisik,
            'pernah_operasi' => $request->pernah_operasi,
            'keterangan_pernah_operasi' => $request->keterangan_pernah_operasi,
            'riwayat_penyakit_rawat' => $request->riwayat_penyakit_rawat,
            'keterangan_riwayat_penyakit_rawat' => $request->keterangan_riwayat_penyakit_rawat,
            'apa_anda_hamil' => $request->apa_anda_hamil,
            'ada_ktp' => $request->ada_ktp,
            'ada_kk' => $request->ada_kk,
            'ada_akta_lahir' => $request->ada_akta_lahir,
            'ada_ijazah' => $request->ada_ijazah,
            'ada_buku_nikah' => $request->ada_buku_nikah,
            'ada_paspor' => $request->ada_paspor,
            'penjelasan_dokumen' => $request->penjelasan_dokumen,
            'paspor' => $request->paspor,
            'ktp' => $request->ktp,
            'sertifikat_kompetensi' => $request->sertifikat_kompetensi,
            'paklaring' => $request->paklaring,
            'video_diri' => $request->video_diri,
            'video_skill' => $request->video_skill,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'no_wa' => $request->no_wa,
            

        ]);
        $kandidat = Kandidat::find($id);

        if ($request->has('email')) {
            User::where('id',$kandidat->user_id)->update([
                'email' => $request->email
            ]);
        }

        if ($request->has('password') && $request->password != null) {
            User::where('id',$kandidat->user_id)->update([
                'password' => Hash::make($request->password)
            ]);
        }

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'Update Detail Verifikasi', $kandidat->id, $loggedInUserId, json_encode($kandidat->getOriginal()), json_encode($kandidat));

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
