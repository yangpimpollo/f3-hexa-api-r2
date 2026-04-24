<?php

namespace yangpimpollo\L3_infrastructure\Controllers;

use Illuminate\Http\Request;


use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class HelloWorldController
{
    use ApiResponse;
    public function __construct() {}

    /**
     * pagina de HelloWorld
     */
    public function __invoke(Request $request)
    {
        $data = null;
        return $this->success($data, 'ruta verificada', 200);
    }
}