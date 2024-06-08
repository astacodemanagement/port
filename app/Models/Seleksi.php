<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seleksi extends Model
{
    use HasFactory;
    protected $table = 'seleksi';
    protected $guarded = [];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id');
    }

    public function pendaftaran()
    {
        return $this->hasOneThrough(Pendaftaran::class, Kandidat::class, 'id', 'id', 'kandidat_id', 'pendaftaran_id');
    }

    public function kategoriJob()
    {
        return $this->hasOneThrough(KategoriJob::class, Pendaftaran::class, 'kategori_job_id', 'id', 'pendaftaran_id', 'id');
    }

    public function pengalamanKerja()
    {
        return $this->hasManyThrough(PengalamanKerja::class, Pendaftaran::class, 'id', 'pendaftaran_id', 'pendaftaran_id', 'id');
    }
}

