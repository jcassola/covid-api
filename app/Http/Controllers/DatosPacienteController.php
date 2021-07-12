<?php

namespace App\Http\Controllers;

use App\DatosPaciente;
use App\Http\Resources\DatosPacienteResource;
use App\Http\Resources\DatosPacienteResourceCollection;
use App\Http\Resources\PacienteAppResource;
use App\Http\Resources\PacienteContactoResource;
use App\Http\Resources\PacienteSintomasResource;
use Illuminate\Http\Request;
use Validator;

class DatosPacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DatosPacienteResourceCollection(DatosPaciente::paginate(10));

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

        $validator = Validator::make($data, [
            'nombre' => 'required',
            'edad' => 'required|',
            'ci' => 'required|unique:datos_paciente',
            'sexo' => 'required',
            'direccion' => 'required|',
            'municipio' => 'required|',
            'provincia' => 'required|'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors(),
                                'message'=> 'Hay datos incorrectos']);
        }

        $paciente = DatosPaciente::create($data);

        return response()->json([ 'paciente' => new DatosPacienteResource($paciente),
                            'message' => 'Paciente registrado'],
                            200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DatosPaciente  $datosPaciente
     * @return \Illuminate\Http\Response
     */
    public function show(DatosPaciente $datosPaciente)
    {
        return response()->json([ 'paciente' => new
                        DatosPacienteResource($datosPaciente), 'message' => 'Success'],
                        200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DatosPaciente  $datosPaciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DatosPaciente $datosPaciente)
    {
        $datosPaciente->update($request->all());

        return response()->json([ 'paciente' => new DatosPacienteResource($datosPaciente),
                        'message' => 'Datos de paciente actualizados'], 200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DatosPaciente  $datosPaciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatosPaciente $datosPaciente)
    {
        $datosPaciente->delete();

        return response()->json([ 'paciente' => new DatosPacienteResource($datosPaciente),
                                'message' => 'Paciente Eliminado'],
                                200);
    }

    /**
     * Return the apps from specified paciente.
     *
     * @param  \App\DatosPaciente  $datosPaciente
     * @return \Illuminate\Http\Response
     */
    public function apps(DatosPaciente $datosPaciente)
    {
        $app = $datosPaciente->apps;
        if(count($app) > 0){
            return response()->json([ 'apps' => new
                            PacienteAppResource($app), 'message' => 'Success'],
                            200);
        }
            return response()->json(['message'=>'El paciente no tiene antecedentes patologicos',
                                'apps'=>null],
                                200);
    }

    /**
     * Return the sintomas from specified paciente.
     *
     * @param  \App\DatosPaciente  $datosPaciente
     * @return \Illuminate\Http\Response
     */
    public function sintomas(DatosPaciente $datosPaciente)
    {
        $sintomas = $datosPaciente->sintomas;
        if(count($sintomas) > 0){
            return response()->json([ 'sintomas' => new
                            PacienteSintomasResource($sintomas), 'message' => 'Success'],
                            200);
        }
            return response()->json(['message'=>'El paciente no tiene síntomas',
                                'sintomas'=>null],
                                200);
    }

    /**
     * Return the contactos from specified paciente.
     *
     * @param  \App\DatosPaciente  $datosPaciente
     * @return \Illuminate\Http\Response
     */
    public function contactos(DatosPaciente $datosPaciente)
    {
        $contactos = $datosPaciente->contactos;
        if(count($contactos) > 0){
            return response()->json([ 'contactos' => new
                            PacienteContactoResource($contactos), 'message' => 'Success'],
                            200);
        }
            return response()->json(['message'=>'El paciente no tiene contactos',
                                'contactos'=>null],
                                200);
    }
}
