<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Order;

use Illuminate\Http\Request;

use yangpimpollo\L2_application\DTOs\OrderDto;
use yangpimpollo\L2_application\UseCases\Order\StoreOrderUseCase;
use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class StoreOrderController
{
    use ApiResponse;
    public function __construct(private StoreOrderUseCase $storeOrderUseCase) {}

    /**
     * Guardar nueva orden
     */
    public function __invoke(Request $request)
    {
        // $request->validate([
        //     'customer_dni' => 'required|string',
        //     'items' => 'required|array|min:1',
        //     'items.*.product_id' => 'required|string',
        //     'items.*.quantity' => 'required|integer|min:1',
        //     'items.*.discount' => 'nullable|numeric|min:0',
        // ]);

        $req = [
            'customer_dni' => $request->input('customer_dni'),
            'store_id'     => "$request->user()->store_id",
            'staff_id'     => "$request->user()->id",
            'items'        => $request->input('items'),
        ];

        $dto = new OrderDto($req);

        $data = $this->storeOrderUseCase->execute($dto);
        return $this->success($data, 'ruta verificada', 200);
    }
}