<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Order;

use Illuminate\Http\Request;


use yangpimpollo\L2_application\UseCases\Order\IndexOrderUseCase;
use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class IndexOrderController
{
    use ApiResponse;
    public function __construct(private IndexOrderUseCase $indexOrderUseCase) {}

    /**
     * Todas las ordenes
     */
    public function __invoke(Request $request)
    {
        $storeId = "sssss ";
        $data = $this->indexOrderUseCase->execute($storeId);
        return $this->success($data, 'lista de todas las ordenes', 200);
    }
}