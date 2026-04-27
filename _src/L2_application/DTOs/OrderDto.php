<?php

namespace yangpimpollo\L2_application\DTOs;

use yangpimpollo\L2_application\DTOs\OrderItemDto;
use yangpimpollo\L2_application\FormExceptions\my_form_order_Exception;

class OrderDto
{
    public readonly string $customer_dni;
    public readonly string $store_id;
    public readonly string $staff_id;
    public readonly array $items;

    public function __construct(array $data)
    {
        $fields = ['customer_dni', 'store_id', 'staff_id'];

        // 1. Validar que existan y sean strings
        foreach ($fields as $field) {
            if (!isset($data[$field]) || !is_string($data[$field])) 
                throw my_form_order_Exception::filled_out_incorrectly();
        }

        if (!ctype_digit($data['customer_dni']) || strlen($data['customer_dni']) !== 8) 
            throw my_form_order_Exception::dni_error();


        if (!isset($data['items']) || !is_array($data['items']) || count($data['items']) === 0) 
            throw my_form_order_Exception::zero_items();
        

        $items = [];

        foreach ($data['items'] as $item) {
            $items[] = new OrderItemDto($item);
        }

        $this->customer_dni = $data['customer_dni'];
        $this->store_id = $data['store_id'];
        $this->staff_id = $data['staff_id'];
        $this->items = $items; 
    }

}