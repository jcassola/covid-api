<?php

namespace App\Http\Controllers;

use App\Area;
use App\Habitacion;
use App\Http\Resources\HabitacionResource;
use App\Http\Resources\HabitacionResourceCollection;
use Illuminate\Http\Request;
use Validator;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new HabitacionResourceCollection(Habitacion::paginate(10));
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
            'id_area' => 'required',
            'nombre' => 'required|unique:habitaciones',
            'capacidad' => 'required|',
            'en_uso' => 'required|',
            'disponible' => 'required|',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors(),
                                'Hay datos incorrectos']);
        }

        $area = Area::find($data['id_area']);

        $habitacion = new Habitacion();
        $habitacion->nombre = $data['nombre'];
        $habitacion->capacidad = $data['capacidad'];
        $habitacion->en_uso = $data['en_uso'];
        $habitacion->disponible = $data['disponible'];

        $habitacion->area()->associate($area)->save();


        return response()->json([ 'habitacion' => new HabitacionResource($habitacion),
                            'message' => 'Habitacion registrada'],
                            200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function show(Habitacion $habitacion)
    {
        return response()->json([ 'habitacion' => new
                        HabitacionResource($habitacion), 'message' => 'Success'],
                        200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habitacion $habitacion)
    {
        $habitacion->update($request->all());

        return response()->json([ 'habitacion' => new HabitacionResource($habitacion),
                        'message' => 'Habitacion Actualizada'], 200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habitacion $habitacion)
    {
        $habitacion->delete();

        return response()->json([ 'habitacion' => new HabitacionResource($habitacion),
                                'message' => 'Habitacion Eliminada'],
                                200);
    }
}
