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
        $app->hipertension = $data['hipertension'];
        $app->diabetes = $data['diabetes'];
        $app->asma = $data['asma'];
        $app->obesidad = $data['obesidad'];
        $app->insuficiencia_renal = $data['insuficiencia_renal'];
        $app->embarazo = $data['embarazo'];
        $app->ninho = $data['ninho'];
        $app->oncologia = $data['oncologia'];
        $app->otros = $data['otros'];

        $app->paciente()->associate($paciente)->save();

        return response()->json([ 'app' => new PacienteAppResource($app),
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PacienteApp  $pacienteApp
     * @return \Illuminate\Http\Response
     */
    public function destroy(PacienteApp $pacienteApp)
    {
        //
    }
}
