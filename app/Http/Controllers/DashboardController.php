<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Kandidat;
use App\Models\Negara;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(){ 
      $data['count_job'] = Job::count();
      $data['count_kandidat'] = Kandidat::count();
      $data['count_negara'] = Negara::count();
      $data['pelamar'] = Kandidat::limit(5)->get();
      $data['pengaduan'] = Pengaduan::limit(7)->get();
    return view('back.dashboard',$data);
   }
}
