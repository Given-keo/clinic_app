<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
})->middleware("guest");

Route::post('/login',[LoginController::class,"handleLogin"])->name("login")->middleware("guest");

Route::middleware("auth")->group(function(){
    Route::get('/dashboard',[DashboardController::class,"index"])->name("dashboard");
    Route::post('/logout',[LoginController::class,"logout"])->name("logout");

    // users.index
    // users.store
    // users.destroy
    Route::prefix("users")->as("users.")->controller(UserController::class)->group(function(){
            Route::get("/","index")->name("index");
            Route::post("/","store")->name("store");
            Route::delete("/{id}/destroy","destroy")->name("destroy");
    });


    Route::prefix("data-master")->as("data-master.")->group(function(){
        Route::prefix("pelanggan")->as("pelanggan.")->controller(PelangganController::class)->group(function() {
                Route::get("/","index")->name("index");
                Route::post("/","store")->name("store");
                Route::delete("/{id}/destroy","destroy")->name("destroy");
        });
    });

    Route::prefix("rekam-medis")->as("rekam-medis.")->group(function(){
        
        // Sub-route Diagnosa
        Route::prefix("diagnosa")->as("diagnosa.")->controller(DiagnosaController::class)->group(function() {
            Route::get("/","index")->name("index");
            Route::post("/","store")->name("store");
            Route::delete("/{id}/destroy","destroy")->name("destroy");
        });

        // Sub-route Rekam Medis / Pemeriksaan
        Route::prefix("pemeriksaan")->as("pemeriksaan.")->controller(RekamMedisController::class)->group(function() {
            Route::get("/","index")->name("index");
            Route::post("/","store")->name("store");
            Route::delete("/{id}/destroy","destroy")->name("destroy");
        });
    });
});
