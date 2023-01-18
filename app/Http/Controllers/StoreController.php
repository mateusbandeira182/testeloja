<?php

namespace App\Http\Controllers;

use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    )
    {}

    public function store(Request $request)
    {

    }

    public function index()
    {
        $alert = session('alert');
        $type = session('type');
        $products = $this->productRepository->all();
        return view('store.index')
            ->with('alert', $alert)
            ->with('type', $type)
            ->with('products', $products);
    }
}
