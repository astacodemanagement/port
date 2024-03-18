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
}
