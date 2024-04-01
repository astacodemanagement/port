<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    protected $table = 'kandidat';
    protected $guarded = [];
    
    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'nik', 'nik');
    }

    public function seleksi()
    {
        return $this->belongsTo(Seleksi::class, 'kandidat_id');
    }
}
