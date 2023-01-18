<?php

namespace App\Providers;

use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Image\Implementations\EnlouquentImageRepository;
use Illuminate\Support\ServiceProvider;

class ImageRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        ImageRepositoryInterface::class => EnlouquentImageRepository::class,
    ];

}
