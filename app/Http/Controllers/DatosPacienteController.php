<?php

namespace App\Http\Controllers;

use App\DatosPaciente;
use App\Http\Resources\DatosPacienteResourceCollection;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
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
