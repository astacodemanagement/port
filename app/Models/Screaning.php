<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screaning extends Model
{
    use HasFactory;

    protected $table = 'screaning';

    protected $guarded = [];

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'id_kandidat', 'id');
    }
}

