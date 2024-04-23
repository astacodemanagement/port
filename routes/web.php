<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AlasanController;
use App\Http\Controllers\BelumVerifikasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailBayarController;
use App\Http\Controllers\EmployerController;
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
use App\Http\Controllers\SudahVerifikasiController;
use App\Http\Controllers\SupplierController;
use App\Models\DetailBayar;
use Illuminate\Support\Facades\Auth;
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

Route::resource('pengguna', PenggunaController::class);

// Kandidat
Route::get('/kandidat', [KandidatController::class, 'index']);
Route::resource('kandidat', KandidatController::class);
Route::get('/kandidat/{id}/detail', [KandidatController::class, 'detail'])->name('kandidat.detail');



// Belum Verifikasi
Route::get('/belum_diverifikasi', [BelumVerifikasiController::class, 'index']);
Route::post('/update-status', [BelumVerifikasiController::class, 'updateStatus'])->name('update.status'); 
// Route::get('/belum_verifikasi/{id2}/detail', [BelumVerifikasiController::class, 'detail'])->name('belum_verifikasi.detail');
Route::get('/verifikasi/{id2}/detail', [BelumVerifikasiController::class, 'detail'])->name('verifikasi.detail');
Route::put('/verifikasi/update/{id}', [BelumVerifikasiController::class, 'updateDetail'])->name('updateDetail.update');



// Sudah Verifikasi
Route::get('/sudah_diverifikasi', [SudahVerifikasiController::class, 'index']);
Route::post('/update-status-verifikasi', [SudahVerifikasiController::class, 'updateStatus'])->name('update.status'); 


// Reject Verifikasi
Route::get('/reject_diverifikasi', [RejectVerifikasiController::class, 'index']);
Route::post('/update-status-verifikasi-reject', [RejectVerifikasiController::class, 'updateStatus'])->name('update.status'); 








// SELEKSI

//  Seleksi
Route::get('/semua_seleksi', [SemuaSeleksiController::class, 'index']);
 


//  Seleksi
Route::get('/seleksi', [SeleksiController::class, 'index']);
Route::post('/update-status-seleksi', [SeleksiController::class, 'updateStatus'])->name('update.status'); 
Route::post('/update-status-multiple', [SeleksiController::class, 'updateStatusMultiple'])->name('update.statusMultiple'); 
Route::get('/seleksi/{id}/detail', [SeleksiController::class, 'detail'])->name('seleksi.detail');



//  Seleksi Dua Lolos Kualifikasi
Route::get('/seleksi_lolos_kualifikasi', [SeleksiLolosKualifikasiController::class, 'index']);
Route::post('/update-status-multiple-lolos-kualifikasi', [SeleksiLolosKualifikasiController::class, 'updateStatusMultiple'])->name('update.statusMultipleLolosKualifikasi'); 
Route::post('/update-status-seleksi_lolos_kualifikasi', [SeleksiLolosKualifikasiController::class, 'updateStatus'])->name('update_lolos_kualifikasi.status'); 

//  Seleksi Interview
Route::get('/seleksi_interview', [SeleksiInterviewController::class, 'index']);
Route::post('/update-status-multiple-interview', [SeleksiInterviewController::class, 'updateStatusMultiple'])->name('update.statusMultipleInterview'); 
Route::post('/update-status-seleksi_interview', [SeleksiInterviewController::class, 'updateStatus'])->name('update_seleksi_interview.status'); 


//  Seleksi Lolos Interview
Route::get('/seleksi_lolos_interview', [SeleksiLolosInterviewController::class, 'index']);
Route::post('/update-status-multiple-lolos-interview', [SeleksiLolosInterviewController::class, 'updateStatusMultiple'])->name('update.statusMultipleLolosInterview'); 
Route::post('/update-status-seleksi_lolos_interview', [SeleksiLolosInterviewController::class, 'updateStatus'])->name('update_seleksi_lolos_interview.status'); 


//  Seleksi Dalam Proses
Route::get('/seleksi_dalam_proses', [SeleksiDalamProsesController::class, 'index']);
Route::get('/seleksi_dalam_proses/{id}/detail', [SeleksiDalamProsesController::class, 'detail'])->name('seleksi_dalam_proses.detail');
Route::post('/update-status-seleksi_dalam_proses', [SeleksiDalamProsesController::class, 'updateStatus'])->name('update_seleksi_dalam_proses.status'); 
Route::put('/seleksi_dalam_proses/update/{id}', [SeleksiDalamProsesController::class, 'updateDetail'])->name('updateDetail.update');
Route::post('/tambah-pembayaran', [SeleksiDalamProsesController::class, 'tambahPembayaran'])->name('tambahPembayaran'); 
Route::post('/tambah-pembayaran-refund', [SeleksiDalamProsesController::class, 'tambahPembayaranRefund'])->name('tambahPembayaranRefund'); 
 
