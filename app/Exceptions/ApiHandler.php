<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;


trait ApiHandler {

    public function tratarErros(Throwable $exception) {

        if ($exception instanceof ModelNotFoundException) {
            return response([
                "code" => "registro-nao-encontrado",
                "message" => "Não encontramos o registro que você procura",
                "status" => 404
            ], 404);
        }

        if ($exception instanceof ValidationException) {

            return response([
                "code" => "erro-na-validacao-dos-dados",
                "message" => "Não foi possível validar os dados",
                "status" => 400,
                "erros" => $exception->errors()
            ], 400);
        }

    }


}
