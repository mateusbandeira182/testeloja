<?php

namespace App\Repositories\Product;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

interface ProductRepositoryInterface
{
    public function add(ProductRequest $request);

    public function update(Product $product);

    public function remove(Product $product);

    public function all();
}
