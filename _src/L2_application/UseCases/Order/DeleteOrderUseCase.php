<?php

namespace yangpimpollo\L2_application\UseCases\Order;

use yangpimpollo\L1_domain\DomainExceptions\my_order_Exception;
use yangpimpollo\L1_domain\Repository\OrderRepositoryInterface;

class DeleteOrderUseCase
{
    public function __construct(
        private readonly OrderRepositoryInterface $repository
    ) {}

    public function execute(string $orderId): string
    {
        $value = $this->repository->delete($orderId);

        if ($value == null) throw my_order_Exception::order_not_found($orderId);


        return "Orden " . $orderId . ": Eliminada";
    }
}