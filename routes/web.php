<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PendaftaranController;

Route::get('/', function () {
    return redirect()->route('peserta.index');
});

// resource routes
Route::resource('peserta', PesertaController::class)
    ->parameters(['peserta' => 'peserta']);
Route::resource('kelas', KelasController::class)->parameters(['kelas' => 'kelas']);
Route::resource('pendaftaran', PendaftaranController::class)->except(['show', 'edit', 'update']);
// Route::resource('pendaftaran', PendaftaranController::class)->except(['index', 'show', 'edit', 'update']);

// tambahan untuk view relasi
Route::get('peserta/{peserta}/kelas', [PendaftaranController::class, 'pesertaKelas'])->name('peserta.kelas');
Route::get('kelas/{kelas}/peserta', [PendaftaranController::class, 'kelasPeserta'])->name('kelas.peserta');

// Route::get('/pendaftaran/create', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
// Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
