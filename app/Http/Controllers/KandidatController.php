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
use Illuminate\Support\Facades\Storage;
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
        // dd($request->foto);
        $request->validate([
            'nik' => 'required|numeric|max_digits:16|min_digits:16',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date_format:Y-m-d',
            'usia' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'agama' => 'required',
            'status_kawin' => 'required',
            'alamat' => 'required|min:5',
            'provinsi_id' => 'required',
            'kota_id' => 'required',
            'kecamatan_id' => 'required',
            'referensi' => 'nullable',
            'nama_referensi' => 'nullable',
            'nama_keluarga' => 'nullable',
            'hubungan' => 'nullable',
            'no_telp_darurat' => 'nullable|numeric|min_digits:6|max_digits:14',
            'no_paspor' => 'required|numeric|max_digits:16',
            'tanggal_pengeluaran_paspor' => 'required|date_format:Y-m-d',
            'masa_kadaluarsa' => 'required|date_format:Y-m-d',
            'kantor_paspor' => 'required|min:3',
            'kondisi_paspor' => 'required',
            'no_hp' => 'required|numeric|min_digits:6|max_digits:14',
            'email' => 'required',
            'level_bahasa_inggris' => 'nullable',
            'memiliki_anak' => 'nullable',
            'usia_anak' => 'nullable|numeric',
            'yakin_kerja_diluar_negeri' => 'nullable',
            'jumlah_anak' => 'numeric|nullable',
            'patuh_peraturan' => 'nullable',
            'motivasi' => 'nullable',
            'apa_anda_sehat' => 'nullable',
            'keterbatasan_fisik' => 'nullable',
            'keterangan_keterbatasan_fisik' => 'nullable',
            'pernah_operasi' => 'nullable',
            'keterangan_pernah_operasi' => 'nullable',
            'riwayat_penyakit_rawat' => 'nullable',
            'keterangan_riwayat_penyakit_rawat' => 'nullable',
            'apa_anda_hamil' => 'nullable',
            'ada_ktp' => 'nullable',
            'ada_kk' => 'nullable',
            'ada_akta_lahir' => 'nullable',
            'ada_ijazah' => 'nullable',
            'ada_buku_nikah' => 'nullable',
            'ada_paspor' => 'nullable',
            'penjelasan_dokumen' => 'nullable',
            'video_diri' => 'nullable',
            'video_skill' => 'nullable',
            'email' => 'required',
            'password' => 'nullable|min:8',
            'no_hp' => 'nullable|numeric|min_digits:6|max_digits:14',
            'no_wa' => 'nullable|numeric|min_digits:6|max_digits:14',
            'foto' => 'max:10240|mimes:jpeg,jpg,bmp,png,webp',
            'paspor' => 'max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
            'ktp' => 'max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
            'sertifikat_kompetensi' => 'max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
            'paklaring' => 'max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
            'kk' => 'max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
            'akta_lahir' => 'max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
            'ijazah' => 'max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
            'buku_nikah' => 'max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
            'sertifikat_bahasa_inggris' => 'max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
        ]);

        $kandidat = [
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
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
            'level_bahasa_inggris' => $request->level_bahasa_inggris,
            'memiliki_anak' => $request->memiliki_anak,
            'usia_anak' => $request->usia_anak,
            'yakin_kerja_diluar_negeri' => $request->yakin_kerja_diluar_negeri,
            'jumlah_anak' => $request->jumlah_anak,
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
            'ada_ktp' => $request->has('ada_ktp') ? 'Ya' : 'Tidak',
            'ada_kk' => $request->has('ada_kk') ? 'Ya' : 'Tidak',
            'ada_akta_lahir' => $request->has('ada_akta_lahir') ? 'Ya' : 'Tidak',
            'ada_ijazah' => $request->has('ada_ijazah') ? 'Ya' : 'Tidak',
            'ada_buku_nikah' => $request->has('ada_buku_nikah') ? 'Ya' : 'Tidak',
            'ada_paspor' => $request->has('ada_paspor') ? 'Ya' : 'Tidak',
            'penjelasan_dokumen' => $request->penjelasan_dokumen,
            'video_diri' => $request->video_diri,
            'video_skill' => $request->video_skill,
            'no_wa' => $request->no_wa,
        ];

        // handle foto
        if ($request->has('foto')) {
            $realpathFoto = $request->file('foto')->getRealPath();
            $filenameFoto = 'foto-' . time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $dirFoto = 'upload/foto/';
            $uploadFoto = Storage::disk('public_uploads')->put($dirFoto . $filenameFoto, file_get_contents($realpathFoto));
            if ($uploadFoto) {
                $kandidat['foto'] = $filenameFoto;
            }
        }
        if ($request->has('paspor')) {
            $realpathPaspor = $request->file('paspor')->getRealPath();
            $filenamePaspor = 'paspor-' . time() . '.' . $request->file('paspor')->getClientOriginalExtension();
            $dirPaspor = 'upload/paspor/';
            $uploadPaspor = Storage::disk('public_uploads')->put($dirPaspor . $filenamePaspor, file_get_contents($realpathPaspor));
            if ($uploadPaspor) {
                $kandidat['paspor'] = $filenamePaspor;
            }
        }
        if ($request->has('ktp')) {
            $realpathKtp = $request->file('ktp')->getRealPath();
            $filenameKtp = 'ktp-' . time() . '.' . $request->file('ktp')->getClientOriginalExtension();
            $dirKtp = 'upload/ktp/';
            $uploadKtp = Storage::disk('public_uploads')->put($dirKtp . $filenameKtp, file_get_contents($realpathKtp));
            if ($uploadKtp) {
                $kandidat['ktp'] = $filenameKtp;
            }
        }

        if ($request->has('sertifikat_kompetensi')) {
            $realpathSertifikatKompetensi = $request->file('sertifikat_kompetensi')->getRealPath();
            $filenameSertifikatKompetensi = 'sertifikat-kompetensi-' . time() . '.' . $request->file('sertifikat_kompetensi')->getClientOriginalExtension();
            $dirSertifikatKompetensi = 'upload/sertifikat-kompetensi/';
            $uploadSertifikatKompetensi = Storage::disk('public_uploads')->put($dirSertifikatKompetensi . $filenameSertifikatKompetensi, file_get_contents($realpathSertifikatKompetensi));
            if ($uploadSertifikatKompetensi) {
                $kandidat['sertifikat_kompetensi'] = $filenameSertifikatKompetensi;
            }
        }
        if ($request->has('paklaring')) {
            $realpathPaklaring = $request->file('paklaring')->getRealPath();
            $filenamePaklaring = 'paklaring-' . time() . '.' . $request->file('paklaring')->getClientOriginalExtension();
            $dirPaklaring = 'upload/paklaring/';
            $uploadPaklaring = Storage::disk('public_uploads')->put($dirPaklaring . $filenamePaklaring, file_get_contents($realpathPaklaring));
            if ($uploadPaklaring) {
                $kandidat['paklaring'] = $filenamePaklaring;
            }
        }
        // kk
        if ($request->has('kk')) {
            $realpathKk = $request->file('kk')->getRealPath();
            $filenameKk = 'kk-' . time() . '.' . $request->file('kk')->getClientOriginalExtension();
            $dirKk = 'upload/kartu-keluarga/';
            $uploadKk = Storage::disk('public_uploads')->put($dirKk . $filenameKk, file_get_contents($realpathKk));
            if ($uploadKk) {
                $kandidat['kk'] = $filenameKk;
            }
        }
        // akta
        if ($request->has('akta')) {
            $realpathAkta = $request->file('akta')->getRealPath();
            $filenameAkta = 'akta-' . time() . '.' . $request->file('akta')->getClientOriginalExtension();
            $dirAkta = 'upload/akta-lahir/';
            $uploadAkta = Storage::disk('public_uploads')->put($dirAkta . $filenameAkta, file_get_contents($realpathAkta));
            if ($uploadAkta) {
                $kandidat['akta_lahir'] = $filenameAkta;
            }
        }
        // ijazah
        if ($request->has('ijazah')) {
            $realpathIjazah = $request->file('ijazah')->getRealPath();
            $filenameIjazah = 'ijazah-' . time() . '.' . $request->file('ijazah')->getClientOriginalExtension();
            $dirIjazah = 'upload/ijazah/';
            $uploadIjazah = Storage::disk('public_uploads')->put($dirIjazah . $filenameIjazah, file_get_contents($realpathIjazah));
            if ($uploadIjazah) {
                $kandidat['ijazah'] = $filenameIjazah;
            }
        }
        // buku nikah
        if ($request->has('buku_nikah')) {
            $realpathBukuNikah = $request->file('buku_nikah')->getRealPath();
            $filenameBukuNikah = 'buku-nikah-' . time() . '.' . $request->file('buku_nikah')->getClientOriginalExtension();
            $dirBukuNikah = 'upload/buku-nikah/';
            $uploadBukuNikah = Storage::disk('public_uploads')->put($dirBukuNikah . $filenameBukuNikah, file_get_contents($realpathBukuNikah));
            if ($uploadBukuNikah) {
                $kandidat['buku_nikah'] = $filenameBukuNikah;
            }
        }
        //  sertifikat_bahasa_inggris
        if ($request->has('sertifikat_bahasa_inggris')) {
            $realpathSertifikatBahasaInggris = $request->file('sertifikat_bahasa_inggris')->getRealPath();
            $filenameSertifikatBahasaInggris = 'sertifikat-bahasa-inggris-' . time() . '.' . $request->file('sertifikat_bahasa_inggris')->getClientOriginalExtension();
            $dirSertifikatBahasaInggris = 'upload/sertifikat-bahasa-inggris/';
            $uploadSertifikatBahasaInggris = Storage::disk('public_uploads')->put($dirSertifikatBahasaInggris . $filenameSertifikatBahasaInggris, file_get_contents($realpathSertifikatBahasaInggris));
            if ($uploadSertifikatBahasaInggris) {
                $kandidat['sertifikat_bahasa_inggris'] = $filenameSertifikatBahasaInggris;
            }
        }
        // dd($kandidat['paklaring']);
        Kandidat::find($id)->update($kandidat);
        $user_id = Kandidat::find($id)->user_id;

        if ($request->has('email')) {
            User::where('id', $user_id)->update([
                'email' => $request->email
            ]);
        }

        if ($request->has('password') && $request->password != null) {
            User::where('id', $user_id)->update([
                'password' => Hash::make($request->password)
            ]);
        }

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'kandidat', $id, $loggedInUserId, null, json_encode($kandidat));
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
