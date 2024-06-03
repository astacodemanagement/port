<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\KategoriJob;
use App\Models\Negara;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class FeCompanyprofile2 extends Controller
{
    public function compro2(){

        $data['job'] =  Job::orderBy('id', 'desc')->with('benefits','negara','gambar')->limit(4)->get();
        
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
        $data['countries'] = Negara::all();
        $data['categories'] = KategoriJob::all();
        $data['provinces'] = Provinsi::all();

        return view('front.compro-2.register.index',$data);
    }
}
