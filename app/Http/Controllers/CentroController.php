<?php

namespace App\Http\Controllers;

use App\Centro;
use App\Http\Resources\CentroResource;
use App\Http\Resources\CentroResourceCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CentroResourceCollection(Centro::paginate(10));
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
            'nombre_centro' => 'required|unique:centros',
            'municipio' => 'required|',
            'organismo' => 'required|'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(),
            'Hay datos incorrectos']);
        }

        $centro = Centro::create($data);

        return response([ 'centro' => new
        CentroResource($centro),
        'message' => 'Centro registrado'], 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function show(Centro $centro)
    {
        return response([ 'centro' => new
        CentroResource($centro), 'message' => 'Success'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Centro $centro)
    {
        $centro->update($request->all());

        return response([ 'centro' => new
        CentroResource($centro), 'message' => 'Centro Actualizado'], 200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Centro $centro)
    {
        $centro->delete();

        return response(['message' => 'Centro eliminado']);
    }
}
