<?php

namespace App\Http\Controllers;

use App\Models\Alasan;
use App\Models\Job;
use App\Models\Review;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
      $slider = Slider::all();
      $review = Review::all();
      $jobs = Job::active()->orderBy('id', 'desc')->limit(4)->get();
      $alasan = Alasan::all();
      if(request()->has('search')){
         $jobs = Job::active()->where('nama_job', 'like', '%'.request('search').'%')->orderBy('id', 'desc')->paginate(12);
      }
      
      return viewCompro('home', compact('slider','alasan', 'jobs','review'));
   }
}
