<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::view('/', 'index')->name('home');

// Rutas de navegación que ya usas en tu menú (pueden ser vistas estáticas por ahora)
Route::view('/extraviados', 'static.extraviados')->name('extraviados');
Route::view('/publicar', 'static.publicar')->name('publicar');
Route::view('/login', 'static.login')->name('login');
Route::view('/nosotros', 'static.nosotros')->name('nosotros');
Route::view('/contacto', 'static.contacto')->name('contacto');
