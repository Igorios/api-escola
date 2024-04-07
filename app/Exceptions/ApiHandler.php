<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait ApiHandler
{

    public function tratarErros(Throwable $exception)
    {

        if ($exception instanceof ModelNotFoundException) {
            return $this->modelNotFoundException();
        }


        if ($exception instanceof ValidationException) {
            return $this->validationException($exception);
        }

    }

    public function modelNotFoundException()
    {
        return $this->respostaPadrao(
            "registro-nao-encontrado",
            "Não encontramos o registro que você procura",
            404
        );
    }

    public function validationException(validationException $e)
    {

        return $this->respostaPadrao(
            "erro-na-validacao-dos-dados",
            "Não foi possível validar os dados",
            400,
            $e->errors()
        );
    }

    public function respostaPadrao(string $code, string $mensagem, int $status, array $erros = null)
    {

        $dadosResposta = [
            "code" => $code,
            "message" => $mensagem,
            "status" => $status,
        ];

        if ($erros) {
            $dadosResposta = $dadosResposta + ['erros' => $erros];
        }

        return response(
            $dadosResposta,
            $status
        );
    }
}
