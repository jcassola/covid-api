<?php

use App\Http\Controllers\HabitacionController;
use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Centro routes
Route::apiResource('centros', 'CentroController');
Route::get('/centros/{centro}/areas', 'CentroController@areas');
Route::get('/centros/{centro}/director', 'CentroController@director'); //test this!

// Area routes
Route::apiResource('areas', 'AreaController');
Route::get('/areas/{area}/habitaciones', 'AreaController@habitaciones');
Route::get('/areas/{area}/habitaciones-disponibles', 'AreaController@habitaciones_disponibles');


// Habitacion routes - Puesto manual porque el resource recibe habitacione en vez de habitaciones
Route::get('/habitaciones', 'HabitacionController@index');
Route::post('/habitaciones', 'HabitacionController@store');
Route::get('/habitaciones/{habitacion}', 'HabitacionController@show');
Route::put('/habitaciones/{habitacion}', 'HabitacionController@update');
Route::delete('/habitaciones/{habitacion}', 'HabitacionController@destroy');
Route::get('/habitaciones/{habitacion}/ingresados', 'HabitacionController@ingresados');
// Route::get('/habitaciones/{habitacion}/pacientes-ingresados', 'HabitacionController@pacientes_ingresados');


// DatosPacientes routes
Route::get('/pacientes', 'DatosPacienteController@index');
Route::post('/pacientes', 'DatosPacienteController@store');
Route::get('/pacientes/{datos_paciente}', 'DatosPacienteController@show');
Route::put('/pacientes/{datos_paciente}', 'DatosPacienteController@update');
Route::delete('/pacientes/{datos_paciente}', 'DatosPacienteController@destroy');
Route::get('/pacientes/{datos_paciente}/app', 'DatosPacienteController@apps');
Route::get('/pacientes/{datos_paciente}/sintomas', 'DatosPacienteController@sintomas');
Route::get('/pacientes/{datos_paciente}/contactos', 'DatosPacienteController@contactos');









