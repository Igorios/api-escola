<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function render($request, Throwable $exception)
    {
        if ($request->is('api/v1/*')) {

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

        return parent::render($request, $exception);
    }
}
