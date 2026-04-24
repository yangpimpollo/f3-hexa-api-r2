<?php

namespace yangpimpollo\L2_application\FormExceptions;

use Exception;

class my_form_login_Exception extends Exception
{
    public static function filled_out_incorrectly(): self
    {
        return new self("Detecto un vacío existencial en este formulario... 🕵️‍♂️🔍, rellena BIEN todos los campos");
    }
}