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
      $job = Job::all();
      $alasan = Alasan::all();
      return view('front.home', compact('slider','alasan','job','review'));
   }
}
