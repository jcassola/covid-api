<?php

namespace App\Http\Controllers;

use App\Area;
use App\Centro;
use App\Http\Resources\AreaResource;
use App\Http\Resources\AreaResourceCollection;
use App\Http\Resources\CentroResource;
use App\Http\Resources\HabitacionResourceCollection;
use Illuminate\Http\Request;
use Validator;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new AreaResourceCollection(Area::paginate(10));

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
            'id_centro' => 'required',
            'nombre' => 'required|unique:areas',
            'categoria' => 'required|',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors(),
                                'Hay datos incorrectos']);
        }

        $centro = Centro::find($data['id_centro']);

        $area = new Area();
        $area->nombre = $data['nombre'];
        $area->categoria = $data['categoria'];

        $area->centro()->associate($centro)->save();


        return response()->json([ 'area' => new AreaResource($area),
                            'message' => 'Area registrada'],
                            200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        return response()->json([ 'area' => new
                        AreaResource($area), 'message' => 'Success'],
                        200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $area->update($request->all());

        return response()->json([ 'area' => new AreaResource($area),
                        'message' => 'Area Actualizada'], 200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();

        return response()->json([ 'area' => new AreaResource($area),
                                'message' => 'Área Eliminada'],
                                200);
    }

    /**
     * Return the habitaciones from specified area.
     *
     * @param  \App\Area $area
     * @return \Illuminate\Http\Response
     */
    public function habitaciones(Area $area)
    {
        $habitaciones = $area->habitaciones()->paginate(10);
        if(count($habitaciones) > 0){
            $habitaciones_collection = new HabitacionResourceCollection($habitaciones);
            return $habitaciones_collection->additional(['message'=>'Success'], 200);
        }
            return response()->json(['message'=>'El área no tiene habitaciones',
                                'habitaciones'=>null],
                                200);
    }

    public function habitaciones_disponibles(Area $area)
    {
        $habitaciones = $area->habitaciones()->where('disponible', 1)->paginate(10);
        if(count($habitaciones) > 0){
            $habitaciones_collection = new HabitacionResourceCollection($habitaciones);
            return $habitaciones_collection->additional(['message'=>'Success'], 200);
        }
            return response()->json(['message'=>'El área no tiene habitaciones disponibles',
                                'habitaciones'=>null],
                                200);
    }
}
