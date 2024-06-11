<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
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
            $value->estimasi_minimal = $value->estimasi_minimal / 1000;
            $value->estimasi_maksimal = $value->estimasi_maksimal / 1000;
        }
      
        return view('front.compro-2.home',$data);
    }

    public function job(){
        $data['job'] =  Job::orderBy('id', 'desc')->get();
        return view('front.compro-2.jobs.index',$data);
    }
    public function jobdetail($id){
        $data["job"] =  Job::find($id);
        $data['related_job'] = Job::limit(4)->get();
        // number format for estimasi minimal and maksimal
        $data["job"]->estimasi_minimal = number_format($data["job"]->estimasi_minimal , 0);
        $data["job"]->estimasi_maksimal = number_format($data["job"]->estimasi_maksimal , 0);
        $data["job"]->gaji = number_format($data["job"]->gaji , 0);
        $data["job"]->nominal_kurs = number_format($data["job"]->nominal_kurs , 0);
   //y-m-d in created at
        $data["job"]->created_at = date('Y-m-d', strtotime($data["job"]->created_at));


        return view('front.compro-2.jobs.detail',$data);
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
    public function login(){
        return view('front.compro-2.auth.login');
    }
}
