<?php

namespace yangpimpollo\L3_infrastructure\Persistence\Order;

use Illuminate\Support\Facades\DB;

class DeleteOrder
{
    public function execute(string $orderId): array
    {
        $order = DB::selectOne("SELECT * FROM orders WHERE order_id = ?", [$orderId]);
        if (!$order) return [];


        return DB::transaction(function () use ($orderId, $order) {
            // 1. Obtener los items de la orden antes de borrarla
            $items = DB::table('order_items')
                ->where('order_id', $orderId)
                ->get(['product_id', 'quantity']);

            // 2. Revertir inventario uno por uno (Postgres Friendly)
            foreach ($items as $item) {
                DB::table('inventories')
                    ->where('product_id', $item->product_id)
                    ->where('store_id', $order->store_id)
                    ->increment('quantity', $item->quantity);
            }

            // 3. Borrar orden (y sus items si no tienes cascade delete)
            DB::table('order_items')->where('order_id', $orderId)->delete();
            DB::table('orders')->where('order_id', $orderId)->delete();

            return ["order_id" => $orderId];
        });
    }
}