<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
// PINTU UMUM (Dapat diakses siapapun tanpa Token)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// PINTU VIP (Wajib menyertakan Token valid)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    // Contoh rute tertutup untuk mengecek data profil user
    Route::get('/profil', function (Request $request) {
        return $request->user();
    });
});