Route::get('/hapus-detail-bayar/{id}', [DetailBayarController::class, 'hapusDetailBayar'])->name('detail_bayar.hapus');
Route::get('/hapus-detail-bayar-refund/{id}', [RefundDetailBayarController::class, 'hapusDetailBayarRefund'])->name('detail_bayar_refund.hapus');

Route::get('/getAgencyAlamat/{id}', [SeleksiDalamProsesController::class, 'getAgencyAlamat']);
Route::get('/getEmployerAlamat/{id}', [SeleksiDalamProsesController::class, 'getEmployerAlamat']);



//  Seleksi Terbang
Route::get('/seleksi_terbang', [SeleksiTerbangController::class, 'index']);
Route::post('/update-status-seleksi_terbang', [SeleksiTerbangController::class, 'updateStatus'])->name('update_seleksi_terbang.status'); 


//  Seleksi Selesai Kontrak
Route::get('/seleksi_selesai_kontrak', [SeleksiSelesaiKontrakController::class, 'index']);
Route::post('/update-status-seleksi_selesai_kontrak', [SeleksiSelesaiKontrakController::class, 'updateStatus'])->name('update_seleksi_selesai_kontrak.status'); 



// Seleksi Batal
Route::get('/seleksi_batal', [SeleksiBatalController::class, 'index']);
Route::post('/update-status-seleksi_batal', [SeleksiBatalController::class, 'updateStatus'])->name('update_seleksi_batal.status'); 





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


// Supplier
Route::get('/supplier', [SupplierController::class, 'index']);
Route::resource('supplier', SupplierController::class);
Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit']);
Route::put('/supplier/{id}', [SupplierController::class, 'update']);


// Agency
Route::get('/agency', [AgencyController::class, 'index']);
Route::resource('agency', AgencyController::class);
Route::get('/agency/{id}/edit', [AgencyController::class, 'edit']);
Route::put('/agency/{id}', [AgencyController::class, 'update']);


// Employer
Route::get('/employer', [EmployerController::class, 'index']);
Route::resource('employer', EmployerController::class);
Route::get('/employer/{id}/edit', [EmployerController::class, 'edit']);
Route::put('/employer/{id}', [EmployerController::class, 'update']);


// Pembayaran
Route::get('/penempatan', [PembayaranController::class, 'penempatan']);
Route::get('/commitment_fee', [PembayaranController::class, 'commitment_fee']);
 

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
Route::put('/galeri/update/{id}', [GaleriController::class, 'update'])->name('pengaduan.update');


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

// Pengaduan
Route::get('/pengaduan', [PengaduanController::class, 'index']);
Route::resource('pengaduan', PengaduanController::class);
Route::get('/pengaduan/{id}/edit', [PengaduanController::class, 'edit']);
Route::put('/pengaduan/update/{id}', [PengaduanController::class, 'update'])->name('pengaduan.update');


// Pemasukan
Route::get('/pemasukan', [PemasukanController::class, 'index']);
Route::resource('pemasukan', PemasukanController::class);
Route::get('/pemasukan/{id}/edit', [PemasukanController::class, 'edit']);
Route::put('/pemasukan/update/{id}', [PemasukanController::class, 'update'])->name('pemasukan.update');



// Pengeluaran
Route::get('/pengeluaran', [PengeluaranController::class, 'index']);
Route::resource('pengeluaran', PengeluaranController::class);
Route::get('/pengeluaran/{id}/edit', [PengeluaranController::class, 'edit']);
Route::put('/pengeluaran/update/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');

 


Route::get('/home', [HomeController::class, 'index']);

Route::prefix('ajax')->group(function () {
    Route::name('ajax.')->group(function () {
        Route::get('city/{provinceId?}', [AjaxController::class, 'getCity'])->name('city');
        Route::get('subdistrict/{cityId?}', [AjaxController::class, 'getSubdistrict'])->name('subdistrict');
        Route::get('village/{subdistrictId?}', [AjaxController::class, 'getVillage'])->name('village');
    });
});

Auth::routes();
