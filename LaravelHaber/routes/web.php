<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Yonet;
use App\Http\Controllers\YonetimController;
use Illuminate\Support\Facades\Auth;

Route::get('/',[YonetimController::class,'welcome'])->name("welcome");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->middleware('auth')->group(function(){
    
    Route::get('/index',[YonetimController::class,'index'])->name("index");

    Route::get('/yazar-ekle',[YonetimController::class,'yazarEkle'])->name("yazar-ekle");
    
    Route::post('/yazar-ekle-post',[YonetimController::class,'YazarEklePost'])->name("yazar-ekle-post");
    
    Route::get('/yazar-liste',[YonetimController::class,'yazarListe'])->name("yazar-liste");
    
    Route::get('/yazar-duzenle/{id}',[YonetimController::class,'yazarDuzenle'])->name("yazar-duzenle");
    
    Route::post('/yazar-duzenle-post/{id}',[YonetimController::class,'YazarDuzenlePost'])->name("yazar-duzenle-post");
    
    Route::get('/yazar-sil/{id}',[YonetimController::class,'yazarSil'])->name("yazar-sil");
    
    Route::Get('haber-ekle', [YonetimController::class,'haberEkle'])->name("haber-ekle");
    
    Route::post('haber-ekle-post', [YonetimController::class,'HaberEklePost'])->name("haber-ekle-post");
    
    Route::get('/haber-liste',[YonetimController::class,'haberListe'])->name("haber-liste");
    
    Route::get('/haber-duzenle/{id}',[YonetimController::class,'haberDuzenle'])->name("haber-duzenle");
    
    Route::post('/haber-duzenle-post/{id}',[YonetimController::class,'HaberDuzenlePost'])->name("haber-duzenle-post");
    
    Route::get('/haber-sil/{id}',[YonetimController::class,'haberSil'])->name("haber-sil");

});



