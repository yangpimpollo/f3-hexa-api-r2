<?php

namespace yangpimpollo\L2_application\UseCases\Customer;

use yangpimpollo\L1_domain\DomainExceptions\my_customer_Exception;
use yangpimpollo\L1_domain\Repository\CustomerRepositoryInterface;

class ShowCustomerUseCase
{
    public function __construct(
        private readonly CustomerRepositoryInterface $repository
    ) {}

    public function execute(string $dniValue): array
    {
        /*---------------PARCHE  se arreglara despues--------------------*/

        if (!ctype_digit($dniValue) || strlen($dniValue) !== 8) 
            throw \yangpimpollo\L2_application\FormExceptions\my_form_customer_Exception::dni_error();


        //------------------------------------------------------------//


        $value = $this->repository->show($dniValue);

        if ($value == null) throw my_customer_Exception::customer_not_found();

        return $value->toArray();
    }
}