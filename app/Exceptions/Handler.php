<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $levels = [
        //
    ];

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, $exception)
    {
        if($exception instanceof ModelNotFoundException && $request->wantsJson()){
            return response()->json(
                ['message'=>'Not Found!'],
                Response::HTTP_NOT_FOUND
            );
        }
        return parent::render($request, $exception);
    }
}

