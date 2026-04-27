<?php

namespace yangpimpollo\L2_application\FormExceptions;

use Exception;

class my_form_order_Exception extends Exception
{
    public static function filled_out_incorrectly(): self
    {
        return new self("rellena BIEN todos los campos");
    }

    public static function dni_error(): self
    {
        return new self("8️⃣El DNI debe tener 8 digitos numericos");
    }

    public static function zero_items(): self
    {
        return new self("no hay items");
    }

    public static function invalidDiscountRange(): self
    {
        return new self("el descuento esta entre 0 y 1");
    }
}