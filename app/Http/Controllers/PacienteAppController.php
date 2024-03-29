<?php

namespace App\Http\Controllers;

use App\DatosPaciente;
use App\Http\Resources\PacienteAppResource;
use App\PacienteApp;
use Illuminate\Http\Request;
use Validator;

class PacienteAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // $validator = Validator::make($data, [
        //     'id_centro' => 'required',
        //     'nombre' => 'required|unique:areas',
        //     'categoria' => 'required|',
        // ]);

        // if($validator->fails()){
        //     return response()->json(['error' => $validator->errors(),
        //                         'message'=> 'Hay datos incorrectos']);
        // }

        $paciente = DatosPaciente::find($data['id_paciente']);

        $app = new PacienteApp();
        $app->hipertension = $data['hipertension'] ?? '0';
        $app->diabetes = $data['diabetes'] ?? '0';
        $app->asma = $data['asma'] ?? '0';
        $app->obesidad = $data['obesidad'];
        $app->insuficiencia_renal = $data['insuficiencia_renal'] ?? '0';
        $app->embarazo = $data['embarazo'] ?? '0';
        $app->ninho = $data['ninho'] ?? '0';
        $app->oncologia = $data['oncologia'] ?? '0';
        $app->otros = $data['otros'] ?? '';

        $app->paciente()->associate($paciente)->save();

        return response()->json([ 'apps' => new PacienteAppResource($app),
                            'message' => 'Antecedentes patológicos registrados'],
                            200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PacienteApp  $pacienteApp
     * @return \Illuminate\Http\Response
     */
    public function show(PacienteApp $pacienteApp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PacienteApp  $pacienteApp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PacienteApp $pacienteApp)
    {
        $pacienteApp->update($request->all());

        return response()->json([ 'apps' => new PacienteAppResource($pacienteApp),
                        'message' => 'Antecedentes patológicos actualizados'], 200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PacienteApp  $pacienteApp
     * @return \Illuminate\Http\Response
     */
    public function destroy(PacienteApp $pacienteApp)
    {
        $pacienteApp->delete();

        return response()->json([ 'apps' => new PacienteAppResource($pacienteApp),
                                'message' => 'Antecedentes patológicos eliminados'],
                                200);
    }
}
