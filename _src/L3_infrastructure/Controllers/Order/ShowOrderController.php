<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Order;

use Illuminate\Http\Request;


use yangpimpollo\L2_application\UseCases\Order\ShowOrderUseCase;
use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class ShowOrderController
{
    use ApiResponse;
    public function __construct(private ShowOrderUseCase $showOrderUseCase) {}

    /**
     * Buscar Orden
     */
    public function __invoke(Request $request)
    {
        $orderId = "grggrd";
        $data = $this->showOrderUseCase->execute($orderId);
        return $this->success($data, 'orden encontrada', 200);
    }
}