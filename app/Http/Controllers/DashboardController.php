<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(){ 
      $data['count_job'] = Job::count();
      
    return view('back.dashboard');
   }
}
