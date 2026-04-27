<?php

namespace yangpimpollo\L1_domain\DomainExceptions;

use Exception;

class my_customer_Exception extends Exception
{
    public static function customer_not_found(): self
    {
        return new self("¡Vaya! No pudimos encontrar a quien buscas. 🕵️‍♂️🔍");
    }

    public static function customer_already_exists(): self
    {
        return new self("el cliente ya existe. 🕵️‍♂️🔍");
    }

}