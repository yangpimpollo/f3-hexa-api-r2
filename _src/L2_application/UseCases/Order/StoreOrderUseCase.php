<?php

namespace yangpimpollo\L2_application\UseCases\Order;

//use yangpimpollo\L1_domain\Repository\OrderRepositoryInterface;
//use yangpimpollo\L1_domain\Entity\Order;
use yangpimpollo\L2_application\DTOs\OrderDto;

class StoreOrderUseCase
{
    public function __construct(
        //private readonly OrderRepositoryInterface $repository
    ) {}

    public function execute(OrderDto $dto): array
    {
        //return $this->repository->show($orderId);
        return ['title' =>"store order use case"];
    }
}