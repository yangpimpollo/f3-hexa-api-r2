<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Order;

use Illuminate\Http\Request;


use yangpimpollo\L2_application\UseCases\Order\DeleteOrderUseCase;
use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class DeleteOrderController
{
    use ApiResponse;
    public function __construct(private DeleteOrderUseCase $deleteOrderUseCase) {}

    /**
     * Eliminar Orden
     */
    public function __invoke(Request $request)
    {
        $orderId = $request->query('order_id');
        $data = $this->deleteOrderUseCase->execute($orderId);
        return $this->success($data, 'oreden eliminada', 200);
    }
}