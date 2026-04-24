<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Auth;

use Illuminate\Http\Request;


use yangpimpollo\L2_application\DTOs\LoginDto;
use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class LoginController
{
    use ApiResponse;
    public function __construct() {}

    /**
     * Login
     */
    public function __invoke(Request $request)
    {
        // $request->validate([ 
        //     'username' => 'required|string', 
        //     'password' => 'required|string',
        //     'aaaa' => 'required|string'
        // ]);

        $req = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];



        $dto = new LoginDto( $req );

        // $data = [
        //     'token' => $this->LoginUseCase->execute($dto),
        //     'token_type' => 'Bearer',
        // ];

        return $this->success( $req, 'ruta verificada  dddd', 200);
    }
}