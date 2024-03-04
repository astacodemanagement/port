<?php

use App\Http\Controllers\AlasanController;
use App\Http\Controllers\BelumVerifikasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\KategoriJobController;
use App\Http\Controllers\LogHistoriController;
use App\Http\Controllers\NegaraController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StepController;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\RejectVerifikasiController;
use App\Http\Controllers\SeleksiController;
use App\Http\Controllers\SudahVerifikasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [DashboardController::class, 'index']);

// Kandidat
Route::get('/kandidat', [KandidatController::class, 'index']);



// Belum Verifikasi
Route::get('/belum_diverifikasi', [BelumVerifikasiController::class, 'index']);
Route::post('/update-status', [BelumVerifikasiController::class, 'updateStatus'])->name('update.status'); 
Route::get('/belum_diverifikasi/{id}/detail', [BelumVerifikasiController::class, 'detail'])->name('belum_diverifikasi.detail');


// Sudah Verifikasi
Route::get('/sudah_diverifikasi', [SudahVerifikasiController::class, 'index']);
Route::post('/update-status', [SudahVerifikasiController::class, 'updateStatus'])->name('update.status'); 
Route::get('/sudah_diverifikasi/{id}/detail', [SudahVerifikasiController::class, 'detail'])->name('sudah_diverifikasi.detail');


// Reject Verifikasi
Route::get('/reject_diverifikasi', [RejectVerifikasiController::class, 'index']);
Route::post('/update-status', [RejectVerifikasiController::class, 'updateStatus'])->name('update.status'); 
Route::get('/reject_diverifikasi/{id}/detail', [RejectVerifikasiController::class, 'detail'])->name('reject_diverifikasi.detail');








// SELEKSI

// Awal Seleksi
Route::get('/seleksi', [SeleksiController::class, 'index']);
Route::post('/update-status-seleksi', [SeleksiController::class, 'updateStatus'])->name('update.status'); 
Route::get('/seleksi/{id}/detail', [SeleksiController::class, 'detail'])->name('seleksi.detail');





// Kategori Job
Route::get('/kategori_job', [KategoriJobController::class, 'index']);
Route::resource('kategori_job', KategoriJobController::class);
Route::get('/kategori_job/{id}/edit', [KategoriJobController::class, 'edit']);
Route::put('/kategori_job/{id}', [KategoriJobController::class, 'update']);

// Job
Route::get('/job', [JobController::class, 'index']);
Route::resource('job', JobController::class);
Route::post('/simpan_job', [JobController::class, 'store'])->name('simpan_job'); 
Route::get('/job/{id}/edit', [JobController::class, 'edit']);
Route::put('/job/{id}', [JobController::class, 'update']);
Route::get('/getNegara', [JobController::class, 'getList'])->name('getNegara');
Route::get('/getKategoriJob', [JobController::class, 'getKategoriJobList'])->name('getKategoriJob');
// web.php atau file rute lainnya
// Route::get('/getKategoriJob', [JobController::class, 'getKategoriJob'])->name('getKategoriJob');

Route::post('/upload-gambar', [JobController::class, 'uploadGambar'])->name('upload-gambar'); 



// Negara
Route::get('/negara', [NegaraController::class, 'index']);
Route::resource('negara', NegaraController::class);
Route::get('/negara/{id}/edit', [NegaraController::class, 'edit']);
Route::put('/negara/{id}', [NegaraController::class, 'update']);


// Slider
Route::get('/slider', [SliderController::class, 'index']);
Route::resource('slider', SliderController::class);
Route::get('/slider/{id}/edit', [SliderController::class, 'edit']);
Route::put('/slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');


// Galeri
Route::get('/galeri', [GaleriController::class, 'index']);
Route::resource('galeri', GaleriController::class);
Route::get('/galeri/{id}/edit', [GaleriController::class, 'edit']);
Route::put('/galeri/update/{id}', [GaleriController::class, 'update'])->name('slider.update');


// Review
Route::get('/review', [ReviewController::class, 'index']);
Route::resource('review', ReviewController::class);
Route::get('/review/{id}/edit', [ReviewController::class, 'edit']);
Route::put('/review/{id}', [ReviewController::class, 'update']);


// Faq
Route::get('/faq', [FaqController::class, 'index']);
Route::resource('faq', FaqController::class);
Route::get('/faq/{id}/edit', [FaqController::class, 'edit']);
Route::put('/faq/{id}', [FaqController::class, 'update']);



// Alasan
Route::get('/alasan', [AlasanController::class, 'index']);
Route::resource('alasan', AlasanController::class);
Route::get('/alasan/{id}/edit', [AlasanController::class, 'edit']);
Route::put('/alasan/{id}', [FaqController::class, 'update']);


// Log Histori
Route::get('/log_histori', [LogHistoriController::class, 'index'])->name('log_histori');
Route::get('/log-histori/delete-all', [LogHistoriController::class, 'deleteAll'])->name('log-histori.delete-all');

// Step
Route::get('/step', [StepController::class, 'index']);
Route::resource('step', StepController::class);
Route::get('/step/{id}/edit', [StepController::class, 'edit']);
Route::put('/step/update/{id}', [StepController::class, 'update'])->name('step.update');




Route::get('/home', [HomeController::class, 'index']);

Route::get('/register', function(){
    return view('frontend.pages.register');
});