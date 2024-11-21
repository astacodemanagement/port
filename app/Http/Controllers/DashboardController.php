<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Kandidat;
use App\Models\Negara;
use App\Models\Pengaduan;
use App\Models\Seleksi;
use App\Models\Setting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(){ 
      $data['count_job'] = Job::count();
      $data['count_kandidat'] = Kandidat::count();
      $data['count_negara'] = Negara::count();
      $data['pelamar'] = Kandidat::limit(5)->get();
      $data['pengaduan'] = Pengaduan::limit(7)->get();
       $data['belum_verifikasi'] = Kandidat::where('status','Pending')->count();
      $data['verifikasi'] = Kandidat::where('status','Verifikasi')->count();
      $data['reject'] = Kandidat::where('status','Reject')->count();
      $data['backlist'] = Job::where('status','Backlist')->count();  
      $data['jobactive'] = Job::where('tanggal_tutup','>=',date('Y-m-d'))->get();
      $data['jobinactive'] = Job::where('tanggal_tutup','<',date('Y-m-d'))->get();
      $data['interview'] = Seleksi::where('status','Interview')->get();
      // return $data['jobactive'];
    return view('back.dashboard',$data);
   }
  
}
