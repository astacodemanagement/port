<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $guarded = [];

  
    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id', 'id');
    }
}
