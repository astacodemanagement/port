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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/**
 * Authentication Routes
 * Explicitly defining all auth routes to avoid conflicts
 */
// Main Authentication Routes
Route::controller(FrontLoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('front.login.store');
    Route::post('/logout', 'logout')->name('logout');
});

// Registration Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('register/complete', [RegisterController::class, 'completeRegistration'])->name('register.complete');
Route::get('register/verify/{token}', [RegisterController::class, 'verifyEmail'])->name('register.verify-email');
Route::post('register/step/validation', [RegisterController::class, 'stepValidation'])->name('register.step.validation');

// Password Reset Routes
Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');

/**
 * Front Routes
 */
Route::name('front.')->group(function () {
    // Home route
    Route::get('/', [FrontJobController::class, 'index'])->name('index');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/employe', [HomeController::class, 'employe'])->name('employe');
    
    // Jobs routes
    Route::name('jobs.')->prefix('jobs')->group(function () {
        Route::get('/', [FrontJobController::class, 'index'])->name('index');
        Route::get('/{id}', [FrontJobController::class, 'show'])->name('show');
        Route::get('/{id}/apply', [FrontJobController::class, 'apply'])->name('apply');
    });
});

/**
 * Administrator Routes
 */
Route::prefix('administrator')->group(function () {
    // Admin specific auth routes
    Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
    
    Route::group(['middleware' => ['auth', 'role:superadmin|admin']], function () {
        Route::name('back-office.')->group(function () {
            // Dashboard
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
            
            // Settings
            Route::get('/pengaturan', [SettingController::class, 'index'])->name('pengaturan.index');
            Route::put('/pengaturan/update', [SettingController::class, 'update'])->name('pengaturan.update');

            // Counter
            Route::name('counter.')->group(function () {
                Route::get('/counter', [CounterController::class, 'index'])->name('index');
                Route::get('/counter/{id}/edit', [CounterController::class, 'edit'])->name('edit');
                Route::post('/counter', [CounterController::class, 'store'])->name('store');
                Route::put('/counter/update/{id}', [CounterController::class, 'update'])->name('update');
                Route::delete('/counter/{id}', [CounterController::class, 'destroy'])->name('destroy');
            });
            
            // Partner
            Route::name('partner.')->group(function() {
                Route::get('/partner', [PartnerController::class, 'index'])->name('index');
                Route::get('/partner/create', [PartnerController::class, 'create'])->name('create');
                Route::post('/partner', [PartnerController::class, 'store'])->name('store');
                Route::get('/partner/{id}/edit', [PartnerController::class, 'edit'])->name('edit');
                Route::put('/partner/{id}', [PartnerController::class, 'update'])->name('update');
                Route::delete('/partner/{id}', [PartnerController::class, 'destroy'])->name('destroy');
            });
        
            // Users
            Route::resource('pengguna', PenggunaController::class);

            // Pelamar
            Route::name('pelamar.')->group(function () {
                Route::get('/pelamar/{status}', [PelamarController::class, 'index'])->name('index');
                Route::post('/update.status', [PelamarController::class, 'updateStatus'])->name('update.status');
                Route::get('/verifikasi/{id2}/detail', [PelamarController::class, 'detail'])->name('verifikasi.detail');
                Route::put('/verifikasi/update/{id}', [PelamarController::class, 'updateDetail'])->name('updateDetail.update');

                // Kandidat
                Route::get('/kandidat', [KandidatController::class, 'index'])->name('kandidat.index');
                Route::get('/kandidat/{id}/detail', [KandidatController::class, 'detail'])->name('kandidat.detail');
                Route::put('/kandidat/update/{id}', [KandidatController::class, 'update'])->name('kandidat.update');
                Route::delete('/kandidat/{id}', [KandidatController::class, 'destroy'])->name('kandidat.destroy');
            });

            // Seleksi
            Route::name('seleksi.')->group(function () {
                Route::get('/semua-seleksi', [SemuaSeleksiController::class, 'index'])->name('semua-seleksi');

                // Basic Seleksi
                Route::get('/seleksi', [SeleksiController::class, 'index'])->name('seleksi.index');
                Route::post('/update-status-seleksi', [SeleksiController::class, 'updateStatus'])->name('update.status');
                Route::post('/update-status-multiple', [SeleksiController::class, 'updateStatusMultiple'])->name('update.statusMultiple');
                Route::get('/seleksi/{id}/detail', [SeleksiController::class, 'detail'])->name('seleksi.detail');

                // Seleksi Lolos Kualifikasi
                Route::get('/seleksi-lolos-kualifikasi', [SeleksiLolosKualifikasiController::class, 'index'])->name('seleksi-lolos-kualifikasi');
                Route::post('/update-status-multiple-lolos-kualifikasi', [SeleksiLolosKualifikasiController::class, 'updateStatusMultiple'])->name('update.statusMultipleLolosKualifikasi');
                Route::post('/update-status-seleksi_lolos_kualifikasi', [SeleksiLolosKualifikasiController::class, 'updateStatus'])->name('update_lolos_kualifikasi.status');

                // Seleksi Interview
                Route::get('/seleksi-interview', [SeleksiInterviewController::class, 'index'])->name('seleksi-interview');
                Route::post('/update-status-multiple-interview', [SeleksiInterviewController::class, 'updateStatusMultiple'])->name('update.statusMultipleInterview');
                Route::post('/update-status-seleksi_interview', [SeleksiInterviewController::class, 'updateStatus'])->name('update_seleksi_interview.status');

                // Seleksi Lolos Interview
                Route::get('/seleksi-lolos-interview', [SeleksiLolosInterviewController::class, 'index'])->name('seleksi-lolos-interview');
                Route::post('/update-status-multiple-lolos-interview', [SeleksiLolosInterviewController::class, 'updateStatusMultiple'])->name('update.statusMultipleLolosInterview');
                Route::post('/update-status-seleksi-lolos-interview', [SeleksiLolosInterviewController::class, 'updateStatus'])->name('update_seleksi_lolos_interview.status');

                // Seleksi Dalam Proses
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

                // Seleksi Terbang
                Route::get('/seleksi-terbang', [SeleksiTerbangController::class, 'index'])->name('seleksi-terbang');
                Route::post('/update-status-seleksi-terbang', [SeleksiTerbangController::class, 'updateStatus'])->name('update_seleksi_terbang.status');

                // Seleksi Selesai Kontrak
                Route::get('/seleksi-selesai-kontrak', [SeleksiSelesaiKontrakController::class, 'index'])->name('seleksi-selesai-kontrak');
                Route::post('/update-status-seleksi-selesai-kontrak', [SeleksiSelesaiKontrakController::class, 'updateStatus'])->name('update_seleksi_selesai_kontrak.status');

                // Seleksi Batal
                Route::get('/seleksi-batal', [SeleksiBatalController::class, 'index'])->name('seleksi-batal');
                Route::post('/update-status-seleksi-batal', [SeleksiBatalController::class, 'updateStatus'])->name('update_seleksi_batal.status');
            });

            // Job Categories
            Route::resource('kategori-job', KategoriJobController::class);
            Route::name('kategori-job.')->group(function () {
                Route::get('/kategori-job', [KategoriJobController::class, 'index'])->name('index');
                Route::get('/kategori-job/{id}/edit', [KategoriJobController::class, 'edit'])->name('edit');
                Route::put('/kategori-job/{id}', [KategoriJobController::class, 'update'])->name('update');
            });

            // Jobs
            Route::resource('job', JobController::class);
            Route::name('job.')->group(function () {
                Route::get('/job', [JobController::class, 'index'])->name('index');
                Route::post('/simpan_job', [JobController::class, 'store'])->name('simpan_job');
                Route::get('/job/{id}/edit', [JobController::class, 'edit'])->name('edit');
                Route::put('/job/{id}', [JobController::class, 'update'])->name('update');
                Route::get('/getNegara', [JobController::class, 'getList'])->name('getNegara');
                Route::get('/getKategoriJob', [JobController::class, 'getKategoriJobList'])->name('getKategoriJob');
                Route::post('/upload-gambar', [JobController::class, 'uploadGambar'])->name('upload-gambar');
                Route::post('/update-status', [JobController::class, 'updateStatus'])->name('update-status');
            });

            // Supplier
            Route::resource('supplier', SupplierController::class);
            Route::name('supplier.')->group(function () {
                Route::get('/supplier', [SupplierController::class, 'index'])->name('index');
                Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit'])->name('edit');
                Route::put('/supplier/{id}', [SupplierController::class, 'update'])->name('update');
            });

            // Agency
            Route::resource('agency', AgencyController::class);
            Route::name('agency.')->group(function () {
                Route::get('/agency', [AgencyController::class, 'index'])->name('index');
                Route::get('/agency/{id}/edit', [AgencyController::class, 'edit'])->name('edit');
                Route::put('/agency/{id}', [AgencyController::class, 'update'])->name('update');
            });

            // Employer
            Route::resource('employer', EmployerController::class);
            Route::name('employer.')->group(function () {
                Route::get('/employer', [EmployerController::class, 'index'])->name('index');
                Route::get('/employer/{id}/edit', [EmployerController::class, 'edit'])->name('edit');
                Route::put('/employer/{id}', [EmployerController::class, 'update'])->name('update');
            });

            // Pembayaran
            Route::get('/penempatan', [PembayaranController::class, 'penempatan'])->name('penempatan');
            Route::get('/commitment-fee', [PembayaranController::class, 'commitment_fee'])->name('commitment-fee');

            // Negara
            Route::resource('negara', NegaraController::class);
            Route::name('negara.')->group(function () {
                Route::get('/negara', [NegaraController::class, 'index'])->name('index');
                Route::get('/negara/{id}/edit', [NegaraController::class, 'edit'])->name('edit');
                Route::put('/negara/{id}', [NegaraController::class, 'update'])->name('update');
            });

            // Fasilitas
            Route::resource('fasilitas', FasilitasController::class);
            Route::name('fasilitas.')->group(function () {
                Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('index');
                Route::get('/fasilitas/{id}/edit', [FasilitasController::class, 'edit'])->name('edit');
                Route::put('/fasilitas/{id}', [FasilitasController::class, 'update'])->name('update');
            });

            // Slider
            Route::resource('slider', SliderController::class);
            Route::name('slider.')->group(function () {
                Route::get('/slider', [SliderController::class, 'index'])->name('index');
                Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('edit');
                Route::put('/slider/update/{id}', [SliderController::class, 'update'])->name('update');
            });

            // Galeri
            Route::resource('galeri', GaleriController::class);
            Route::name('galeri.')->group(function () {
                Route::get('/galeri', [GaleriController::class, 'index'])->name('index');
                Route::get('/galeri/{id}/edit', [GaleriController::class, 'edit'])->name('edit');
                Route::put('/galeri/update/{id}', [GaleriController::class, 'update'])->name('update');
            });

            // Review
            Route::resource('review', ReviewController::class);
            Route::name('review.')->group(function () {
                Route::get('/review', [ReviewController::class, 'index'])->name('index');
                Route::get('/review/{id}/edit', [ReviewController::class, 'edit'])->name('edit');
                Route::put('/review/{id}', [ReviewController::class, 'update'])->name('update');
            });

            // Faq
            Route::resource('faq', FaqController::class);
            Route::name('faq.')->group(function () {
                Route::get('/faq', [FaqController::class, 'index'])->name('index');
                Route::get('/faq/{id}/edit', [FaqController::class, 'edit'])->name('edit');
                Route::put('/faq/{id}', [FaqController::class, 'update'])->name('update');
            });

            // Alasan
            Route::resource('alasan', AlasanController::class);
            Route::name('alasan.')->group(function () {
                Route::get('/alasan', [AlasanController::class, 'index'])->name('index');
                Route::get('/alasan/{id}/edit', [AlasanController::class, 'edit'])->name('edit');
                Route::put('/alasan/{id}', [AlasanController::class, 'update'])->name('update');
            });

            // Log Histori
            Route::name('log-histori.')->group(function () {
                Route::get('/log-histori', [LogHistoriController::class, 'index'])->name('index');
                Route::get('/log-histori/delete-all', [LogHistoriController::class, 'deleteAll'])->name('delete-all');
            });

            // Step
            Route::resource('step', StepController::class);
            Route::name('step.')->group(function () {
                Route::get('/step', [StepController::class, 'index'])->name('index');
                Route::get('/step/{id}/edit', [StepController::class, 'edit'])->name('edit');
                Route::put('/step/update/{id}', [StepController::class, 'update'])->name('update');
            });

            // Pengaduan
            Route::resource('pengaduan', PengaduanController::class);
            Route::name('pengaduan.')->group(function () {
                Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('index');
                Route::get('/pengaduan/{id}/edit', [PengaduanController::class, 'edit'])->name('edit');
                Route::put('/pengaduan/update/{id}', [PengaduanController::class, 'update'])->name('update');
            });

            // Pemasukan
            Route::resource('pemasukan', PemasukanController::class);
            Route::name('pemasukan.')->group(function () {
                Route::get('/pemasukan', [PemasukanController::class, 'index'])->name('index');
                Route::get('/pemasukan/{id}/edit', [PemasukanController::class, 'edit'])->name('edit');
                Route::put('/pemasukan/update/{id}', [PemasukanController::class, 'update'])->name('update');
            });

            // Pengeluaran
            Route::resource('pengeluaran', PengeluaranController::class);
            Route::name('pengeluaran.')->group(function () {
                Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('index');
                Route::get('/pengeluaran/{id}/edit', [PengeluaranController::class, 'edit'])->name('edit');
                Route::put('/pengeluaran/update/{id}', [PengeluaranController::class, 'update'])->name('update');
            });
        });
    });
});

