<?php

namespace App\Http\Resources\Order;

use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/**
 * class OrderResource
 * @mixin Order
 */
class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param  Request  $request
     * @return array
     */
    public function toArray($request) : array
    {
        return [
            'id' => $this->id,
            'user_full_name' => $this->user_full_name,
            'price' => $this->price,
            'address' => $this->address,
            'created_at' => $this->created_at,
        ];
    }
}
