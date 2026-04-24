<?php

namespace yangpimpollo\L2_application\DTOs;

use yangpimpollo\L2_application\FormExceptions\my_form_order_and_orderitem_Exception;

class OrderDto
{
    public readonly string $username;
    public readonly string $password;

    public function __construct(array $data)
    {
        // 1. Validar que las llaves existan y sean strings
        if (!isset($data['username']) || !is_string($data['username'])) 
            throw my_form_login_Exception::filled_out_incorrectly();

        if (!isset($data['password']) || !is_string($data['password'])) 
           throw my_form_login_Exception::filled_out_incorrectly();
        

        // 2. Asignar valores
        $this->username = $data['username'];
        $this->password = $data['password'];
    }

}