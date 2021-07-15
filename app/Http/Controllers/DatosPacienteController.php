<?php

namespace App\Http\Controllers;

use App\DatosArribo;
use App\DatosPaciente;
use App\Http\Resources\DatosPacienteResource;
use App\Http\Resources\DatosPacienteResourceCollection;
use App\Http\Resources\PacienteAppResource;
use App\Http\Resources\PacienteContactoResource;
use App\Http\Resources\PacienteSintomasResource;
use App\PacienteApp;
use App\PacienteCategoria;
use App\PacienteContacto;
use App\PacienteSintomas;
use App\TipoEstadoSalud;
use App\TipoEstadoSistema;
use App\TipoTestAntigeno;
use DB;
use ErrorException;
use Exception;
use GuzzleHttp\RetryMiddleware;
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
            'apellidos' => 'required',
            'edad' => 'required|',
            'ci' => 'required|unique:datos_paciente',
            'sexo' => 'required',
            'categoria' => 'required',
            'direccion' => 'required|',
            'municipio' => 'required|',
            'provincia' => 'required|'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors(),
                                'message'=> 'Hay datos incorrectos']);
        }

        try{
            DB::beginTransaction();

            //Paciente
            $paciente = new DatosPaciente();
            $paciente->nombre = $request->input('nombre');
            $paciente->apellidos = $request->input('apellidos');
            $paciente->edad = $request->input('edad');
            $paciente->ci = $request->input('ci');
            $paciente->sexo = $request->input('sexo');
            $paciente->direccion = $request->input('direccion');
            $paciente->municipio = $request->input('municipio');
            $paciente->provincia = $request->input('provincia');
            $paciente->cmf = $request->input('cmf');
            $paciente->remite_caso = $request->input('remite_caso');
            $paciente->hospital = $request->input('hospital');
            $paciente->embarazada = $request->input('embarazada') ?? '0';
            $paciente->ninho = $request->input('ninho') ?? '0';
            $paciente->estado_salud = $request->input('estado_salud') ?? '1';
            $paciente->categoria = $request->input('categoria') ?? '1';
            $paciente->id_area = $request->input('id_area') ?? '1';
            $paciente->estado_sistema = $request->input('estado_sistema') ?? '1';
            $paciente->trabajador_salud = $request->input('trabajador_salud') ?? '0';
            $paciente->test_antigeno = $request->input('test_antigeno') ?? '1';
            $paciente->vacunado = $request->input('vacunado') ?? '0';

            $paciente->save();

            //Apps
            $app = new PacienteApp();
            $app->hipertension = $data['hipertension'] ?? '0';
            $app->diabetes = $data['diabetes'] ?? '0';
            $app->asma = $data['asma'] ?? '0';
            $app->obesidad = $data['obesidad'] ?? '0';
            $app->insuficiencia_renal = $data['insuficiencia_renal'] ?? '0';
            $app->oncologia = $data['oncologia'] ?? '0';
            $app->otros = $data['otros'] ?? '';

            $app->paciente()->associate($paciente)->save();



            //Contacto
            if (!empty( $data['fecha_contacto']) || !empty( $data['tipo_contacto']) || !empty( $data['lugar_contacto'])) {
                $contacto = new PacienteContacto();
                $contacto->fecha_contacto = $data['fecha_contacto'] ?? null;
                $contacto->tipo_contacto = $data['tipo_contacto'] ?? null;
                $contacto->lugar_contacto = $data['lugar_contacto'] ?? null;

                $contacto->paciente()->associate($paciente)->save();

            }

            //Arribo
            if (!empty( $data['pais_procedencia']) || !empty( $data['lugar_estancia']) || !empty( $data['fecha_arribo'])) {
                $arribo = new DatosArribo();
                $arribo->pais_procedencia = $data['pais_procedencia'] ?? null;
                $arribo->lugar_estancia = $data['lugar_estancia'] ?? null;
                $arribo->fecha_arribo = $data['fecha_arribo'] ?? null;

                $arribo->paciente()->associate($paciente)->save();

            }

            //Sintomas
            $sintomas = new PacienteSintomas();
            $sintomas->fecha_sintomas = $data['fecha_sintomas'] ?? null;
            $sintomas->fiebre = $data['fiebre'] ?? '0';
            $sintomas->rinorrea = $data['rinorrea'] ?? '0';
            $sintomas->congestion_nasal = $data['congestion_nasal'] ?? '0';
            $sintomas->tos = $data['tos'] ?? '0';
            $sintomas->expectoracion = $data['expectoracion'] ?? '0';
            $sintomas->dificultad_respiratoria = $data['dificultad_respiratoria'] ?? '0';
            $sintomas->cefalea = $data['cefalea'] ?? '0';
            $sintomas->dolor_garganta = $data['dolor_garganta'] ?? '0';
            $sintomas->otros = $data['otros'] ?? '';

            $sintomas->paciente()->associate($paciente)->save();

            DB::commit();

            return response()->json([ 'paciente' => new DatosPacienteResource($paciente),
                                'message' => 'Paciente registrado'],
                                200);
        }catch(ErrorException $e){
            DB::rollback();
            return response()->json(['error' => 'Error'],
                                200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DatosPaciente  $datosPaciente
     * @return \Illuminate\Http\Response
     */
    public function show(DatosPaciente $datosPaciente)
    {
        $id_categoria = $datosPaciente->categoria;
        $id_antigeno = $datosPaciente->test_antigeno;
        $id_salud = $datosPaciente->estado_salud;
        $id_sistema = $datosPaciente->estado_sistema;

        $categoria = PacienteCategoria::where('id_categoria', $id_categoria)->first()->nombre;
        $antigeno = TipoTestAntigeno::where('id_antigeno', $id_antigeno)->first()->nombre;
        $salud = TipoEstadoSalud::where('id_salud', $id_salud)->first()->nombre;
        $sistema = TipoEstadoSistema::where('id_sistema', $id_sistema)->first()->nombre;

        $datosPaciente->categoria = $categoria;
        $datosPaciente->test_antigeno = $antigeno;
        $datosPaciente->estado_salud = $salud;
        $datosPaciente->estado_sistema = $sistema;

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
        $data = $request->all();

        $validator = Validator::make($data, [
            'nombre' => 'required',
            'apellidos' => 'required',
            'edad' => 'required',
            'ci' => 'required',
            'sexo' => 'required',
            'categoria' => 'required',
            'direccion' => 'required',
            'municipio' => 'required',
            'provincia' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors(),
                                'message'=> 'Hay datos incorrectos']);
        }

        try{
            DB::beginTransaction();

            //Paciente
            $datosPaciente->nombre = $request->input('nombre');
            $datosPaciente->apellidos = $request->input('apellidos');
            $datosPaciente->edad = $request->input('edad');
            $datosPaciente->ci = $request->input('ci');
            $datosPaciente->sexo = $request->input('sexo');
            $datosPaciente->direccion = $request->input('direccion');
            $datosPaciente->municipio = $request->input('municipio');
            $datosPaciente->provincia = $request->input('provincia');
            $datosPaciente->cmf = $request->input('cmf');
            $datosPaciente->remite_caso = $request->input('remite_caso');
            $datosPaciente->hospital = $request->input('hospital');
            $datosPaciente->embarazada = $request->input('embarazada') ?? '0';
            $datosPaciente->ninho = $request->input('ninho') ?? '0';
            $datosPaciente->estado_salud = $request->input('estado_salud') ?? '1';
            $datosPaciente->categoria = $request->input('categoria') ?? '1';
            $datosPaciente->id_area = $request->input('id_area') ?? '1';
            $datosPaciente->estado_sistema = $request->input('estado_sistema') ?? '1';
            $datosPaciente->trabajador_salud = $request->input('trabajador_salud') ?? '0';
            $datosPaciente->test_antigeno = $request->input('test_antigeno') ?? '1';
            $datosPaciente->vacunado = $request->input('vacunado') ?? '0';

            $datosPaciente->save();


            //Apps
            // $app = new PacienteApp();
            $app = $datosPaciente->apps()->first();
            $app->hipertension = $data['hipertension'] ?? '0';
            $app->diabetes = $data['diabetes'] ?? '0';
            $app->asma = $data['asma'] ?? '0';
            $app->obesidad = $data['obesidad'] ?? '0';
            $app->insuficiencia_renal = $data['insuficiencia_renal'] ?? '0';
            $app->oncologia = $data['oncologia'] ?? '0';
            $app->otros = $data['otros'] ?? '';

            $app->save();

            //Contacto
            if (!empty( $data['fecha_contacto']) || !empty( $data['tipo_contacto']) || !empty( $data['lugar_contacto'])) {
                $contacto = $datosPaciente->contactos()->first();
                $contacto->fecha_contacto = $data['fecha_contacto'] ?? null;
                $contacto->tipo_contacto = $data['tipo_contacto'] ?? null;
                $contacto->lugar_contacto = $data['lugar_contacto'] ?? null;

                $contacto->save();
            }

            //Arribo
            if (!empty( $data['pais_procedencia']) || !empty( $data['lugar_estancia']) || !empty( $data['fecha_arribo'])) {
                $arribo = $datosPaciente->arribos()->first();
                $arribo->pais_procedencia = $data['pais_procedencia'] ?? null;
                $arribo->lugar_estancia = $data['lugar_estancia'] ?? null;
                $arribo->fecha_arribo = $data['fecha_arribo'] ?? null;

                $arribo->save();
            }

            //Sintomas
            $sintomas = $datosPaciente->sintomas()->first();
            $sintomas->fecha_sintomas = $data['fecha_sintomas'] ?? null;
            $sintomas->fiebre = $data['fiebre'] ?? '0';
            $sintomas->rinorrea = $data['rinorrea'] ?? '0';
            $sintomas->congestion_nasal = $data['congestion_nasal'] ?? '0';
            $sintomas->tos = $data['tos'] ?? '0';
            $sintomas->expectoracion = $data['expectoracion'] ?? '0';
            $sintomas->dificultad_respiratoria = $data['dificultad_respiratoria'] ?? '0';
            $sintomas->cefalea = $data['cefalea'] ?? '0';
            $sintomas->dolor_garganta = $data['dolor_garganta'] ?? '0';
            $sintomas->otros = $data['otros'] ?? '';

            $sintomas->save();

            DB::commit();

            return response()->json([ 'paciente' => new DatosPacienteResource($datosPaciente),
                                'message' => 'Paciente actualizado'],
                                200);

        }catch(ErrorException $e){
            DB::rollback();
            return response()->json(['description' => $e, 'error' => 'Error'],
                                200);
        }
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
        $app = $datosPaciente->apps()->get();
        if(count($app) > 0){
            return response()->json([ 'app' => new
                            PacienteAppResource($app), 'message' => 'Success'],
                            200);
        }
            return response()->json(['message'=>'El paciente no tiene antecedentes patologicos',
                                'app'=>null],
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
        $sintomas = $datosPaciente->sintomas()->get();
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
        $contactos = $datosPaciente->contactos()->get();
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
