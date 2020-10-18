<?php

declare(strict_types=1);

namespace App\Store\Infrastructure\Model\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected string $table = 'products';

    protected $primaryKey = 'name';

    protected $fillable = ['name', 'price_amount', 'price_currency'];
}

