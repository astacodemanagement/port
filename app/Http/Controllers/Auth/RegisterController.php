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
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

        return view('front.register.index', compact('countries', 'categories', 'provinces'));
    }

    public function completeRegistration()
    {
        if (session()->has('is_register')) {
            if (session('is_register')) {
                return view('front.register.complete');
            }
        }

        return redirect(route('register'));
    }

    public function register(Request $request)
    {
            
        $negara = Negara::find($request->negara_id);
        $kategoriJob = KategoriJob::find($request->kategori_job_id);
        $provinsi = Provinsi::find($request->provinsi_id);
        $kota = Kota::find($request->kota_id);
        $kecamatan = Kecamatan::find($request->kecamatan_id);

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
                'nik' => $request->nik,
                'nama_lengkap' => $request->nama_lengkap,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'status' => 'Pending',
                'usia' => Carbon::parse($request->tanggal_lahir)->age ?? 0,
                'agama' => $request->agama,
                'berat_badan' => $request->berat_badan,
                'tinggi_badan' => $request->tinggi_badan,
                'jenis_kelamin' => $request->jenis_kelamin == 'P' ? 'Laki-laki' : 'Perempuan',
                'status_kawin' => $request->status_kawin,
                'nama_lengkap_ayah' => $request->nama_lengkap_ayah,
                'nama_lengkap_ibu' => $request->nama_lengkap_ibu,
                'alamat' => $request->alamat,
                'provinsi' => $provinsi?->nama_provinsi,
                'kota' => $kota?->nama_kota,
                'kecamatan' => $kecamatan?->nama_kecamatan,
                'referensi' => isset($referensi[$request->referensi]) ? $referensi[$request->referensi] : null,
                'nama_referensi' => $request->referensi == 6 ? $request->nama_referensi : null,
                'no_paspor' => $request->no_paspor,
                'tanggal_pengeluaran_paspor' => $request->tanggal_pengeluaran_paspor,
                'masa_kadaluarsa' => $request->masa_kadaluarsa,
                'kantor_paspor' => $request->kantor_paspor,
                'kondisi_paspor' => isset($kondisiPaspor[$request->kondisi_paspor]) ? $kondisiPaspor[$request->kondisi_paspor] : null,
            ];
    
            Kandidat::create($kandidat);
    
            /** INSERT PENGALAMAN KERJA */
            $pengalamanKerja = [];
    
            for($i = 0; $i < count($request->negara_tempat_kerja); $i++) {
                $negaraTempatKerja = isset($request->negara_tempat_kerja[$i]) ? $request->negara_tempat_kerja[$i] : null;
                $namaPerusahaan = isset($request->nama_perusahaan[$i]) ? $request->nama_perusahaan[$i] : null;
                $tanggalMulaiKerja = isset($request->tanggal_mulai_kerja[$i]) ? $request->tanggal_mulai_kerja[$i] : null;
                $tanggalSelesaiKerja = isset($request->tanggal_selesai_kerja[$i]) ? $request->tanggal_selesai_kerja[$i] : null;
                $posisi = isset($request->posisi[$i]) ? $request->posisi[$i] : null;
    
                $pengalamanKerja [] = [
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
}
