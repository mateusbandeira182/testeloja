<?php

namespace App\Repositories\Product\Implementations;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
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

    public function update(Request $request, Product $product)
    {
        return DB::transaction(function() use ($request, $product) {
            return Product::where('id', $product->id)->update([
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'description' => $request->description
            ]);
        });
    }

    public function remove(Product $product)
    {
        return DB::transaction(function() use ($product) {
            return Product::where('id', $product->id)->delete();
        });
    }

    public function all()
    {
        return DB::transaction(function() {
            return Product::all();
        });
    }

    public function get(int $product_id)
    {
        return DB::transaction(function() use ($product_id) {
            return Product::find($product_id);
        });
    }
}
