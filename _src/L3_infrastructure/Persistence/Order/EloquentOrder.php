<?php

namespace yangpimpollo\L3_infrastructure\Persistence\Order;

use yangpimpollo\L1_domain\Entity\Order;
use yangpimpollo\L1_domain\Repository\OrderRepositoryInterface;


class EloquentOrder implements OrderRepositoryInterface
{

    public function __construct(
        private DeleteOrder $deleteOrder,
        private IndexOrder $indexOrder,
        private ShowOrder $showOrder,
        private StoreOrder $storeOrder,
    ) {}

    public function index(string $storeId): array
    {
        return $this->indexOrder->execute($storeId);
    }

    public function store(Order $order): array
    {
        return $this->storeOrder->execute($order);
    }

    public function show(string $orderId): ?Order
    {
        return $this->showOrder->execute($orderId);
    }

    public function delete(string $orderId): array
    {
        return $this->deleteOrder->execute($orderId);
    }








}