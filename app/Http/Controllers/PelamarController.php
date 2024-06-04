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
            $data['pelamar'] = Pendaftaran::where('status', $status)->orderBy('id', 'desc')->with('kandidat')->paginate(4);  
        }
        // dd($data['pelamar']);
        $data['filter_job'] = $request->input('filter_job');
        if($data["filter_job"]){
            $data['pelamar'] = Pendaftaran::where('status', $status)
            ->where('kategori_job_id', $data['filter_job'])
            ->with('kandidat')
            ->orderBy('id', 'desc')->paginate(4);
        }
        $data['filter_gender'] = $request->input('filter_gender');
        if($data["filter_gender"]){
            $data['pelamar'] = Pendaftaran::where('status', $status)
            ->where('jenis_kelamin', $data['filter_gender'])
            ->with('kandidat')
            ->orderBy('id', 'desc')->paginate(4);
        }
        $data['filter_height'] = $request->input('filter_height');
        if($data["filter_height"]){
            $data['pelamar'] = Pendaftaran::where('status', $status)
            ->where('tinggi_badan', $data['filter_height'])
            ->with('kandidat')
            ->orderBy('id', 'desc')->paginate(4);
        }
        // dd($data);
        $data['kategori_job'] = KategoriJob::all();

            return view('back.pelamar.index',$data);
    }
}
