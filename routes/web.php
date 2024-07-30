<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('{any}', function(){
    // laravel-vue > resources > views > paginas
    // laravel-vue > resources > views > app
    // app es como la pagina que se ejecuta
    return view('app');
})->where('any', '.*');