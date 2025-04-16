<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AlasanController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BelumVerifikasiController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailBayarController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FeCompanyprofile2;
use App\Http\Controllers\Front\JobController as FrontJobController;
use App\Http\Controllers\Front\LoginController as FrontLoginController;
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
use App\Http\Controllers\Member\HomeController as MemberHomeController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\Member\JobController as MemberJobController;
use App\Http\Controllers\Member\ProfileController as MemberProfileController;
use App\Http\Controllers\Member\WorkExperienceController as MemberWorkExperienceController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RefundDetailBayarController;
use App\Http\Controllers\RejectVerifikasiController;
use App\Http\Controllers\SeleksiBatalController;
use App\Http\Controllers\SeleksiController;
use App\Http\Controllers\SeleksiDalamProsesController;
use App\Http\Controllers\SeleksiInterviewController;
use App\Http\Controllers\SeleksiLolosInterviewController;
use App\Http\Controllers\SeleksiLolosKualifikasiController;
use App\Http\Controllers\SeleksiSelesaiKontrakController;
use App\Http\Controllers\SeleksiTerbangController;
use App\Http\Controllers\SemuaSeleksiController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatusProsesController;
use App\Http\Controllers\SudahVerifikasiController;
use App\Http\Controllers\SupplierController;
use App\Models\DetailBayar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Frontend Routes
Route::get('/', [FrontJobController::class, 'index'])->name('front.index');
Route::get('/home', [HomeController::class, 'index'])->name('front.home');
Route::get('/employe', [HomeController::class, 'employe'])->name('front.employe');

// Authentication Routes - Keeping original structure to maintain auth
Route::controller(FrontLoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('front.login.store');
    Route::post('/logout', 'logout')->name('front.logout');
});

// Auth routes for member area - separate from front login to avoid conflicts
Route::prefix('front')->group(function () {
    Auth::routes(['login' => false, 'logout' => false]);
});

// Front Job Routes
Route::name('front.jobs.')->prefix('jobs')->group(function () {
    Route::controller(FrontJobController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/apply', 'apply')->name('apply');
    });
});

// Registration verification Routes
Route::get('register/complete', [RegisterController::class, 'completeRegistration'])->name('register.complete');
Route::get('register/verify/{token}', [RegisterController::class, 'verifyEmail'])->name('register.verify-email');
Route::post('register/step/validation', [RegisterController::class, 'stepValidation'])->name('register.step.validation');

// Member Routes
Route::group(['middleware' => ['role:member', 'is_verify_email']], function () {
    Route::prefix('member')->middleware('member.auth')->name('member.')->group(function () {
        // Dashboard
        Route::get('/', [MemberHomeController::class, 'index'])->name('index');
        
        // Pengaduan
        Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
        Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
        
        // Work Experience
        Route::prefix('work-experience')->name('work-experience.')->controller(MemberWorkExperienceController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/edit', 'edit')->name('edit');
            Route::put('/edit', 'update')->name('update');
        });
        
        // Profile
        Route::prefix('profile')->name('profile.')->controller(MemberProfileController::class)->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::get('/edit', 'edit')->name('edit');
            Route::put('/edit', 'update')->name('update');
        });
        
        // Status
        Route::prefix('status')->name('status.')->group(function(){
            Route::get('/', [StatusProsesController::class, 'index'])->name('index');
        });
        
        // Member Jobs
        Route::prefix('jobs')->name('jobs.')->controller(MemberJobController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/applied', 'applied')->name('applied');
            Route::get('/applied/{id}', 'showApplied')->name('applied.show');
        });
    });
});

