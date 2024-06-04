<?php

namespace App\Http\Controllers;

use App\Models\KategoriJob;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function index(Request $request,$status)  {
        $data['status'] = $status;
        $search = $request->input('search');
        if($search){
            $data['pelamar'] = Pendaftaran::where('status', $status)->with('kandidat')
            ->whereHas('kandidat', function($query) use ($search){
                $query->where('provinsi', 'like', '%'.$search.'%');
            })
            ->orWhere('nama_lengkap', 'like', '%'.$search.'%')
            ->orderBy('id', 'desc')->paginate(4);
        }else{
            $data['pelamar'] = Pendaftaran::where('status', $status)->orderBy('id', 'desc')->paginate(4);  
        }
        
        $data['filter_job'] = $request->input('filter_job');
        if($data["filter_job"]){
            $data['pelamar'] = Pendaftaran::where('status', $status)
            ->where('kategori_job_id', $data['filter_job'])
            
            ->orderBy('id', 'desc')->paginate(4);
        }
        $data['kategori_job'] = KategoriJob::all();
            return view('back.pelamar.index',$data);
    }
}
