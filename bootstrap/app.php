<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;


use yangpimpollo\L2_application\FormExceptions\my_form_login_Exception;
use yangpimpollo\L2_application\FormExceptions\my_form_customer_Exception;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../_src/L3_infrastructure/Routes/my_api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (my_form_login_Exception $e) {
            return response()->json([
                'status' => '🍔 error_de_formulario',
                'mensaje' => $e->getMessage()
            ], 400);
        });

        $exceptions->render(function (my_form_customer_Exception $e) {
            return response()->json([
                'status' => '🍔 error_de_formulario',
                'mensaje' => $e->getMessage()
            ], 400);
        });




    })->create();