// Administrator Routes
Route::prefix('administrator')->group(function () {
    Auth::routes();
    Route::group(['middleware' => ['role:superadmin|admin', 'auth']], function () {
        Route::name('back-office.')->group(function () {
            // Dashboard
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
            
            // Settings
            Route::get('/pengaturan', [SettingController::class, 'index'])->name('pengaturan.index');
            Route::put('/pengaturan/update', [SettingController::class, 'update'])->name('pengaturan.update');
            
            // Counter Management
            Route::name('counter.')->prefix('counter')->group(function () {
                Route::get('/', [CounterController::class, 'index'])->name('index');
                Route::get('/{id}/edit', [CounterController::class, 'edit'])->name('edit');
                Route::post('/', [CounterController::class, 'store'])->name('store');
                Route::put('/update/{id}', [CounterController::class, 'update'])->name('update');
                Route::delete('/{id}', [CounterController::class, 'destroy'])->name('destroy');
            });
            
            // Partner Management
            Route::name('partner.')->prefix('partner')->group(function() {
                Route::get('/', [PartnerController::class, 'index'])->name('index');
                Route::get('/create', [PartnerController::class, 'create'])->name('create');
                Route::post('/', [PartnerController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [PartnerController::class, 'edit'])->name('edit');
                Route::put('/{id}', [PartnerController::class, 'update'])->name('update');
                Route::delete('/{id}', [PartnerController::class, 'destroy'])->name('destroy');
            });
            
            // Users Management
            Route::resource('pengguna', PenggunaController::class);
            
            // Pelamar Management
            Route::name('pelamar.')->prefix('pelamar')->group(function () {
                Route::get('/{status}', [PelamarController::class, 'index'])->name('index');
                Route::post('/update-status', [PelamarController::class, 'updateStatus'])->name('update.status');
                Route::get('/verifikasi/{id2}/detail', [PelamarController::class, 'detail'])->name('verifikasi.detail');
                Route::put('/verifikasi/update/{id}', [PelamarController::class, 'updateDetail'])->name('updateDetail.update');
                
                // Kandidat
                Route::get('/kandidat', [KandidatController::class, 'index'])->name('kandidat.index');
                Route::get('/kandidat/{id}/detail', [KandidatController::class, 'detail'])->name('kandidat.detail');
                Route::put('/kandidat/update/{id}', [KandidatController::class, 'update'])->name('kandidat.update');
                Route::delete('/kandidat/{id}', [KandidatController::class, 'destroy'])->name('kandidat.destroy');
            });
            
            // Selection Process Management
            Route::name('seleksi.')->group(function () {
                // General
                Route::get('/semua-seleksi', [SemuaSeleksiController::class, 'index'])->name('semua-seleksi');
                
                // Basic Selection
                Route::get('/seleksi', [SeleksiController::class, 'index'])->name('seleksi.index');
                Route::post('/update-status-seleksi', [SeleksiController::class, 'updateStatus'])->name('update.status');
                Route::post('/update-status-multiple', [SeleksiController::class, 'updateStatusMultiple'])->name('update.statusMultiple');
                Route::get('/seleksi/{id}/detail', [SeleksiController::class, 'detail'])->name('seleksi.detail');
                
                // Qualification Pass
                Route::get('/seleksi-lolos-kualifikasi', [SeleksiLolosKualifikasiController::class, 'index'])->name('seleksi-lolos-kualifikasi');
                Route::post('/update-status-multiple-lolos-kualifikasi', [SeleksiLolosKualifikasiController::class, 'updateStatusMultiple'])->name('update.statusMultipleLolosKualifikasi');
                Route::post('/update-status-seleksi_lolos_kualifikasi', [SeleksiLolosKualifikasiController::class, 'updateStatus'])->name('update_lolos_kualifikasi.status');
                
                // Interview
                Route::get('/seleksi-interview', [SeleksiInterviewController::class, 'index'])->name('seleksi-interview');
                Route::post('/update-status-multiple-interview', [SeleksiInterviewController::class, 'updateStatusMultiple'])->name('update.statusMultipleInterview');
                Route::post('/update-status-seleksi_interview', [SeleksiInterviewController::class, 'updateStatus'])->name('update_seleksi_interview.status');
                
                // Interview Pass
                Route::get('/seleksi-lolos-interview', [SeleksiLolosInterviewController::class, 'index'])->name('seleksi-lolos-interview');
                Route::post('/update-status-multiple-lolos-interview', [SeleksiLolosInterviewController::class, 'updateStatusMultiple'])->name('update.statusMultipleLolosInterview');
                Route::post('/update-status-seleksi-lolos-interview', [SeleksiLolosInterviewController::class, 'updateStatus'])->name('update_seleksi_lolos_interview.status');
                
                // In Process
                Route::get('/seleksi-dalam-proses', [SeleksiDalamProsesController::class, 'index'])->name('seleksi-dalam-proses');
                Route::get('/seleksi-dalam-proses/{id}/detail', [SeleksiDalamProsesController::class, 'detail'])->name('seleksi-dalam-proses.detail');
                Route::post('/update-status-seleksi-dalam-proses', [SeleksiDalamProsesController::class, 'updateStatus'])->name('update_seleksi_dalam_proses.status');
                Route::put('/seleksi-dalam-proses/update/{id}', [SeleksiDalamProsesController::class, 'updateDetail'])->name('updateDetail.update');
                Route::post('/tambah-pembayaran', [SeleksiDalamProsesController::class, 'tambahPembayaran'])->name('tambahPembayaran');
                Route::post('/tambah-pembayaran-refund', [SeleksiDalamProsesController::class, 'tambahPembayaranRefund'])->name('tambahPembayaranRefund');
                Route::get('/hapus-detail-bayar/{id}', [DetailBayarController::class, 'hapusDetailBayar'])->name('detail_bayar.hapus');
                Route::get('/hapus-detail-bayar-refund/{id}', [RefundDetailBayarController::class, 'hapusDetailBayarRefund'])->name('detail_bayar_refund.hapus');
                Route::get('/getAgencyAlamat/{id}', [SeleksiDalamProsesController::class, 'getAgencyAlamat']);
                Route::get('/getEmployerAlamat/{id}', [SeleksiDalamProsesController::class, 'getEmployerAlamat']);
                
                // Flying Stage
                Route::get('/seleksi-terbang', [SeleksiTerbangController::class, 'index'])->name('seleksi-terbang');
                Route::post('/update-status-seleksi-terbang', [SeleksiTerbangController::class, 'updateStatus'])->name('update_seleksi_terbang.status');
                
                // Contract Completion
                Route::get('/seleksi-selesai-kontrak', [SeleksiSelesaiKontrakController::class, 'index'])->name('seleksi-selesai-kontrak');
                Route::post('/update-status-seleksi-selesai-kontrak', [SeleksiSelesaiKontrakController::class, 'updateStatus'])->name('update_seleksi_selesai_kontrak.status');
                
                // Cancellation
                Route::get('/seleksi-batal', [SeleksiBatalController::class, 'index'])->name('seleksi-batal');
                Route::post('/update-status-seleksi-batal', [SeleksiBatalController::class, 'updateStatus'])->name('update_seleksi_batal.status');
            });
            
            // Job Category Management
            Route::resource('kategori-job', KategoriJobController::class);
            
            // Job Management
            Route::resource('job', JobController::class);
            Route::name('job.')->prefix('job')->group(function () {
                Route::post('/simpan_job', [JobController::class, 'store'])->name('simpan_job');
                Route::get('/getNegara', [JobController::class, 'getList'])->name('getNegara');
                Route::get('/getKategoriJob', [JobController::class, 'getKategoriJobList'])->name('getKategoriJob');
                Route::post('/upload-gambar', [JobController::class, 'uploadGambar'])->name('upload-gambar');
                Route::post('/update-status', [JobController::class, 'updateStatus'])->name('update-status');
            });
            
            // Supplier Management
            Route::resource('supplier', SupplierController::class);
            
            // Agency Management
            Route::resource('agency', AgencyController::class);
            
            // Employer Management
            Route::resource('employer', EmployerController::class);
            
            // Payment Management
            Route::get('/penempatan', [PembayaranController::class, 'penempatan'])->name('penempatan');
            Route::get('/commitment-fee', [PembayaranController::class, 'commitment_fee'])->name('commitment-fee');
            
            // Country Management
            Route::resource('negara', NegaraController::class);
            
            // Facility Management
            Route::resource('fasilitas', FasilitasController::class);
            
            // Website Content Management
            
            // Slider Management
            Route::resource('slider', SliderController::class);
            Route::name('slider.')->prefix('slider')->group(function () {
                Route::put('/update/{id}', [SliderController::class, 'update'])->name('update');
            });
            
            // Gallery Management
            Route::resource('galeri', GaleriController::class);
            Route::name('galeri.')->prefix('galeri')->group(function () {
                Route::put('/update/{id}', [GaleriController::class, 'update'])->name('update');
            });
            
            // Review Management
            Route::resource('review', ReviewController::class);
            
            // FAQ Management
            Route::resource('faq', FaqController::class);
            
            // Reason Management
            Route::resource('alasan', AlasanController::class);
            Route::name('alasan.')->prefix('alasan')->group(function () {
                Route::put('/{id}', [AlasanController::class, 'update'])->name('update'); // Fix: was using FaqController
            });
            
            // History Log Management
            Route::name('log-histori.')->prefix('log-histori')->group(function () {
                Route::get('/', [LogHistoriController::class, 'index'])->name('index');
                Route::get('/delete-all', [LogHistoriController::class, 'deleteAll'])->name('delete-all');
            });
            
            // Step Management
            Route::resource('step', StepController::class);
            Route::name('step.')->prefix('step')->group(function () {
                Route::put('/update/{id}', [StepController::class, 'update'])->name('update');
            });
            
            // Complaint Management
            Route::resource('pengaduan', PengaduanController::class);
            Route::name('pengaduan.')->prefix('pengaduan')->group(function () {
                Route::put('/update/{id}', [PengaduanController::class, 'update'])->name('update');
            });
            
            // Income Management
            Route::resource('pemasukan', PemasukanController::class);
            Route::name('pemasukan.')->prefix('pemasukan')->group(function () {
                Route::put('/update/{id}', [PemasukanController::class, 'update'])->name('update');
            });
            
            // Expense Management
            Route::resource('pengeluaran', PengeluaranController::class);
            Route::name('pengeluaran.')->prefix('pengeluaran')->group(function () {
                Route::put('/update/{id}', [PengeluaranController::class, 'update'])->name('update');
            });
        });
    });
});

// AJAX Routes
Route::prefix('ajax')->name('ajax.')->group(function () {
    Route::get('city/{provinceId?}', [AjaxController::class, 'getCity'])->name('city');
    Route::get('subdistrict/{cityId?}', [AjaxController::class, 'getSubdistrict'])->name('subdistrict');
    Route::get('village/{subdistrictId?}', [AjaxController::class, 'getVillage'])->name('village');
    Route::get('wilayah', [AjaxController::class, 'wilayah'])->name('wilayah');
    Route::get('wilayah/search', [AjaxController::class, 'searchWilayah'])->name('wilayah.search');
    Route::get('/ajax/job', [AjaxController::class, 'getjob'])->name('job');
});

// Company Profile 2 Routes
Route::group(['prefix' => 'compro2'], function () {
    Route::get('/job', [FeCompanyprofile2::class, 'job'])->name('compro-2.job');
    Route::get('/job/detail/{id}', [FeCompanyprofile2::class, 'jobdetail'])->name('compro-2.job.detail');
    Route::get('/employe', [FeCompanyprofile2::class, 'employe'])->name('compro-2.employe');
    Route::get('/register', [FeCompanyprofile2::class, 'daftar'])->name('compro-2.daftar');
    Route::get('/login', [FeCompanyprofile2::class, 'login'])->name('compro-2.login');
    Route::get('/complete', [FeCompanyprofile2::class, 'complete'])->name('compro-2.complete');
});

// Resume/CV Preview
Route::get('/cv/{id}', [CvController::class, 'previewCv'])->name('preview-cv');

// Testing routes
Route::get('/test/email', function() {
    $image = url('logo.png');
    dd($image);
    Mail::send('email.psi', [
        'token' => '21893819830921',
        'nama_lengkap' => 'pramudita ahmad',
        'image' => $image
    ], function($message) {
        $message->to('pramudita5800@gmail.com');
        $message->subject('Verify your email address');
    });
});

// PHP Info
Route::get('phpinfo', function () {
    phpinfo();
});