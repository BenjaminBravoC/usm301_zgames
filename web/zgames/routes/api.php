<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsolasController;
//Quiero usar el controlador, asi que lo importo, se importa con
//use namespace/NombreClase

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//:: llamada a un metodo estatico
//Agregar ruta, la ruta puede ser POST o GET //POST (para enviar cosas a la BD) // GET para obtener
Route::get("marcas/get", [ConsolasController::class, "getMarcas"]);
//Route:get("url(endpoint)", [controlador::class, "metodo"]);

Route::get('consolas/get', [ConsolasController::class, "getConsolas"]);
Route::get('consolas/filtrar', [ConsolasController::class,"filtrarConsolas"]);


//TODO: esto tiene que cambiar, esta entero feo
Route::post('consolas/post', [ConsolasController::class, "crearConsola"]);
Route::post("consolas/delete", [ConsolasController::class,"eliminarConsola"]);