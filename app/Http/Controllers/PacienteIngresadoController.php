<?php

namespace App\Http\Controllers;

use App\Http\Resources\PacienteIngresadoResource;
use App\Http\Resources\PacienteIngresadoResourceCollection;
use App\PacienteIngresado;
use Illuminate\Http\Request;

class PacienteIngresadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PacienteIngresadoResourceCollection(PacienteIngresado::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PacienteIngresado  $pacienteIngresado
     * @return \Illuminate\Http\Response
     */
    public function show(PacienteIngresado $pacienteIngresado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PacienteIngresado  $pacienteIngresado
     * @return \Illuminate\Http\Response
     */
    public function edit(PacienteIngresado $pacienteIngresado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PacienteIngresado  $pacienteIngresado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PacienteIngresado $pacienteIngresado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PacienteIngresado  $pacienteIngresado
     * @return \Illuminate\Http\Response
     */
    public function destroy(PacienteIngresado $pacienteIngresado)
    {
        //
    }
}
