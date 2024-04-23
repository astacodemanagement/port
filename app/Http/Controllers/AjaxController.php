<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
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
}
