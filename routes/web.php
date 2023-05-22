<?php

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

Route::get('/', function () {
    return view('pages.landing');
});
Route::get("/home", function () {
    return redirect()->intended();
});


Route::middleware(["guest"])->group(function () {
    Route::get("/register", [\App\Http\Controllers\AuthController::class, "registerform"]);
    Route::post("/register", [\App\Http\Controllers\AuthController::class, "register"]);

    Route::get("/login", [\App\Http\Controllers\AuthController::class, "loginform"])->name("login");
    Route::post("/login", [\App\Http\Controllers\AuthController::class, "login"]);
});

Route::middleware(["auth"])->group(function () {
    Route::get("/me", [\App\Http\Controllers\AuthController::class, "me"]);
    Route::get("/editme", [\App\Http\Controllers\AuthController::class, "editform"]);
    Route::post("/editme", [\App\Http\Controllers\AuthController::class, "edit"]);

    Route::get("/logout", [\App\Http\Controllers\AuthController::class, "logout"]);

    Route::get("/stok", [\App\Http\Controllers\StokController::class, "index"]);
    Route::get("/stok/{id}", [\App\Http\Controllers\StokController::class, "stokdetail"]);
    Route::get("/riwayattransaksi", [\App\Http\Controllers\OrderController::class, "history"]);
    Route::get("/buktipembayaran/bukti/{filename}", [\App\Http\Controllers\OrderController::class, "payment"]);

    Route::middleware(["issupplier"])->group(function () {
        Route::get("/addstok", [\App\Http\Controllers\StokController::class, "addform"]);
        Route::post("/addstok", [\App\Http\Controllers\StokController::class, "add"]);

        Route::get("/editstok/{id}", [\App\Http\Controllers\StokController::class, "editform"]);
        Route::post("/editstok/{id}", [\App\Http\Controllers\StokController::class, "edit"]);

        Route::get("/prosesorder/{id}", [\App\Http\Controllers\OrderController::class, "prosesorder"]);
        Route::get("/batalorder/{id}", [\App\Http\Controllers\OrderController::class, "batalorder"]);
    });

    Route::middleware(["ispeternak"])->group(function () {
        Route::get("/susu", [\App\Http\Controllers\SusuController::class, "list"]);
        Route::get("/jadwal", [\App\Http\Controllers\JadwalController::class, "jadwal"]);
        Route::get("/keuangan", [\App\Http\Controllers\KeuanganController::class, "keuangan"]);

        Route::get("/addsusu", [\App\Http\Controllers\SusuController::class, "addform"]);
        Route::post("/addsusu", [\App\Http\Controllers\SusuController::class, "add"]);
        Route::get("/add_jadwal", [\App\Http\Controllers\JadwalController::class, "addform"]);
        Route::post("/add_jadwal", [\App\Http\Controllers\JadwalController::class, "add"]);
        Route::get("/add", [\App\Http\Controllers\KeuanganController::class, "addform"]);
        Route::post("/add", [\App\Http\Controllers\KeuanganController::class, "add"]);

        Route::get("/editsusu/{id}", [\App\Http\Controllers\SusuController::class, "editform"]);
        Route::post("/editsusu/{id}", [\App\Http\Controllers\SusuController::class, "edit"]);
        Route::get("/edit/{id}", [\App\Http\Controllers\KeuanganController::class, "editform"]);
        Route::post("/edit/{id}", [\App\Http\Controllers\KeuanganController::class, "edit"]);
        Route::get("/edit/{id}", [\App\Http\Controllers\JadwalController::class, "editform"]);
        Route::post("/edit/{id}", [\App\Http\Controllers\JadwalController::class, "edit"]);

        Route::post("/beli/{id}", [\App\Http\Controllers\OrderController::class, "beli"]);

        Route::get("/konfirmasipesanan", [\App\Http\Controllers\OrderController::class, "confirmform"]);
        Route::post("/konfirmasipesanan", [\App\Http\Controllers\OrderController::class, "confirm"]);

        Route::get("/terimaorder/{id}", [\App\Http\Controllers\OrderController::class, "terimaorder"]);
    });
});
