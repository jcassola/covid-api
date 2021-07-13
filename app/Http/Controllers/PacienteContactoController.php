<?php

namespace App\Http\Controllers;

use App\DatosPaciente;
use App\Http\Resources\PacienteContactoResource;
use App\PacienteContacto;
use Illuminate\Http\Request;

class PacienteContactoController extends Controller
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

        $contacto = new PacienteContacto();
        $contacto->fecha_contacto = $data['fecha_contacto'];
        $contacto->tipo_contacto = $data['tipo_contacto'];
        $contacto->lugar_contacto = $data['lugar_contacto'];

        $contacto->paciente()->associate($paciente)->save();

        return response()->json([ 'contacto' => new PacienteContactoResource($contacto),
                            'message' => 'Contacto registrado'],
                            200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PacienteContacto  $pacienteContacto
     * @return \Illuminate\Http\Response
     */
    public function show(PacienteContacto $pacienteContacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PacienteContacto  $pacienteContacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PacienteContacto $pacienteContacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PacienteContacto  $pacienteContacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(PacienteContacto $pacienteContacto)
    {
        //
    }
}
