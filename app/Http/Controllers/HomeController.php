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
      $jobs = Job::orderBy('id', 'desc')->limit(4)->get();
      $alasan = Alasan::all();
      
      return viewCompro('home', compact('slider','alasan', 'jobs','review'));
   }
}
