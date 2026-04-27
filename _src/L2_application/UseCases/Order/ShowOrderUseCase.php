<?php

namespace yangpimpollo\L2_application\UseCases\Order;

//use yangpimpollo\L1_domain\Repository\OrderRepositoryInterface;
//use yangpimpollo\L1_domain\Entity\Order;

class ShowOrderUseCase
{
    public function __construct(
        //private readonly OrderRepositoryInterface $repository
    ) {}

    public function execute(string $orderId): array
    {
        //return $this->repository->show($orderId);
        return ['title' =>"show order use case" , 'store'=>"$orderId"];
    }
}