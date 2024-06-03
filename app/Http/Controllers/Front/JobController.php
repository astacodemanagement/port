<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\KategoriJob;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $kategori = KategoriJob::all();
        $jobs = Job::active()->paginate(12);

        return viewCompro('jobs.index', compact('kategori', 'jobs'));
    }

    public function show($id)
    {
        $id = hashId($id, 'decode');
        $job = Job::active()->where('id', $id)->firstOrFail();
        $relateJobs = Job::active()->where('kategori_job_id', $job->kategori_job_id)->where('id', '!=', $id)->orderBy('id', 'desc')->limit(4)->get();

        return view('front.compro-1.jobs.detail', compact('job', 'relateJobs'));
    }
}
