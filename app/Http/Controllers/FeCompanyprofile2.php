<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeCompanyprofile2 extends Controller
{
    public function compro2(){
        return view('front.compro-2.home');
    }

    public function job(){
        return view('front.compro-2.job');
    }
    public function jobdetail(){
        return view('front.compro-2.job-detail');
    }

    public function employe(){
        return view('front.compro-2.employe');
    }
    
    public function daftar(){
        return view('front.compro-2.daftar');
    }
}
