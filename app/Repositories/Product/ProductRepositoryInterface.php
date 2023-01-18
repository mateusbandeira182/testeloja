<?php

namespace App\Repositories\Product;

use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

interface ProductRepositoryInterface
{
    public function add(ProductRequest $request);

    public function update(ProductEditRequest $request, Product $product);

    public function remove(Product $product);

    public function all();

    public function get(int $product_id);
}
