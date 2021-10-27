<?php

namespace App\Services\Abstracts;

use App\Models\Order;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 *
 */
interface OrderInterface
{
    /**
     * @return LengthAwarePaginator
     */
    public function list(): LengthAwarePaginator;

    /**
     * @param int $id
     * @return Order
     */
    public function getOrder(int $id) : Order;

    /**
     * @param string $user_full_name
     * @param int $price
     * @param string $address
     * @return Order
     */
    public function createOrder(string $user_full_name, int $price, string $address) : Order;

    /**
     * @param string $user_full_name
     * @param int $price
     * @param string $address
     * @param int $id
     * @return Order
     */
    public function updateOrder(string $user_full_name, int $price, string $address, int $id) : Order;

}
