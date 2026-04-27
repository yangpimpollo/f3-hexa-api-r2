<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Auth;

use Illuminate\Http\Request;


use yangpimpollo\L2_application\UseCases\Auth\LogoutUseCase;
use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class LogoutController
{
    use ApiResponse;
    public function __construct( private LogoutUseCase $LogoutUseCase ) {}

    /**
     * Logout
     */
    public function __invoke(Request $request)
    {
        $data = $this->LogoutUseCase->execute();
        return $this->success($data, 'Seccion cerrada!!! . . .', 200);
    }
}