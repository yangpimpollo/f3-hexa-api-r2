<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Customer;

use Illuminate\Http\Request;


use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class StoreCustomerController
{
    use ApiResponse;
    public function __construct() {}

    /**
     * Guardar nuevo cliente
     */
    public function __invoke(Request $request)
    {
        $data = null;
        return $this->success($data, 'ruta verificada', 200);
    }
}