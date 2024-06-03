<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'job';
    protected $guarded = [];

    public function benefits()
    {
        return $this->hasMany(Benefit::class, 'job_id');  // Sesuaikan dengan skema relasi Anda
    }

    public function negara()
    {
        return $this->belongsTo(Negara::class);
    }

    public function gambar()
    {
        return $this->belongsTo(Gambar::class, 'id', 'job_id');
    }

    public function jobKategori()
    {
        return $this->belongsTo(KategoriJob::class, 'kategori_job_id', 'id');
    }
}
