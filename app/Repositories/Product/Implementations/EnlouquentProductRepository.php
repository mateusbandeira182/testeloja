<?php

namespace App\Repositories\Product\Implementations;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class EnlouquentProductRepository implements ProductRepositoryInterface
{

    public function add(ProductRequest $request)
    {
        return DB::transaction(function() use ($request) {
            return Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'price' => $request->price,
            ]);
        });
    }

    public function update(Product $product)
    {
        // TODO: Implement update() method.
    }

    public function remove(Product $product)
    {
        // TODO: Implement remove() method.
    }

    public function all()
    {
        // TODO: Implement all() method.
    }


}
