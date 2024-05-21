<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Kandidat;
use App\Models\KategoriJob;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Negara;
use App\Models\Pendaftaran;
use App\Models\PengalamanKerja;
use App\Models\Provinsi;
use App\Models\User;
use App\Models\Wilayah;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $countries = Negara::all();
        $categories = KategoriJob::all();
        $provinces = Provinsi::all();

        return viewCompro('register.index', compact('countries', 'categories', 'provinces'));
    }

    public function completeRegistration()
    {
        if (session()->has('is_register')) {
            if (session('is_register')) {
                return viewCompro('register.complete');
            }
        }

        return redirect(route('register'));
    }

    public function stepValidation(Request $request)
    {
        if ($rules = $this->rules($request->step)) {
            $request->validate($rules, $this->messages(), $this->attributes());
        }

        return response()->json(['success' => true]);
    }

    public function register(Request $request)
    {
        $request->merge(['no_hp' => str_replace(' ', '', $request->no_hp)]);
        $request->merge(['no_wa' => str_replace(' ', '', $request->has('check_whatsapp_number') ? $request->no_hp : $request->no_wa)]);

        $request->validate($this->rules(), $this->messages(), $this->attributes());

        $wilayah = Kecamatan::find($request->wilayah);
        $negara = Negara::find($request->negara_id);
        $kategoriJob = KategoriJob::find($request->kategori_job_id);
        $provinsi = Provinsi::find($wilayah?->kota?->provinsi_id);
        $kota = Kota::find($wilayah?->kota_id);
        $noHp = $request->no_hp;
        $noWa = $request->no_wa;

        $agama = [
            0 => null,
            1 => 'Islam',
            2 => 'Kristen',
            3 => 'Katolik',
            4 => 'Hindu',
            5 => 'Buddha',
            6 => 'Khonghucu',
            7 => 'Lainnya'
        ];

        $kondisiPaspor = [
            0 => null,
            1 => "Paspor saya fisiknya masih ada",
            2 => "Paspor saya hilang",
            3 => "Paspor saya rusak",
            4 => "Paspor saya ditahan agency sebelumnya",
            5 => "Paspor saya terdapat data yang berbeda",
        ];

        $referensi = [
            0 => null,
            1 => 'Google',
            2 => 'instagram',
            3 => 'Facebook',
            4 => 'Tiktok',
            5 => 'Teman/Saudara/Keluarga',
            6 => 'Sponsor'
        ];

        DB::beginTransaction();

        try {
            /** INSERT USER */
            $user = User::create([
                'name' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_kandidat' => 1
            ]);

            /** INSERT PENDAFTARAN */
            $pendaftaran = [
                'negara_id' => $request->negara_id,
                'nama_negara' => $negara?->nama_negara,
                'kategori_job_id' => $request->kategori_job_id,
                'nama_kategori_job' => $kategoriJob?->nama_kategori_job,
                'nik' => $request->nik,
                'nama_lengkap' => $request->nama_lengkap,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'status' => 'Belum Verifikasi(Pending)'
            ];

            $pendaftaran = Pendaftaran::create($pendaftaran);

            /** INSERT KANDIDAT */
            $kandidat = [
                'pendaftaran_id' => $pendaftaran->id,
                'nik' => $request->nik,
                'nama_lengkap' => $request->nama_lengkap,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'status' => 'Pending',
                'usia' => Carbon::parse($request->tanggal_lahir)->age ?? 0,
                'agama' => isset($agama[$request->agama]) ? $agama[$request->agama] : null,
                'berat_badan' => $request->berat_badan,
                'tinggi_badan' => $request->tinggi_badan,
                'jenis_kelamin' => $request->jenis_kelamin == 'P' ? 'Laki-laki' : 'Perempuan',
                'status_kawin' => $request->status_kawin,
                'nama_lengkap_ayah' => $request->nama_lengkap_ayah,
                'nama_lengkap_ibu' => $request->nama_lengkap_ibu,
                'alamat' => $request->alamat,
                'provinsi' => $provinsi?->nama_provinsi,
                'kota' => $kota?->nama_kota,
                'kecamatan' => $wilayah?->nama_kecamatan,
                'referensi' => isset($referensi[$request->referensi]) ? $referensi[$request->referensi] : null,
                'nama_referensi' => $request->referensi == 6 ? $request->nama_referensi : null,
                'no_paspor' => $request->no_paspor,
                'tanggal_pengeluaran_paspor' => $request->tanggal_pengeluaran_paspor,
                'masa_kadaluarsa' => $request->masa_kadaluarsa,
                'kantor_paspor' => $request->kantor_paspor,
                'kondisi_paspor' => isset($kondisiPaspor[$request->kondisi_paspor]) ? $kondisiPaspor[$request->kondisi_paspor] : null,
                'ada_ktp' => $request->has('check_ktp') ? 'Ya' : null,
                'ada_kk' => $request->has('check_kartu_keluarga') ? 'Ya' : null,
                'ada_akta_lahir' => $request->has('check_akta_lahir') ? 'Ya' : null,
                'ada_ijazah' => $request->has('check_ijazah') ? 'Ya' : null,
                'ada_buku_nikah' => $request->has('check_buku_nikah') ? 'Ya' : null,
                'ada_paspor' => $request->has('check_paspor') ? 'Ya' : null,
                'penjelasan_dokumen' => $request->penjelasan_dokumen,
                'email' => $request->email,
                'no_hp' => $noHp,
                'no_wa' => $noWa,
                'user_id' => $user->id
            ];

            /** UPLOAD FOTO */
            $filenameFoto = $request->file_foto->hashName();
            $dirFoto = 'upload/foto/';

            $uploadFoto = Storage::disk('public_uploads')->putFileAs($dirFoto, $request->file_foto, $filenameFoto, 'public');

            if ($uploadFoto) {
                $kandidat['foto'] = $filenameFoto;
            }

            /** UPLOAD PASPOR */
            $filenamePaspor = $request->file_paspor->hashName();
            $dirPaspor = 'upload/paspor/';

            $uploadPaspor = Storage::disk('public_uploads')->putFileAs($dirPaspor, $request->file_paspor, $filenamePaspor, 'public');

            if ($uploadPaspor) {
                $kandidat['paspor'] = $filenamePaspor;
            }

            /** UPLOAD KTP */
            $filenameKTP = $request->file_ktp->hashName();
            $dirKTP = 'upload/ktp/';

            $uploadKTP = Storage::disk('public_uploads')->putFileAs($dirKTP, $request->file_ktp, $filenameKTP, 'public');

            if ($uploadKTP) {
                $kandidat['ktp'] = $filenameKTP;
            }

            /** UPLOAD KK */
            $filenameKK = $request->file_kk->hashName();
            $dirKK = 'upload/kartu-keluarga/';

            $uploadKK = Storage::disk('public_uploads')->putFileAs($dirKK, $request->file_kk, $filenameKK, 'public');

            if ($uploadKK) {
                $kandidat['kk'] = $filenameKK;
            }

            Kandidat::create($kandidat);

            /** INSERT PENGALAMAN KERJA */
            $pengalamanKerja = [];

            for ($i = 0; $i < count($request->negara_tempat_kerja); $i++) {
                $negaraTempatKerja = isset($request->negara_tempat_kerja[$i]) ? $request->negara_tempat_kerja[$i] : null;
                $namaPerusahaan = isset($request->nama_perusahaan[$i]) ? $request->nama_perusahaan[$i] : null;
                $tanggalMulaiKerja = isset($request->tanggal_mulai_kerja[$i]) ? $request->tanggal_mulai_kerja[$i] : null;
                $tanggalSelesaiKerja = isset($request->tanggal_selesai_kerja[$i]) ? $request->tanggal_selesai_kerja[$i] : null;
                $posisi = isset($request->posisi[$i]) ? $request->posisi[$i] : null;

                $pengalamanKerja[] = [
                    'pendaftaran_id' => $pendaftaran->id,
                    'negara_tempat_kerja' => $negaraTempatKerja,
                    'nama_perusahaan' => $namaPerusahaan,
                    'tanggal_mulai_kerja' => $tanggalMulaiKerja,
                    'tanggal_selesai_kerja' => $tanggalSelesaiKerja,
                    'posisi' => $posisi,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }

            if (count($pengalamanKerja) > 0) {
                PengalamanKerja::insert($pengalamanKerja);
            }

            DB::commit();

            session(['is_register' => 'true', 'register_id' => $pendaftaran->id]);

            return response()->json(['success' => true, 'message' => 'Register succesfully']);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
    }

    private function rules($step = null)
    {
        $rules = [
            1 => [
                'negara_id' => 'required|numeric',
                'kategori_job_id' => 'required|numeric',
                'nik' => 'required|numeric|max_digits:16|min_digits:16',
                'nama_lengkap' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|date_format:Y-m-d',
                'agama' => 'required|numeric',
                'berat_badan' => 'required|numeric',
                'tinggi_badan' => 'required|numeric',
                'jenis_kelamin' => 'required|in:P,W',
                'status_kawin' => 'required',
                'nama_lengkap_ayah' => 'required',
                'nama_lengkap_ibu' => 'required',
                'alamat' => 'required|min:5',
                'wilayah' => 'required|numeric',
                // 'provinsi_id' => 'required|numeric',
                // 'kota_id' => 'required|numeric',
                // 'kecamatan_id' => 'required|numeric',
                'referensi' => 'required|numeric',
                'nama_referensi' => 'required_if:referensi,6',
            ],
            2 => [
                'no_paspor' => 'required|numeric|max_digits:16|min_digits:16',
                'tanggal_pengeluaran_paspor' => 'required|date_format:Y-m-d',
                'masa_kadaluarsa' => 'required|date_format:Y-m-d',
                'kantor_paspor' => 'required|min:3',
                'kondisi_paspor' => 'required|numeric'
            ],
            3 => [
                'negara_tempat_kerja.*' => 'required|min:3',
                'nama_perusahaan.*' => 'required|min:3',
                'tanggal_mulai_kerja.*' => 'required|date_format:Y-m-d',
                'tanggal_selesai_kerja.*' => 'required|date_format:Y-m-d',
                'posisi.*' => 'required|min:2',
            ],
            5 => [
                'file_foto' => 'required|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
                'file_paspor' => 'nullable|max:10240|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
                'file_ktp' => 'required|max:10240|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
                'file_kk' => 'required|max:10240|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
            ],
            6 => [
                'email' => 'required|email|unique:users,email',
                'no_hp' => 'required|numeric|min_digits:6|max_digits:14',
                'no_wa' => 'required|numeric|min_digits:6|max_digits:14',
                'password' =>  ['required', 'confirmed', Password::min(6)],
                'password_confirmation' => 'required'
            ]
        ];

        if ($step) {
            return isset($rules[$step]) ? $rules[$step] : null;
        }

        $mergeRules = [];

        foreach ($rules as $rule) {
            foreach ($rule as $k => $v) {
                $mergeRules[$k] = $v;
            }
        }

        return $mergeRules;
    }

    private function attributes()
    {
        return [
            'negara_id' => 'Negara yang diminati',
            'kategori_job_id' => 'Kategori yang diminati',
            'nik' => 'Nomor NIK',
            'nama_lengkap' => 'Nama lengkap',
            'tempat_lahir' => 'Tempat lahir',
            'tanggal_lahir' => 'Tanggal lahir',
            'agama' => 'Agama',
            'berat_badan' => 'Berat badan',
            'tinggi_badan' => 'Tinggi badan',
            'jenis_kelamin' => 'Jenis kelamin',
            'status_kawin' => 'Status kawin',
            'nama_lengkap_ayah' => 'Nama lengkap ayah',
            'nama_lengkap_ibu' => 'Nama lengkap ibu',
            'alamat' => 'Alamat',
            'provinsi_id' => 'Provinsi',
            'kota_id' => 'Kota',
            'kecamatan_id' => 'Kecamatan',
            'referensi' => 'Referensi',
            'nama_referensi' => 'Nama referensi',
            'no_paspor' => 'Nomor paspor',
            'tanggal_pengeluaran_paspor' => 'Tanggal pengeluaran paspor',
            'masa_kadaluarsa' => 'Masa kadaluarsa',
            'kantor_paspor' => 'Kantor yang mengeluarkan paspor',
            'kondisi_paspor' => 'Kondisi paspor',
            'negara_tempat_kerja.*' => 'Negara tempat bekerja',
            'nama_perusahaan.*' => 'Nama perusahaan atau majikan',
            'tanggal_mulai_kerja.*' => 'Tanggal mulai kerja',
            'tanggal_selesai_kerja.*' => 'Tanggal selesai kerja',
            'posisi.*' => 'Posisi',
            'file_foto' => 'Foto',
            'file_paspor' => 'Paspor',
            'file_ktp' => 'KTP',
            'file_kk' => 'Kartu keluarga',
            'email' => 'Email',
            'no_hp' => 'Nomor handphone',
            'no_wa' => 'Nomor whatsapp',
            'password' => 'Password',
            'password_confirmation' => 'Konfirmasi password'
        ];
    }

    private function messages()
    {
        return  [
            'required' => ':attribute belum diisi',
            'negara_id.required' => ':attribute belum dipilih',
            'kategori_job_id.required' => ':attribute belum dipilih',
            'agama.required' => ':attribute belum dipilih',
            'jenis_kelamin.required' => ':attribute belum dipilih',
            'status_kawin.required' => ':attribute belum dipilih',
            'provinsi_id.required' => ':attribute belum dipilih',
            'kota_id.required' => ':attribute belum dipilih',
            'kecamatan_id.required' => ':attribute belum dipilih',
            'referensi.required' => ':attribute belum dipilih',
            'tanggal_lahir.date_format' => ':attribute tidak valid',
            'in' => ':attribute tidak valid',
            'min_digits' => ':attribute minimal :min digit',
            'max_digits' => ':attribute maksimal :max digit',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'nama_referensi.required_if' => ':attribute belum diisi',
            'kondisi_paspor.required' => ':attribute belum dipilih',
            'file_foto.required' => 'File :attribute belum dipilih',
            'file_ktp.required' => 'File :attribute belum dipilih',
            'file_kk.required' => 'File :attribute belum dipilih',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
            'email' => 'Format email tidak valid',
            'unique' => ':attribute sudah digunakan'
        ];
    }
}
