<?php

namespace App\Http\Resources;

use App\PacienteSintomas;
use Illuminate\Http\Resources\Json\JsonResource;

class DatosPacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id_paciente' => $this->id_paciente,
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'edad' => $this->edad,
            'ci' => $this->ci,
            'sexo' => $this->sexo,
            'direccion' => $this->direccion,
            'cmf' => $this->cmf,
            'remite_caso' => $this->remite_caso,
            'hospital' => $this->hospital,
            'estado_salud' => $this->estado_salud,
            'categoria' => $this->categoria,
            'estado_sistema' => $this->estado_sistema,
            'trabajador_salud' => $this->trabajador_salud,
            'embarazada' => $this->embarazada,
            'ninho' => $this->ninho,
            'test_antigeno' => $this->test_antigeno,
            'vacunado' => $this->vacunado,
            'area_salud' => $this->area_salud,
            'municipio' => $this->municipio,
            'provincia' => $this->provincia,
            'riesgo' => $this->riesgo,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
            'apps' => new PacienteAppResource($this->apps),
            'sintomas' => new PacienteSintomasResource($this->sintomas),
            'contacto' => new PacienteContactoResource($this->contactos),
            'arribo' => new DatosArriboResource($this->arribos),
        ];
    }
}
