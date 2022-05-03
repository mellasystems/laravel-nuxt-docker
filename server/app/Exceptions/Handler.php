<?php

namespace App\Exceptions;

use BadMethodCallException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use ErrorException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e): \Illuminate\Http\Response|JsonResponse|Response
    {
        if ($e instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($e, $request);
        }

        if ($e instanceof ModelNotFoundException) {
            $model = strtolower(class_basename($e->getModel()));
            return response()->json([
                "message" => "Esta no es una instancia de {$model} con el ID especificado",
                "status" => 404
            ],404);
        }

        if ($e instanceof AuthenticationException) {
            return $this->unauthenticated($request, $e);
        }

        if ($e instanceof AuthorizationException) {
            return response()->json([
                "message" => $e->getMessage(),
//                "message" => 'You do not have permissions to execute this action',
                "status" => 403
            ], 403);
        }

        if ($e instanceof NotFoundHttpException) {
            return response()->json([
                "message" => $e->getMessage(),
                "status" => $e->getStatusCode()
            ], $e->getStatusCode());
        }

        if ($e instanceof MethodNotAllowedHttpException) {
            return response()->json([
                "message" => $e->getMessage(),
                "status" => 405
            ], 405);
        }

        if($e instanceof BadMethodCallException){
            return response()->json([
                "message" => $e->getMessage(),
                "status" => $e->getCode()
            ], $e->getCode());
        }

        if ($e instanceof HttpException) {
            return response()->json([
                "message" => $e->getMessage(),
                "status" => $e->getCode()
            ], $e->getCode());
        }

        if ($e instanceof QueryException) {
            $code = $e->errorInfo[1];
            if($code == 1451) {
                return response()->json([
                    "message" => $e->getMessage(),
//                    "message" => 'The resource cannot be permanently removed because it is related to some other',
                    "status" => 409
                ], 409);
            }elseif ($code == 1062){
                return response()->json([
                    "message"=> 'El correo electronico o el nombre de usuario existe en la base de datos',
//                    "message"=> 'The email or username exists in the database',
                    "status" => 422 ],
                    422);
            }
            elseif ($code == '22P02'){
                return response()->json([
                    "message"=> 'El campo es incorrecto',
                    "status" => 500 ],
                    500);
            }
        }

        if(config('app.debug')){
            return parent::render($request, $e);
        }

        return response()->json([
            "message" => 'Falla inesperada. Intente mas tarde',
            "status" => 500
        ], 500);

    }

}
