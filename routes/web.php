<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;

Route::resource('pengajuan', PengajuanController::class);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/test-db', function() {
    try {
        \DB::connection()->getPdo();
        return "Database terhubung: " . \DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return "Tidak dapat terhubung ke database: " . $e->getMessage();
    }
});