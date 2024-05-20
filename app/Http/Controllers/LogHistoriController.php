<?php

namespace App\Http\Controllers;

use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogHistoriController extends Controller
{
   public function index(){
    

    $log_histori = LogHistori::orderBy('id', 'desc')->get();
    return view('back.log_histori.index', compact('log_histori'));
   }

   public function deleteAll()
   {
       try {
           // Use DB facade to perform a raw SQL delete query
           DB::statement('DELETE FROM log_histori');
           
           // Redirect back with a success message
           return redirect()->route('back-office.log-histori.index')->with('success', 'All data deleted successfully.');

       } catch (\Exception $e) {
           // Redirect back with an error message if something goes wrong
           return redirect()->route('back-office.log-histori.index')->with('success',  'Failed to delete data. Please try again.');

       }
   }

}
