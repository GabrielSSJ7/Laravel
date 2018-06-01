<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix'=>'pessoas'], function(){
    Route::get("/novo", "PessoasController@novoView");
    Route::post("/store", "PessoasController@store");
    Route::post("/edit", "PessoasController@updateData");
    Route::get("/{id}/edit", "PessoasController@editView");
    Route::get("/","PessoasController@index");
});