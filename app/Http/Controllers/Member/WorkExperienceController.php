<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\PengalamanKerja;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    public function index()
    {
        return view('front.member.work-experience.index');
    }
    
    public function edit()
    {
        return view('front.member.work-experience.edit');
    }

    public function update(Request $request)
    {
        $request->validate([]);

        return view('front.member.work-experience.edit')->with(['success' => 'Work experience successfully updated']);
    }
}
