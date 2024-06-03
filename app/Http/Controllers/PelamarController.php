<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function index()  {
        
            return view('back.pelamar.index');
    }
}
