<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Product;

use Illuminate\Http\Request;


use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class SearchProductController
{
    use ApiResponse;
    public function __construct() {}

    /**
     * Buscardor patito🐦
     */
    public function __invoke(Request $request)
    {
        $data = null;
        return $this->success($data, 'ruta verificada', 200);
    }
}