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
        return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id', 'id');
    }

    

    public function pengalamanKerja()
    {
        return $this->hasMany(PengalamanKerja::class, 'pendaftaran_id', 'pendaftaran_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function seleksi()
    {
        return $this->belongsTo(Seleksi::class, 'kandidat_id');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id', 'id');
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class, 'kota_id', 'id');
    }

    public function kecamatan()
    {
        return  $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }


    public function screaning()
    {
        return $this->hasOne(Screaning::class, 'id_kandidat', 'id');
    }
}
