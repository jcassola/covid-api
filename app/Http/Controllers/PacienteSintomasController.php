<?php

namespace App\Http\Controllers;

use App\DatosPaciente;
use App\Http\Resources\PacienteSintomasResource;
use App\PacienteSintomas;
use Illuminate\Http\Request;

class PacienteSintomasController extends Controller
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

        $sintomas = new PacienteSintomas();
        $sintomas->fecha_sintomas = $data['fecha_sintomas'];
        $sintomas->fiebre = $data['fiebre'];
        $sintomas->rinorrea = $data['rinorrea'];
        $sintomas->congestion_nasal = $data['congestion_nasal'];
        $sintomas->tos = $data['tos'];
        $sintomas->expectoracion = $data['expectoracion'];
        $sintomas->dificultad_respiratoria = $data['dificultad_respiratoria'];
        $sintomas->cefalea = $data['cefalea'];
        $sintomas->dolor_garganta = $data['dolor_garganta'];
        $sintomas->otros = $data['otros'];



        $sintomas->paciente()->associate($paciente)->save();

        return response()->json([ 'sintomas' => new PacienteSintomasResource($sintomas),
                            'message' => 'Síntomas registrado'],
                            200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PacienteSintomas  $pacienteSintomas
     * @return \Illuminate\Http\Response
     */
    public function show(PacienteSintomas $pacienteSintomas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PacienteSintomas  $pacienteSintomas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PacienteSintomas $pacienteSintomas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PacienteSintomas  $pacienteSintomas
     * @return \Illuminate\Http\Response
     */
    public function destroy(PacienteSintomas $pacienteSintomas)
    {
        //
    }
}
