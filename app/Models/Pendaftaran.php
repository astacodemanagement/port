<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $guarded = [];

    public function kandidat()
    {
        return $this->hasOne(Kandidat::class, 'pendaftaran_id', 'id');
    }

    public function kategoriJob()
    {
        return $this->belongsTo(KategoriJob::class, 'kategori_job_id', 'id');
    }
}
