<?php

use App\Http\Controllers\Auth\SigninController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\FrontConfig\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.home');
})->name('home');

Route::name('auth.')->prefix('auth')->middleware('redirect_if_auth')->group(function () {
    Route::get('/signup', [SignupController::class, 'index'])->name('signup');
    Route::post('/signup', [SignupController::class, 'store'])->name('signup-store');

    Route::get('/signin', [SigninController::class, 'index'])->name('signin');
    Route::post('/signin', [SigninController::class, 'authenticate'])->name('signin-authenticate');
    Route::post('/logout', [SigninController::class, 'logout'])->withoutMiddleware('redirect_if_auth')->name('logout');

});

Route::name('dashboard.')->prefix('dashboard')->middleware('ensure_authenticated')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::name('elections.')->prefix('pemilihan')->middleware('role:admin')->group(function () {
        Route::get('/', [ElectionController::class, 'index'])->name('index');
        Route::get('/tambah-kategori-pemilihan', [ElectionController::class, 'create'])->name('create');
        Route::post('/tambahkan-kategori-pemilihan', [ElectionController::class, 'store'])->name('store');

        Route::get('/lihat-kategori-pemilihan/{election:slug}/detail', [ElectionController::class, 'show'])->name('show');
        Route::get('/ubah-kategori-pemilihan/{election:slug}/ubah', [ElectionController::class, 'edit'])->name('edit');
        Route::put('/perbarui-kategori-pemilihan/{election:slug}/perbarui', [ElectionController::class, 'update'])->name('update');
        Route::delete('/hapus-kategori-pemilihan/{election:slug}/hapus', [ElectionController::class, 'destroy'])->name('destroy');
    });

    Route::name('candidates.')->prefix('kandidat')->middleware('role:admin')->group(function () {
        Route::get('/', [CandidateController::class, 'index'])->name('index');
        Route::get('/tambah-kandidat-baru', [CandidateController::class, 'create'])->name('create');
        Route::post('/tambahkan-kandidat-baru', [CandidateController::class, 'store'])->name('store');

        Route::get('/lihat-kandidat/{candidate:slug}/detail', [CandidateController::class, 'show'])->name('show');
        Route::get('/ubah-data-kandidat/{candidate:slug}/ubah', [CandidateController::class, 'edit'])->name('edit');
        Route::put('/perbarui-data-kandidat/{candidate:slug}/perbarui', [CandidateController::class, 'update'])->name('update');

    });
});

Route::name('front.')->group(function () {

    Route::name('elections.')->prefix('pemilihan')->middleware('ensure_authenticated')->group(function () {
        Route::get('/', [FrontController::class, 'elections'])->withoutMiddleware('ensure_authenticated')->name('index');
        Route::get('/calon-terdaftar-di-{election:slug}', [FrontController::class, 'candidates'])->name('candidates');
        Route::get('/lihat-detail-kandidate/{candidate->slug}', [FrontController::class, 'detail_candidate'])->name('candidate.detail');
        Route::post('/pilih-kandidat/{election}/vote/{candidate}', [FrontController::class, 'vote'])->name('candidate.vote');
        Route::delete('/batalkan-pilihan/{election:slug}/vote/{vote}/batalkan', [FrontController::class, 'cancel_vote'])->name('candidate.cancel-vote');
    });
});
