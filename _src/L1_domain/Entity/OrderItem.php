<?php

namespace yangpimpollo\L1_domain\Entity;

class OrderItem
{
    public function __construct(
        private readonly string $productId,
        private int $quantity,
        private readonly float $listPrice,
        private readonly float $discount = 0
    ) {}

    public function getProductId(): string { return $this->productId; }
    public function getQuantity(): int { return $this->quantity; }
    public function getListPrice(): float { return $this->listPrice; }
    public function getDiscount(): float { return $this->discount; }

    public function toArray(): array
    {
        return [
            'product_id' => $this->productId,
            'quantity' => $this->quantity,
            'list_price' => $this->listPrice,
            'discount' => $this->discount,
            'subtotal' => $this->getSubtotal()
        ];
    }

    /**
     * Calcula el subtotal neto de este item.
     */
    public function getSubtotal(): float 
    {
        return ($this->listPrice * $this->quantity) * (1 - $this->discount);
    }

    public function addQuantity(int $quantity): void
    {
        $this->quantity += $quantity;
    }
}