<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("pokemons.index");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(["middleware" => "auth"],function (){

    Route::resource("pokemons", "App\Http\Controllers\PokemonController");
    Route::resource("tipos", "App\Http\Controllers\TipoController");
    Route::get("tipos/{tipo}/reporte", "App\Http\Controllers\TipoController@reporte")->name("tipos.reporte");
});


