<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models
 * @property int $id
 * @property string $user_full_name
 * @property int $price
 * @property string $address
 * @property Carbon $created_at
 * @mixin Builder
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_full_name',
        'price',
        'address'
    ];
}
