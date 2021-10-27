<?php

namespace App\Services;

use App\Models\Order;
use App\Services\Abstracts\OrderInterface;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * class OrderService
 */
class OrderService implements OrderInterface
{

    /**
     * @return LengthAwarePaginator
     */
    public function list(): LengthAwarePaginator
    {
        return Order::query()->paginate();
    }

    /**
     * @param int $id
     * @return Order
     */
    public function getOrder(int $id): Order
    {
        return Order::findOrFail($id);
    }

    /**
     * @param string $user_full_name
     * @param int $price
     * @param string $address
     * @return Order
     */
    public function createOrder(string $user_full_name, int $price, string $address): Order
    {
        return Order::create([
            'user_full_name' => $user_full_name,
            'price' => $price,
            'address' => $address
        ]);
    }

    /**
     * @param string $user_full_name
     * @param int $price
     * @param string $address
     * @param int $id
     * @return Order
     */
    public function updateOrder(string $user_full_name, int $price, string $address, int $id): Order
    {
        $order = Order::findOrFail($id);
        $order->fill([
            'user_full_name' => $user_full_name,
            'price' => $price,
            'address' => $address
        ]);
        $order->save();
        return $order;
    }
}
