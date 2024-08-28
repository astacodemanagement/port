<?php

namespace App\Http\Controllers;

use App\Models\Alasan;
use App\Models\Job;
use App\Models\Negara;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   public function index()
   {
      dd(request()->host());
      if(request()->host() == env('COMPRO_1')){
         $slider = Slider::where('compro', 1)->orderBy('id', 'desc')->limit(4)->get();
         $review = Review::where('compro',1)->orderBy('id','desc')->limit(4)->get();
      }else{
         $slider = Slider::where('compro', 2)->orderBy('id', 'desc')->limit(4)->get();
         $review = Review::where('compro',2)->orderBy('id','desc')->limit(4)->get();
      }

      $jobs = Job::active()->orderBy('id', 'desc')->limit(4)->get();
      $alasan = Alasan::all();
      $negara = Negara::all();
      $step = Step::orderBy('urutan', 'asc')->limit(4)->get();
      
     
      
      return  viewCompro('home', compact('slider','alasan', 'jobs','review','negara','step'));
   }
}
