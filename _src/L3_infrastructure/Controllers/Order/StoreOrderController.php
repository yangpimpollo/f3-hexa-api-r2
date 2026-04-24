<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Order;

use Illuminate\Http\Request;


use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class StoreOrderController
{
    use ApiResponse;
    public function __construct() {}

    /**
     * Guardar nueva orden
     */
    public function __invoke(Request $request)
    {
        $data = null;
        return $this->success($data, 'ruta verificada', 200);
    }
}