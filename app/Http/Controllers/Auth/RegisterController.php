<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailJob;
use App\Models\Kandidat;
use App\Models\KategoriJob;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Negara;
use App\Models\Pendaftaran;
use App\Models\PengalamanKerja;
use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Wilayah;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Traits\UploadFile;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    use UploadFile;

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
        // dd($request->all());
        $request->merge(['no_hp' => str_replace(' ', '', $request->no_hp)]);
        $request->merge(['no_wa' => str_replace(' ', '', $request->has('check_whatsapp_number') ? $request->no_hp : $request->no_wa)]);
        $request->merge(['no_telp_darurat' => str_replace(' ', '', $request->no_telp_darurat)]);

        $request->validate($this->rules(), $this->messages(), $this->attributes());

        $wilayah = Kecamatan::find($request->wilayah);
        $negara = Negara::find($request->negara_id);
        $kategoriJob = KategoriJob::find($request->kategori_job_id);
        $provinsi = Provinsi::find($wilayah?->kota?->provinsi_id);
        $kota = Kota::find($wilayah?->kota_id);
        $noHp = $request->no_hp;
        $noWa = $request->no_wa;
        $kategori = [
            1 => 'dalam negeri',
            2 => 'luar negeri'
        ];
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
            6 => 'Disnaker/ BP2MI/ Instansi',
            7 => 'Partnership/Sponsor/PL'
        ];

        $statusKawin = [
            0 => null,
            1 => 'Belum Menikah',
            2 => 'Menikah',
            3 => 'Cerai'
        ];

        $pendidikanTerakhir = [
            1 => 'SD',
            2 => 'SMP',
            3 => 'SMA',
            4 => 'SMK',
            5 => 'D3',
            6 => 'D4',
            7 => 'S1',
            8 => 'S2',
            9 => 'S3'
        ];
       
        $hubungan = [
            1 => 'Orang Tua',
            2 => 'Saudara Kandung',
            3 => 'Suami/Istri',
        ];      

        DB::beginTransaction();

        try {
            $token = Str::random(64);

            /** INSERT USER */
            $user = User::create([
                'token' => $token,
                'name' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                // 'is_kandidat' => 1
            ]);
            $user->assignRole('member');
            /** INSERT PENDAFTARAN */
            $pendaftaran = [
                // 'negara_id' => $request->negara_id,
                'compro' => $request->compro ,
                'negara_id' => 0,
                'kategori_job_id' => $request->kategori_job_id,
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
                'status_kawin' => $statusKawin[$request->status_kawin],
                'pendidikan' => $pendidikanTerakhir[$request->pendidikan],
                'nama_lengkap_ayah' => $request->nama_lengkap_ayah,
                'nama_lengkap_ibu' => $request->nama_lengkap_ibu,
                'alamat' => $request->alamat,
                'provinsi_id' => $provinsi?->id,
                'kota_id' => $kota?->id,
                'keterangan_belum_kerja' => $request->has('keterangan_belum_kerja') ? 'Belum Bekerja' : null,
                'keterangan_tidak_ada_passpor' => $request->has('keteranga  n_tidak_ada_passpor') ? 'Tidak Ada Paspor' : null,
                'kecamatan_id' => $wilayah?->id,
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
                'hubungan' => $hubungan[$request->hubungan] ?? null,
                'no_telp_darurat' => $request->no_telp_darurat ?? null,
                'nama_kontak_darurat' => $request->nama_kontak_darurat ?? null,
                'user_id' => $user->id
            ];

            /** UPLOAD DOCUMENTS */
            $arrDoc = [
                [
                    'input' => 'file_foto',
                    'field' => 'foto',
                    'dir' => 'foto',
                ],
                [
                    'input' => 'file_ktp',
                    'field' => 'ktp',
                    'dir' => 'ktp',
                ],
            ];

            foreach ($arrDoc as $doc) {
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
                        $kandidat[$doc['field']] = $filename;
                    }
                }
            }

            /** END UPLOAD DOCUMENTS */


            // /** UPLOAD FOTO */
            // if ($request->hasFile('file_foto')) {
            //     $filenameFoto = $request->file_foto->hashName();
            //     $dirFoto = 'upload/foto/';

            //     $uploadFoto = Storage::disk('public_uploads')->putFileAs($dirFoto, $request->file_foto, $filenameFoto, 'public');

            //     if ($uploadFoto) {
            //         $kandidat['foto'] = $filenameFoto;
            //     }
            // }

            // /** UPLOAD PASPOR */
            // if ($request->hasFile('file_paspor')) {
            //     $filenamePaspor = $request->file_paspor->hashName();
            //     $dirPaspor = 'upload/paspor/';

            //     $uploadPaspor = Storage::disk('public_uploads')->putFileAs($dirPaspor, $request->file_paspor, $filenamePaspor, 'public');

            //     if ($uploadPaspor) {
            //         $kandidat['paspor'] = $filenamePaspor;
            //     }
            // }

            // /** UPLOAD KTP */
            // if ($request->hasFile('file_ktp')) {
            //     $filenameKTP = $request->file_ktp->hashName();
            //     $dirKTP = 'upload/ktp/';

            //     $uploadKTP = Storage::disk('public_uploads')->putFileAs($dirKTP, $request->file_ktp, $filenameKTP, 'public');

            //     if ($uploadKTP) {
            //         $kandidat['ktp'] = $filenameKTP;
            //     }
            // }

            // /** UPLOAD KK */
            // if ($request->hasFile('file_kk')) {
            //     $filenameKK = $request->file_kk->hashName();
            //     $dirKK = 'upload/kartu-keluarga/';

            //     $uploadKK = Storage::disk('public_uploads')->putFileAs($dirKK, $request->file_kk, $filenameKK, 'public');

            //     if ($uploadKK) {
            //         $kandidat['kk'] = $filenameKK;
            //     }
            // }

            Kandidat::create($kandidat);

            $pengalamanKerja = [];
            /** INSERT PENGALAMAN KERJA */
          if($request->keterangan_belum_kerja == null){
            for ($i = 0; $i < count($request->kategori); $i++) {
                $negaraTempatKerja = isset($request->kategori[$i]) ? $request->kategori[$i] : null;
                $negaraTempatKerja = isset($request->negara_tempat_kerja[$i]) ? $request->negara_tempat_kerja[$i] : "Indonesia";
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
        }

            if (count($pengalamanKerja) > 0) {
                PengalamanKerja::insert($pengalamanKerja);
            }
            $imagepsi = url('logo.png');
            $imageakama = url('akamalogo.png');
            if($request->compro  == 1 ){
                Mail::send('email.psi', ['token' => $token,'nama_lengkap' => $request->nama_lengkap,'image'=>$imagepsi], function($message) use ($request) {
                    $message->to($request->email);
                    $message->subject('Verifikasi Email');
                });
            }else{
                Mail::send('email.akama', ['token' => $token,'nama_lengkap' => $request->nama_lengkap,'image' => $imageakama], function($message) use ($request) {
                    $message->to($request->email);
                    $message->subject('Verifikasi Email');
                });
            }
        
            DB::commit();


            session(['is_register' => 'true', 'register_id' => $pendaftaran->id]);


            return response()->json(['success' => true, 'message' => 'Register succesfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("error register cuy" . $e->getMessage());
            return response()->json(['error' => false, 'message' => $e->getMessage()], 400);
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
                // 'negara_id' => 'required|numeric',
                'kategori_job_id' => 'required|numeric',
                'nik' => 'required|numeric|max_digits:16|min_digits:16|unique:kandidat,nik',
                'nama_lengkap' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|date_format:Y-m-d',
                'agama' => 'required|numeric',
                'berat_badan' => 'required|numeric',
                'tinggi_badan' => 'required|numeric',
                'jenis_kelamin' => 'required|in:P,W',
                'status_kawin' => 'required',
                'pendidikan' => 'required',
                'nama_lengkap_ayah' => 'required',
                'nama_lengkap_ibu' => 'required',
                'alamat' => 'required|min:5',
                'wilayah' => 'required|numeric',
                // 'provinsi_id' => 'required|numeric',
                // 'kota_id' => 'required|numeric',
                // 'kecamatan_id' => 'required|numeric',
                // 'level_bahasa' => 'required',
                'referensi' => 'required|numeric',
                'nama_referensi' => 'required_if:referensi,7',
            ],
            2 => [
                'no_paspor' => 'nullable|min:3|max:50',
                'tanggal_pengeluaran_paspor' => 'nullable|date_format:Y-m-d',
                'masa_kadaluarsa' => 'nullable|date_format:Y-m-d',
                'kantor_paspor' => 'nullable|min:3',
                'kondisi_paspor' => 'nullable|numeric'
            ],
            3 => [
                'negara_tempat_kerja.*' => 'nullable|min:3',
                'nama_perusahaan.*' => 'nullable|min:3',
                'tanggal_mulai_kerja.*' => 'nullable',
                'tanggal_selesai_kerja.*' => 'nullable',
                'posisi.*' => 'nullable|min:2',
                'keterangan_belum_kerja' => 'nullable'
            ],
            4 => [
                "check_ktp" => "required_without_all:check_kartu_keluarga,check_akta_lahir,check_ijazah,check_buku_nikah,check_paspor",
                "check_kartu_keluarga" => "required_without_all:check_ktp,check_akta_lahir,check_ijazah,check_buku_nikah,check_paspor",
                "check_akta_lahir" => "required_without_all:check_ktp,check_kartu_keluarga,check_ijazah,check_buku_nikah,check_paspor",
                "check_ijazah" => "required_without_all:check_ktp,check_kartu_keluarga,check_akta_lahir,check_buku_nikah,check_paspor",
                "check_buku_nikah" => "required_without_all:check_ktp,check_kartu_keluarga,check_akta_lahir,check_ijazah,check_paspor",
                "check_paspor" => "required_without_all:check_ktp,check_kartu_keluarga,check_akta_lahir,check_ijazah,check_buku_nikah",
                'file_foto' => 'required|max:10240|mimes:jpeg,jpg,bmp,png,webp',
                'file_ktp' => 'required|max:10240|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',

            ],

            5 => [
                'email' => 'required|email|unique:users,email',
                'no_hp' => 'required|numeric|min_digits:6|max_digits:14',
                'no_wa' => 'required|numeric|min_digits:6|max_digits:14',
                'hubungan' => 'required',
                'no_telp_darurat' => 'nullable|numeric|min_digits:6|max_digits:14', 
                'nama_kontak_darurat' => 'required',
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

    public function verifyEmail($token)
    {
        $user = User::where('token', $token)->first();

        if ($user) {
            User::where('token', $token)->update([
                'email_verified_at' => now(),

            ]);

            return redirect('/')->with('success', 'Email berhasil diverifikasi');
        }

        dd('token tidak valid');
    }




    private function attributes()
    {
        return [
            'negara_id' => 'Negara yang diminati',
            'kategori_job_id' => 'Industri yang diminati',
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
            'password_confirmation' => 'Konfirmasi password',
            'wilayah' => 'Wilayah',
            'pendidikan' => 'Pendidikan',
            'check_ktp' => 'KTP',
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
            'file_foto.max' => 'Ukuran file :attribute maksimal 10MB',
            'file_ktp.max' => 'Ukuran file :attribute maksimal 10MB',
            'file_kk.max' => 'Ukuran file :attribute maksimal 10MB',
            'file_paspor.max' => 'Ukuran file :attribute maksimal 10MB',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
            'email' => 'Format email tidak valid',
            'unique' => ':attribute sudah digunakan',
            'pendidikan.required' => ':attribute belum dipilih',
            'check_ktp.required_without_all' => 'Pilih salah satu dokumen',
            'check_kartu_keluarga.required_without_all' => 'Pilih salah satu dokumen',
            'check_akta_lahir.required_without_all' => 'Pilih salah satu dokumen',
            'check_ijazah.required_without_all' => 'Pilih salah satu dokumen',
            'check_buku_nikah.required_without_all' => 'Pilih salah satu dokumen',
            'check_paspor.required_without_all' => 'Pilih salah satu dokumen',

        ];
    }
}
