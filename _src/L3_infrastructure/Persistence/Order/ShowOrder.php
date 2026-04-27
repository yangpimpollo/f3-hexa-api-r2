<?php

namespace yangpimpollo\L3_infrastructure\Persistence\Order;

use Illuminate\Support\Facades\DB;
use yangpimpollo\L1_domain\Entity\Order;
use yangpimpollo\L1_domain\Entity\OrderItem;
use DateTimeImmutable;

class ShowOrder
{
    public function execute(string $orderId): ?Order
    {
        $orderData = DB::selectOne("SELECT * FROM orders WHERE order_id = ?", [$orderId]);
        if (!$orderData) return null;

        $order = new Order(
            $orderData->order_id,
            $orderData->customer_dni,
            $orderData->store_id,
            (int) $orderData->staff_id,
            new DateTimeImmutable($orderData->order_date)
        );

        $items = DB::select("SELECT * FROM order_items WHERE order_id = ?", [$orderId]);

        foreach ($items as $item) {
            $order->addItem(new OrderItem(
                $item->product_id,
                (int) $item->quantity,
                (float) $item->list_price,
                (float) $item->discount
            ));
        }

        return $order;
    }
}