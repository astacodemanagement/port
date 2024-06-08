<?php

namespace App\Providers;

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
        View::composer('*member*', function ($view) {
            $user = auth()->user();
            $workExperiences = PengalamanKerja::where('pendaftaran_id', $user?->kandidat?->pendaftaran?->id)->limit(3)->orderBy('id', 'desc')->get();
            $appliedJobs = Seleksi::where('kandidat_id', auth()->user()->kandidat->id)->orderBy('id', 'desc')->limit(3)->get();

            View::share([
                'work_experiences' => $workExperiences,
                'recent_applied_jobs' => $appliedJobs
            ]);
        });
    }
}
