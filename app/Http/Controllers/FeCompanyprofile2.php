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

        $data['job'] =  Job::orderBy('id', 'desc')->limit(8)->get();
        foreach ($data['job'] as $key => $value) {
            $value->estimasi_minimal = $value->estimasi_minimal / 1000000;
            $value->estimasi_maksimal = $value->estimasi_maksimal / 1000000;
        }
      
        return view('front.compro-2.home',$data);
    }

    public function job(){
        return view('front.compro-2.job');
    }
    public function jobdetail($id){
        $data["job"] =  Job::find($id);
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
    public function complete(){
        return view('front.compro-2.register.complete');
    }
}
