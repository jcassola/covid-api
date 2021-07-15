<?php

use App\Http\Controllers\HabitacionController;
use App\PacienteCategoria;
use App\TipoEstadoSalud;
use App\TipoEstadoSistema;
use App\TipoTestAntigeno;
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

//Security routes
Route::prefix('auth')->group(function () {
    Route::middleware('guest:api')->group(function() {
        Route::post('login', 'APISecurity\AuthController@login');
        Route::post('signup', 'APISecurity\AuthController@signup');
    });
    Route::middleware('auth:api')->group(function() {
        Route::get('logout', 'APISecurity\AuthController@logout');
        Route::get('user', 'APISecurity\AuthController@getUser');
    });
});

// Centro routes
Route::prefix('centros')->group(function () {
    Route::middleware('auth:api')->group(function() {
        Route::get('/', 'CentroController@index');
        Route::get('/{centro}', 'CentroController@show');
        Route::post('/', 'CentroController@store');
        Route::put('/{centro}', 'CentroController@update');
        Route::delete('/{centro}', 'CentroController@destroy');
        Route::get('/{centro}/areas', 'CentroController@areas');
        Route::get('/{centro}/director', 'CentroController@director'); //test this!
    });
});


// Area routes
Route::prefix('areas')->group(function () {
    Route::middleware('auth:api')->group(function() {
        Route::get('/', 'AreaController@index');
        Route::get('/{area}', 'AreaController@show');
        Route::post('/', 'AreaController@store');
        Route::put('/{area}', 'AreaController@update');
        Route::delete('/{area}', 'AreaController@destroy');
        Route::get('/areas/{area}/habitaciones', 'AreaController@habitaciones');
        Route::get('/areas/{area}/habitaciones-disponibles', 'AreaController@habitaciones_disponibles');
    });
});


// Habitacion routes - Puesto manual porque el resource recibe habitacione en vez de habitaciones
Route::prefix('habitaciones')->group(function () {
    Route::middleware('auth:api')->group(function() {
        Route::get('/', 'HabitacionController@index');
        Route::get('/{habitacion}', 'HabitacionController@show');
        Route::post('/', 'HabitacionController@store');
        Route::put('/{habitacion}', 'HabitacionController@update');
        Route::delete('/{habitacion}', 'HabitacionController@destroy');
        Route::get('/{habitacion}/ingresados', 'HabitacionController@ingresados');
    });
});


// DatosPacientes routes
Route::prefix('pacientes')->group(function () {
    // Route::middleware('auth:api')->group(function() {
        Route::get('/', 'DatosPacienteController@index');
        Route::post('/', 'DatosPacienteController@store');
        Route::get('/{datos_paciente}', 'DatosPacienteController@show');
        Route::put('/{datos_paciente}', 'DatosPacienteController@update');
        Route::delete('/{datos_paciente}', 'DatosPacienteController@destroy');
        Route::get('/{datos_paciente}/apps', 'DatosPacienteController@apps');
        Route::get('/{datos_paciente}/sintomas', 'DatosPacienteController@sintomas');
        Route::get('/{datos_paciente}/contacto', 'DatosPacienteController@contactos');
    // });
});

//PacienteApp routes
Route::prefix('pacientes')->group(function () {
    Route::middleware('auth:api')->group(function() {
        Route::post('/apps', 'PacienteAppController@store');
        Route::put('/apps/{paciente_app}', 'PacienteAppController@update');
        Route::delete('/apps/{paciente_app}', 'PacienteAppController@destroy');
    });
});

//PacienteContacto routes
Route::prefix('pacientes')->group(function () {
    Route::middleware('auth:api')->group(function() {
        Route::post('/contacto', 'PacienteContactoController@store');
        Route::put('/contacto/{paciente_contacto}', 'PacienteContactoController@update');
        Route::delete('/contacto/{paciente_contacto}', 'PacienteContactoController@destroy');
    });
});

//PacienteSintomas routes
Route::prefix('pacientes')->group(function () {
    Route::middleware('auth:api')->group(function() {
        Route::post('/sintomas', 'PacienteSintomasController@store');
        Route::put('/sintomas/{paciente_sintomas}', 'PacienteSintomasController@update');
        Route::delete('/sintomas/{paciente_sintomas}', 'PacienteSintomasController@destroy');
    });
});

//Nomencladores
Route::prefix('nomenclador')->group(function () {
    //Antigeno
    Route::get('/antigeno', function () {
        return TipoTestAntigeno::select('id', 'nombre')->get();
    });

    //EstadoSistema
    Route::get('/sistema', function () {
        return TipoEstadoSistema::select('id', 'nombre')->get();
    });

    //Categoria
    Route::get('/categoria', function () {
        return PacienteCategoria::select('id', 'nombre')->get();
    });

    //EstadoSalud
    Route::get('/salud/', function () {
        return TipoEstadoSalud::select('id', 'nombre')->get();
    });

    // //Provincia
    // Route::get('/provincia', function () {
    //     return Provincia::select('id', 'nombre')->get();
    // });

    // //Muncipio
    // Route::get('/municipio}', function () {
    //     return Municipio::select('id', 'nombre')->get();
    // });

    // //AreaSalud
    // Route::get('/salud', function () {
    //     return AreaSalud::select('id', 'nombre')->get();
    // });
});