/**
 * Member Routes
 */
Route::prefix('member')->middleware(['auth', 'role:member', 'is_verify_email'])->name('member.')->group(function () {
    // Member home
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
    Route::prefix('status')->name('status.')->group(function() {
        Route::get('/', [StatusProsesController::class, 'index'])->name('index');
    });
    
    // Jobs
    Route::prefix('jobs')->name('jobs.')->controller(MemberJobController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/applied', 'applied')->name('applied');
        Route::get('/applied/{id}', 'showApplied')->name('applied.show');
    });
});

/**
 * AJAX Routes
 */
Route::prefix('ajax')->name('ajax.')->group(function () {
    Route::get('city/{provinceId?}', [AjaxController::class, 'getCity'])->name('city');
    Route::get('subdistrict/{cityId?}', [AjaxController::class, 'getSubdistrict'])->name('subdistrict');
    Route::get('village/{subdistrictId?}', [AjaxController::class, 'getVillage'])->name('village');
    Route::get('wilayah', [AjaxController::class, 'wilayah'])->name('wilayah');
    Route::get('wilayah/search', [AjaxController::class, 'searchWilayah'])->name('wilayah.search');
    Route::get('/ajax/job', [AjaxController::class, 'getjob'])->name('job');
});

/**
 * Compro2 Routes
 */
Route::prefix('compro2')->group(function () {
    Route::get('/job', [FeCompanyprofile2::class, 'job'])->name('compro-2.job');
    Route::get('/job/detail/{id}', [FeCompanyprofile2::class, 'jobdetail'])->name('compro-2.job.detail');
    Route::get('/employe', [FeCompanyprofile2::class, 'employe'])->name('compro-2.employe');
    Route::get('/register', [FeCompanyprofile2::class, 'daftar'])->name('compro-2.daftar');
    Route::get('/login', [FeCompanyprofile2::class, 'login'])->name('compro-2.login');
    Route::get('/complete', [FeCompanyprofile2::class, 'complete'])->name('compro-2.complete');
});

/**
 * Miscellaneous Routes
 */
// Preview CV
Route::get('/cv/{id}', [CvController::class, 'previewCv'])->name('preview-cv');

// PHP Info
Route::get('/phpinfo', function () {
    phpinfo();
});