<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Customer;

use Illuminate\Http\Request;

use yangpimpollo\L2_application\DTOs\CustomerDto;
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
        $request->validate([
            'dni'       => 'required|string',
            'firstname' => 'required|string',
            'lastname'  => 'required|string',
            'phone'     => 'required|string',
        ]);

        $req = [
            'dni'       => $request->input('dni'),
            'firstname' => $request->input('firstname'),
            'lastname'  => $request->input('lastname'),
            'phone'     => $request->input('phone'),
        ];

        $dto = new CustomerDto( $req );

        $data = null;
        return $this->success($req, 'ruta verificada', 200);
    }
}