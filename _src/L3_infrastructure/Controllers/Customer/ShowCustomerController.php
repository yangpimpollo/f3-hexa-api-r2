<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Customer;

use Illuminate\Http\Request;


use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class ShowCustomerController
{
    use ApiResponse;
    public function __construct() {}

    /**
     * Buscar Cliente
     */
    public function __invoke(Request $request)
    {
        $data = null;
        return $this->success($data, 'ruta verificada', 200);
    }
}