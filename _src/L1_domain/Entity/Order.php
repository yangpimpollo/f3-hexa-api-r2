<?php

namespace yangpimpollo\L1_domain\Entity;

use DateTimeImmutable;



class Order
{
    private array $items = [];

    public function __construct(
        private readonly string $orderId,
        private readonly string $customerDni,
        private readonly string $storeId,
        private readonly int $staffId,
        private readonly DateTimeImmutable $orderDate = new DateTimeImmutable()
    ) {}

    public function addItem(OrderItem $item): void
    {
        foreach ($this->items as $existingItem) {
        // Si el producto ya está en la orden, sumamos la cantidad
        if ($existingItem->getProductId() === $item->getProductId()) {
            $existingItem->addQuantity($item->getQuantity());
            return; // Salimos del método para no duplicar el registro
        }
    }
        $this->items[] = $item;
    }

    public function getTotalAmount(): float
    {
        $total = 0;
        foreach ($this->items as $item) $total += $item->getSubtotal();
        return (float) number_format($total, 2, '.', '');
    }

    public function getOrderId(): string { return $this->orderId; }
    public function getCustomerDni(): string { return $this->customerDni; }
    public function getStoreId(): string { return $this->storeId; }
    public function getStaffId(): int { return $this->staffId; }
    public function getOrderDate(): DateTimeImmutable { return $this->orderDate; }
    
    public function getItems(): array { return $this->items; }

    public function toArray(): array
    {
        return [
            'order_id' => $this->orderId,
            'customer_dni' => $this->customerDni,
            'store_id' => $this->storeId,
            'staff_id' => $this->staffId,
            'total_amount' => $this->getTotalAmount(),
            'order_date' => $this->orderDate->format('Y-m-d H:i:s'),
            //'items' => $this->items->toArray()                       // se arregla despues
        ];
    }
}