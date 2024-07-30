<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ruta /Blog y asinarle el controlador "BlogController" a esa ruta

// estas rutas son las que vamos a utilizar cuando hagamos las peticiones desde VUE
// o desde el cliente mediante axios 

// definir los metodos del controlador
// Route::resource('Blog', App\Http\Controllers\BlogController::class)->only(['index','store','update','show','destroy']);

// Cuando la ruta contiene el parámetro {blog}, Laravel busca un modelo
// llamado Blog (el singular y con la primera letra en mayúscula) para
// inyectarlo automáticamente.

// Laravel intentará buscar un modelo Blog basado en el parámetro {Blog},
// pero como el nombre del parámetro es Blog (con mayúscula),
// Laravel no lo reconocerá correctamente "según sus convenciones".

Route::resource('blog',App\Http\Controllers\BlogController::class);