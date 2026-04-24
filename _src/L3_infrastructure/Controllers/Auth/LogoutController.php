<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Auth;

use Illuminate\Http\Request;


use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class LogoutController
{
    use ApiResponse;
    public function __construct() {}

    /**
     * Logout
     */
    public function __invoke(Request $request)
    {
        $data = null;
        return $this->success($data, 'ruta verificada', 200);
    }
}