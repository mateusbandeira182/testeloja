<?php

namespace App\Providers;

use App\Repositories\Product\Implementations\EnlouquentProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ProductRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        ProductRepositoryInterface::class => EnlouquentProductRepository::class,
    ];

}
