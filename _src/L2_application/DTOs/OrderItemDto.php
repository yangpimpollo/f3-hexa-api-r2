<?php

namespace yangpimpollo\L2_application\DTOs;

use yangpimpollo\L2_application\FormExceptions\my_form_order_Exception;

class OrderItemDto
{
    public readonly string $productId;
    public readonly int $quantity;
    public readonly float $discount;

    public function __construct(array $data)
    {
        if (!isset($data['product_id']) || !is_string($data['product_id'])) 
            throw my_form_order_Exception::filled_out_incorrectly();
        

        if (!isset($data['quantity']) || !is_int($data['quantity']) || $data['quantity'] < 1) 
            throw my_form_order_Exception::filled_out_incorrectly();
        

        if (!isset($data['discount']) || !is_numeric($data['discount'])) 
            throw my_form_order_Exception::filled_out_incorrectly();

        if($data['discount'] < 0 || $data['discount'] > 1)
            throw my_form_order_Exception::invalidDiscountRange();

        $this->productId = $data['product_id'];
        $this->quantity = $data['quantity'];
        $this->discount = $data['discount'];
    }

}