<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Kandidat;
use App\Models\Negara;
use App\Models\Pendaftaran;
use App\Models\Pengaduan;
use App\Models\Seleksi;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
      $data['jobactive'] = Job::where('tanggal_tutup','>=',date('Y-m-d'))->limit(5)->get();
      $data['jobinactive'] = Job::where('tanggal_tutup','<',date('Y-m-d'))->limit(5)->get();
      $data['interview'] = Seleksi::where('status','Interview')->get();
      $data['provinsi_count'] =  Kandidat::select('provinsi_id', DB::raw('COUNT(*) as total'))
      ->groupBy('provinsi_id')
      ->with('provinsi')
      ->orderBy('total','desc')
      ->get();
      $data['kategori_job_count'] = Pendaftaran::select('kategori_job_id', DB::raw('COUNT(*) as total'))
      ->groupBy('kategori_job_id')
      ->with('kategoriJob')
      ->orderBy('total','desc')
      ->get();
      $data['country_count'] = Job::select('negara_id', DB::raw('COUNT(*) as total'))
      ->groupBy('negara_id')
      ->with('negara')
      ->orderBy('total','desc')
      ->limit(6)
      ->get();
      // pendidikan count
      $data['pendidikan_count'] = Kandidat::select('pendidikan', DB::raw('COUNT(*) as total'))
      ->groupBy('pendidikan')
      ->orderBy('total','desc')
      ->get();
   // return $data['pendidikan_count'];
      // return $data['country_count'];
      return view('back.dashboard',$data);
   }
  
}
