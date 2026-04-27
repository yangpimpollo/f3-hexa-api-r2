<?php

namespace yangpimpollo\L2_application\UseCases\Customer;

use yangpimpollo\L1_domain\DomainExceptions\my_customer_Exception;
use yangpimpollo\L1_domain\Repository\CustomerRepositoryInterface;
use yangpimpollo\L1_domain\Entity\Customer;
use yangpimpollo\L2_application\DTOs\CustomerDto;
use DateTimeImmutable;

class StoreCustomerUseCase
{
    public function __construct(
        private readonly CustomerRepositoryInterface $repository
    ) {}

    public function execute(CustomerDto $dto): array
    {
        if ($this->repository->show($dto->dni))
             throw my_customer_Exception::customer_already_exists();
        
        $customer = new Customer(
            $dto->dni,
            $dto->firstname,
            $dto->lastname,
            $dto->phone,
            new DateTimeImmutable()
        );

        return $this->repository->store($customer);
    }
}