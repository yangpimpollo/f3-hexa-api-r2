<?php

namespace yangpimpollo\L2_application\UseCases\Order;

use yangpimpollo\L1_domain\Repository\OrderRepositoryInterface;
use yangpimpollo\L1_domain\DomainExceptions\my_order_Exception;
//use yangpimpollo\L1_domain\Entity\Order;

class ShowOrderUseCase
{
    public function __construct(
        private readonly OrderRepositoryInterface $repository
    ) {}

    public function execute(string $orderId): array
    {
        $value = $this->repository->show($orderId);

        if ($value == null) throw my_order_Exception::order_not_found($orderId);



        return $value->toArray();
    }
}