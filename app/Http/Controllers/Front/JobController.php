<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\KategoriJob;
use App\Models\Seleksi;
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
        // carbon create at
        $job->create_at = $job->created_at->diffForHumans();
        $relateJobs = Job::active()->where('kategori_job_id', $job->kategori_job_id)->where('id', '!=', $id)->orderBy('id', 'desc')->limit(4)->get();

        return viewCompro('jobs.detail', compact('job', 'relateJobs'));
    }

    public function apply($jobId)
    {
        $id = hashId($jobId, 'decode');
        $job = Job::active()->where('id', $id)->firstOrFail();

        if (!auth()->user()?->kandidat) {
            return redirect(route('front.jobs.show', $jobId));
        }
        
        $createSlection = Seleksi::create([
            'kandidat_id' => auth()->user()->kandidat->id,
            'job_id' => $job->id,
            'tanggal_apply' => today()->format('Y-m-d'),
            'status' => 'Cek Kualifikasi'
        ]);

        return redirect(route('member.jobs.applied.show', hashId($createSlection->id)))->with('success', 'Pekerjaan berhasil dilamar');
    }
}
