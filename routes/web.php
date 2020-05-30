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

Route::get('/', function () {

    if (Auth::check()) {
        
        if(Gate::allows('is-manager')){
            return redirect()->route('car-park.index');
        }
        return redirect()->route('car.index');

    } else {
        return view('auth.login');
    }

});

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    
    Route::resource('/car-park', 'CarParkController')->middleware('can:is-manager');

    Route::resource('/car', 'CarController')->except(['destroy'])->middleware('can:is-driver');
});
