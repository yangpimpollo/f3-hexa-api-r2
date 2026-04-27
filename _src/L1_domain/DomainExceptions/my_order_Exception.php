<?php

namespace yangpimpollo\L1_domain\DomainExceptions;

use Exception;

class my_order_Exception extends Exception
{
    public static function insufficient_stock(string $productId, string $productName, int $stock): self
    {
        return new self("🙄 el producto ' $productId ': ' $productName ' solo tiene ' $stock ' unidades en stock.");
    }

    public static function order_not_found(string $orderId): self
    {
        return new self("🙄 el pedido ' $orderId ' no fue encontrado.");
    }
}