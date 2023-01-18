<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private ImageRepositoryInterface $imageRepository
    )
    {}

    public function index()
    {
        $alert = session('alert');
        $type = session('type');
        $products = $this->productRepository->all();
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(ProductRequest $request)
    {
        $product = $this->productRepository->add($request);
        if($request->hasFile('images'))
        foreach ($request->file('images') as $image) {
            $name = bin2hex(random_bytes(4));
            $path = $image->store('products', $name);
            $image = $this->imageRepository($path);
        }
        return to_route('product.index')
            ->with('alert', "Produto '{$product->name}' foi cadastrado com sucesso")
            ->with('type', 'success');
    }

    public function update(Product $product)
    {

    }

    public function destroy(Product $product)
    {

    }
}
