<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = ['compro','logo','nama_perusahaan','alamat','email','telepon','twitter','facebook','instagram','youtube','footer'];
}
