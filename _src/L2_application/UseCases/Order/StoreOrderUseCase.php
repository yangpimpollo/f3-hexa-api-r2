<?php

namespace yangpimpollo\L2_application\UseCases\Order;

use Illuminate\Support\Str;

use yangpimpollo\L1_domain\Entity\Order;
use yangpimpollo\L1_domain\Entity\OrderItem;
use yangpimpollo\L1_domain\DomainExceptions\my_customer_Exception;
use yangpimpollo\L1_domain\DomainExceptions\my_product_Exception;
use yangpimpollo\L1_domain\DomainExceptions\my_order_Exception;

use yangpimpollo\L1_domain\Repository\CustomerRepositoryInterface;
use yangpimpollo\L1_domain\Repository\OrderRepositoryInterface;
use yangpimpollo\L1_domain\Repository\ProductRepositoryInterface;
use yangpimpollo\L2_application\DTOs\OrderDto;
use yangpimpollo\L2_application\DTOs\OrderItemDto;

class StoreOrderUseCase
{
    public function __construct(
        private readonly CustomerRepositoryInterface $repositoryCustomer,
        private readonly OrderRepositoryInterface $repository,
        private readonly ProductRepositoryInterface $productRepository
    ) {}

    public function execute(OrderDto $dto): array
    {

        if(!$this->repositoryCustomer->show($dto->customer_dni))
            throw my_customer_Exception::customer_not_found($dto->customer_dni);

        $orderId = 'ORD-' . strtoupper(Str::random(8));

        $order = new Order(
            $orderId,
            $dto->customer_dni,
            $dto->store_id,
            $dto->staff_id
        );


        
        foreach ($dto->items as $itemDto) {
            
            $product = $this->productRepository->show($itemDto->productId, $dto->store_id);

            if (!$product) {
                throw my_product_Exception::empty_product($itemDto->productId);
            }

            if ($product['stock'] < $itemDto->quantity) {
                throw my_order_Exception::insufficient_stock(
                    $product['product_id'],
                    $product['product_name'],
                    $product['stock']
                );
            }

            $order->addItem(new OrderItem(
                $itemDto->productId,
                $itemDto->quantity,
                (float) $product['product_price'],
                $itemDto->discount
            ));
        }

        return $this->repository->store($order);
    }
}