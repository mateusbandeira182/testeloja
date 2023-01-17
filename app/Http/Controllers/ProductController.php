<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    )
    {}

    public function index()
    {
        $products = $this->productRepository->all();
    }

    public function create()
    {
        return view('products.create');
    }
    public function store()
    {

    }

    public function update(Product $product)
    {

    }

    public function destroy(Product $product)
    {

    }
}
