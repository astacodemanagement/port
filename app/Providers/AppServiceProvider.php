<?php

namespace App\Providers;

use App\Models\Pendaftaran;
use App\Models\PengalamanKerja;
use App\Models\Seleksi;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
            // Share the count of non-active users with all views
            $belumVerifikasi = Pendaftaran::where('status', 'Belum Verifikasi(Pending)')->count();
            View::share('belumVerifikasi', $belumVerifikasi);


        View::composer('*member*', function ($view) {
            $user = auth()->user();
            $workExperiences = PengalamanKerja::where('pendaftaran_id', $user?->kandidat?->pendaftaran?->id)->limit(3)->orderBy('id', 'desc')->get();
            $appliedJobs = Seleksi::where('kandidat_id', auth()->user()->kandidat->id)->orderBy('id', 'desc')->limit(3)->get();
            $jobCompleted = Seleksi::where('kandidat_id', auth()->user()->kandidat->id)->where('status', 'Selesai Kontrak')->get();
            View::share([
                'work_experiences' => $workExperiences,
                'recent_applied_jobs' => $appliedJobs,
                'job_completed' => $jobCompleted,
            ]);
        });
    }
}
