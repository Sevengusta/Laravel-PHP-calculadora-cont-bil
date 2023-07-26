<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/seguro', [SiteController::class, 'seguro']);
Route::get('/ferias', [SiteController::class, 'ferias']);
Route::get('/FGTS', [SiteController::class, 'FGTS']);
Route::get('/', [SiteController::class, 'rescisao']);
Route::get('/rescisao', [SiteController::class, 'rescisao']);
Route::get('/IRRF', [SiteController::class, 'IRRF']);
Route::get('/INSS', [SiteController::class, 'INSS']);
//resultados
Route::get('/resultado_IRRF', [SiteController::class, 'resultadoIRRF']);
Route::get('/resultado_INSS', [SiteController::class, 'resultadoINSS']);
Route::get('/resultado_FGTS', [SiteController::class, 'resultadoFGTS']);
Route::get('/resultado_ferias', [SiteController::class, 'resultadoFerias']);
Route::get('/resultado_seguro', [SiteController::class, 'resultadoSeguro']);
Route::get('/resultado_rescisao', [SiteController::class, 'resultadoRescisao']);

