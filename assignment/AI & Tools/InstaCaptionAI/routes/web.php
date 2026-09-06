<?php

use App\Http\Controllers\CaptionController;
use App\Http\Controllers\CaptionFormController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CaptionFormController::class, 'index'])->name('caption.index');
Route::post('/caption', [CaptionFormController::class, 'store'])->name('caption.store');

Route::get('/form', [CaptionController::class, 'showForm'])->name('caption.form');
Route::post('/generate-caption', [CaptionController::class, 'generateCaption'])->name('caption.generate');
