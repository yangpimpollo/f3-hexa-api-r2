<?php

namespace yangpimpollo\L2_application\FormExceptions;

use Exception;

class my_form_customer_Exception extends Exception
{
    public static function filled_out_incorrectly(): self
    {
        return new self("Detecto un vacío existencial en este formulario... 🕵️‍♂️🔍, rellena BIEN todos los campos");
    }

    public static function dni_error(): self
    {
        return new self("8️⃣El DNI debe tener 8 digitos numericos");
    }

    public static function phone_error(): self
    {
        return new self("☎️El telefono debe tener 9 digitos numericos y empezar con 9");
    }
}