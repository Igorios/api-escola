<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlunoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "idAluno" => $this->id,
            "nome" => $this->nome,
            "nascimento" => $this->nascimento,
            "genero" => $this->genero,
            "turma" => new TurmaResource($this->turma)
        ];
    }
}
