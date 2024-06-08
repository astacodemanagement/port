<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Seleksi;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('front.member.jobs.index');
    }

    public function applied()
    {
        return view('front.member.jobs.applied');
    }

    public function showApplied($appliedId)
    {
        $id = hashId($appliedId, 'decode');
        $appliedJob = Seleksi::where('id', $id)->firstOrFail();

        return view('front.member.jobs.show-applied', compact('appliedJob'));
    }
}
