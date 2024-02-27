<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 6; $i++) {
            DB::table('pendaftaran')->insert([
                'negara_id' => $faker->randomNumber(),
                'nama_negara' => $faker->country,
                'kategori_job_id' => $faker->randomNumber(),
                'nama_kategori_job' => $faker->jobTitle,
                'nik' => $faker->unique()->numerify('##############'),
                'nama_lengkap' => $faker->name,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date,
                'usia' => $faker->randomNumber(2),
                'agama' => $faker->randomElement(['Islam', 'Christianity', 'Hinduism', 'Buddhism', 'Other']),
                'berat_badan' => $faker->randomNumber(2),
                'tinggi_badan' => $faker->randomNumber(3),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'status_kawin' => $faker->randomElement(['Belum Menikah', 'Menikah', 'Cerai']),
                'nama_lengkap_ayah' => $faker->name('male'),
                'nama_lengkap_ibu' => $faker->name('female'),
                'alamat' => $faker->address,
                'kota' => $faker->city,
                'kecamatan' => $faker->citySuffix,
                'provinsi' => $faker->state,
                'referensi' => $faker->word,
                'nama_referensi' => $faker->name,
                'no_paspor' => $faker->numerify('############'),
                'tanggal_pengeluaran_paspor' => $faker->date,
                'masa_kadaluarsa' => $faker->date,
                'kantor_paspor' => $faker->company,
                'kondisi_paspor' => $faker->randomElement(['Baik', 'Rusak']),
                'level_bahasa_inggris' => $faker->randomElement(['Beginner', 'Intermediate', 'Advanced']),
                'sertifikat_bahasa_inggris' => $faker->word,
                'memiliki_anak' => $faker->randomElement(['Ya', 'Tidak']),
                'jumlah_anak' => $faker->randomNumber(1),
                'usia_anak' => $faker->randomNumber(1),
                'yakin_kerja_diluar_negeri' => $faker->randomElement(['Ya', 'Tidak']),
                'patuh_peraturan' => $faker->randomElement(['Ya', 'Tidak']),
                'motivasi' => $faker->sentence,
                'apa_anda_sehat' => $faker->randomElement(['Ya', 'Tidak']),
                'keterbatasan_fisik' => $faker->randomElement(['Ya', 'Tidak']),
                'keterangan_keterbatasan_fisik' => $faker->sentence,
                'pernah_operasi' => $faker->randomElement(['Ya', 'Tidak']),
                'keterangan_pernah_operasi' => $faker->sentence,
                'riwayat_penyakit_rawat' => $faker->randomElement(['Ya', 'Tidak']),
                'keterangan_riwayat_penyakit_rawat' => $faker->sentence,
                'apa_anda_hamil' => $faker->randomElement(['Ya', 'Tidak']),
                'foto' => $faker->imageUrl(),
                'paspor' => $faker->imageUrl(),
                'ktp' => $faker->imageUrl(),
                'kk' => $faker->imageUrl(),
                'sertifikat_kompetensi' => $faker->imageUrl(),
                'paklaring' => $faker->imageUrl(),
                'video_diri' => $faker->url,
                'video_skill' => $faker->url,
                'password' => bcrypt($faker->password),
                'status' => $faker->randomElement(['Pending', 'Approved', 'Rejected']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
