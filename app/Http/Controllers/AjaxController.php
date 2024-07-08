<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getCity(Request $request, $provinceId = null)
    {
        $cities = Kota::when($provinceId != null, function ($q) use ($provinceId) {
            return $q->where('provinsi_id', $provinceId);
        })
            ->when($request->term, function ($q) use ($request) {
                return $q->where('nama_kota', 'like', '%' . $request->term . '%');
            })
            ->get();

        return response()->json(['data' => $cities, '_token' => csrf_token()]);
    }

    public function getSubdistrict(Request $request, $cityId = null)
    {
        $subdistricts = Kecamatan::when($cityId != null, function ($q) use ($cityId) {
            return $q->where('kota_id', $cityId);
        })
            ->when($request->term, function ($q) use ($request) {
                return $q->where('nama_kecamatan', 'like', '%' . $request->term . '%');
            })
            ->get();

        return response()->json(['data' => $subdistricts, '_token' => csrf_token()]);
    }

    public function searchWilayah(Request $request)
    {
        $resultCount = 20;
        $wilayah = Kecamatan::select('kecamatan.id as id','nama_kecamatan', 'nama_kota', 'nama_provinsi')
                                ->join('kota', 'kota.id', 'kecamatan.kota_id')
                                ->join('provinsi', 'provinsi.id', 'kota.provinsi_id')
                                ->where('nama_kecamatan', 'LIKE', '%' . $request->term . '%')
                                ->orWhere('nama_kota', 'LIKE', '%' . $request->term . '%')
                                ->orWhere('nama_provinsi', 'LIKE', '%' . $request->term . '%')
                                ->simplePaginate($resultCount);

        $morePages = true;

        if (empty($wilayah->nextPageUrl())) {
            $morePages = false;
        }

        return response()->json(['more_pagination' => $morePages, 'data' => $wilayah->items()]);
    }

    public function wilayah()
    {
        // set_time_limit(36000000);
        // $kelurahan = Kelurahan::select('kelurahan.id', 'kecamatan.id as kecamatan_id', 'kota.id as kota_id', 'provinsi.id as provinsi_id')
        //                         ->join('kecamatan', 'kecamatan.id', 'kecamatan_id')
        //                         ->join('kota', 'kota.id', 'kecamatan.kota_id')
        //                         ->join('provinsi', 'provinsi.id', 'kota.provinsi_id')
        //                         ->skip(80000)->take(10000)
        //                         ->get();
        // $arr = [];

        // foreach ($kelurahan as $kel) {
        //     $arr[] = [
        //         'kelurahan_id' => $kel->id,
        //         'kecamatan_id' => $kel->kecamatan_id,
        //         'kota_id' => $kel->kota_id,
        //         'provinsi_id' => $kel->provinsi_id,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ];
        // }

        // dd($arr);

        // Wilayah::insert($arr);
    }
    public function getJob(Request $request)
    {
        // dd($request->all());
        $q = $request->get("search");
        $jobsQuery = Job::active()->orderBy('id', 'desc');
        
        if($request->has('search')){
            $jobsQuery->where('nama_job', 'like', '%'.$q.'%');
        }
        
        if($request->negara !== null){
            $jobsQuery->where('negara_id', $request->negara);
        }
        
        $jobs = $jobsQuery->get();
        
        foreach($jobs as $job){
           $hasid = hashId($job->id);
           $job->hashid = $hasid;
        }
        
        return response()->json($jobs);
    }
}
