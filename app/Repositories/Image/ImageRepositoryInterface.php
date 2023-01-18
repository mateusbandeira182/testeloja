<?php

namespace App\Repositories\Image;

use App\Http\Requests\ProductRequest;
use App\Models\Image;
use App\Models\Product;

interface ImageRepositoryInterface
{
    public function add(string $path, Product $product);

    public function getImages(int $product_id);

    public function remove(Image $image);

    public function removeAllImages(Product $product);
}
