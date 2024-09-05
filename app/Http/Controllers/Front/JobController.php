<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\KategoriJob;
use App\Models\Seleksi;
use Carbon\Carbon;
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

        return viewCompro('jobs.detail', compact('job', 'relateJobs'));
    }

    public function apply($jobId)
    {
        $id = hashId($jobId, 'decode');
        $job = Job::active()->where('id', $id)->firstOrFail();
    
        if (!auth()->user()?->kandidat) {
            return redirect(route('front.jobs.show', $jobId));
        }
        $kandidatId = auth()->user()->kandidat->id;
    
        $existingApplication = Seleksi::where('kandidat_id', $kandidatId)
                                      ->where('job_id', $job->id)
                                      ->first();
        if ($existingApplication) {
            return redirect(route('front.jobs.show', $jobId))
                   ->with('error', 'Anda sudah melamar pekerjaan ini sebelumnya.');
        }
            $createSlection = Seleksi::create([
            'kandidat_id' => $kandidatId,
            'job_id' => $job->id,
            'tanggal_apply' => today()->format('Y-m-d'),
            'status' => 'Cek Kualifikasi'
        ]);
    
        return redirect(route('member.jobs.applied.show', hashId($createSlection->id)))
               ->with('success', 'Pekerjaan berhasil dilamar');
    }
    
}
