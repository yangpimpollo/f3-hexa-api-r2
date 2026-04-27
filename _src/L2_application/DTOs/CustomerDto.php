<?php

namespace yangpimpollo\L2_application\DTOs;

use yangpimpollo\L2_application\FormExceptions\my_form_customer_Exception;

class CustomerDto
{
    public readonly string $dni;
    public readonly string $firstname;
    public readonly string $lastname;
    public readonly string $phone;

    public function __construct(array $data)
    {
        $fields = ['dni', 'firstname', 'lastname', 'phone'];

        // 1. Validar que existan y sean strings
        foreach ($fields as $field) {
            if (!isset($data[$field]) || !is_string($data[$field])) 
                throw my_form_customer_Exception::filled_out_incorrectly();
        }

        // 2. validar dni de 8 digitos numericos
        if (!ctype_digit($data['dni']) || strlen($data['dni']) !== 8) 
            throw my_form_customer_Exception::dni_error();
        
        // 3. validar telefono de 9 digitos numericos
        if (!ctype_digit($data['phone']) || strlen($data['phone']) !== 9 || $data['phone'][0] !== '9') 
            throw my_form_customer_Exception::phone_error();

        // 4. Asignar valores
        $this->dni = $data['dni'];
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->phone = $data['phone'];
    }

}