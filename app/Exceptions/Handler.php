<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // for changing Oauth error structure... also uncomment AppServiceProvider line in register method
        // $class = get_class($exception);
        // if($class == 'League\OAuth2\Server\Exception\OAuthServerException'){
        //     return response()->json([
        //       'code'=>$exception->getHttpStatusCode(),
        //       'error'=>$exception->getMessage(),
        //       'error_type'=>$exception->getErrorType()
        //     ],$exception->getHttpStatusCode());
        // } 

        return parent::render($request, $exception);
    }
}
