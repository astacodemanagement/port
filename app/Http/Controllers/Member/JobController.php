<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Seleksi;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $seleksi = Seleksi::where('kandidat_id', auth()->user()->kandidat->id)->get();
        return view('front.member.jobs.index',compact('seleksi'));
    }

    public function applied()
    {

        $seleksi = Seleksi::where('kandidat_id', auth()->user()->kandidat->id)->get();
        return view('front.member.jobs.applied',compact('seleksi'));
    }

    public function showApplied($appliedId)
    {
        $id = hashId($appliedId, 'decode');
        $appliedJob = Seleksi::where('id', $id)->firstOrFail();

        return view('front.member.jobs.show-applied', compact('appliedJob'));
    }
}
