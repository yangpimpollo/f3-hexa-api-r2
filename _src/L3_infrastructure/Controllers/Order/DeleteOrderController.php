<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Order;

use Illuminate\Http\Request;


use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class DeleteOrderController
{
    use ApiResponse;
    public function __construct() {}

    /**
     * Eliminar Orden
     */
    public function __invoke(Request $request)
    {
        $data = null;
        return $this->success($data, 'ruta verificada', 200);
    }
}