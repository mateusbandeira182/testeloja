<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $product = $this->productRepository->get($request->product_id);
        if(!$request->session()->has('cart')) {
            $request->session()->put('cart.products', []);
        }
        $request->session()->push('cart.products', [
            'quantity' => $request->quantity,
            'product' => $product
        ]);
        return to_route('store.cart')->with('alert', "Produto '{$product->name}' foi adicionado no carrinho")->with('type', 'success');
    }

    public function show(Request $request, Product $product)
    {
        $cart = $request->session()->get('cart');
        return view('store.show')->with('cart', $cart)->with('product', $product);
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

    public function cart(Request $request)
    {
        $products = $request->session()->get('cart.products');
        $alert = session('alert');
        $type = session('type');
        return view('store.cart')
            ->with('products', $products)
            ->with('alert', $alert)
            ->with('type', $type);
    }
}
