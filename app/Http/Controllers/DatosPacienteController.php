<?php

namespace App\Http\Controllers;

use App\DatosPaciente;
use App\Http\Resources\DatosPacienteResource;
use App\Http\Resources\DatosPacienteResourceCollection;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DatosPaciente  $datosPaciente
     * @return \Illuminate\Http\Response
     */
    public function edit(DatosPaciente $datosPaciente)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DatosPaciente  $datosPaciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatosPaciente $datosPaciente)
    {
        //
    }
}
