<?php

use App\Http\Controllers\MasterDataClubController;

use App\Http\Controllers\ScoreController;
use App\Http\Controllers\SilsilahKeluargaController;
use App\Http\Controllers\visualisasiDataController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/silsilah_keluarga');
Route::resource('silsilah_keluarga', SilsilahKeluargaController::class);
Route::resource('visualisasi_data', visualisasiDataController::class);

