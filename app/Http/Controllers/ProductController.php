<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;

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
        return view('products.index')
            ->with('alert', $alert)
            ->with('type', $type)
            ->with('products', $products);
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(ProductRequest $request)
    {
        $product = $this->productRepository->add($request);
        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products');
                $this->imageRepository->add($path, $product);
            }
        }
        return to_route('product.index')
            ->with('alert', "Produto '{$product->name}' foi cadastrado com sucesso")
            ->with('type', 'success');
    }

    public function edit(Product $product)
    {
        return view('products.edit')->with('product', $product);
    }

    public function update(ProductEditRequest $request, Product $product)
    {
        $result = $this->productRepository->update($request, $product);
        if($result === 0) {
            return to_route('product.index')
                ->with('alert', "Aconteceu algo e o produto '{$product->name}' não pode ser editado")
                ->with('type', 'danger');
        } else {
            return to_route('product.index')
                ->with('alert', "O produto '{$product->name}' foi atualizado com sucesso")
                ->with('type', 'success');
        }
    }

    public function show(Product $product)
    {
        $alert = session('alert');
        $type = session('type');
        return view('products.show')
            ->with('product', $product)
            ->with('alert', $alert)
            ->with('type', $type);
    }

    public function destroy(Product $product)
    {
        try {
            $imageResponse = $this->imageRepository->removeAllImages($product);
            $productResponse = $this->productRepository->remove($product);
            if($imageResponse && $productResponse === 1) {
                return to_route('product.index')->with('alert', "Produto '{$product->name}' removido com sucesso")->with('type', 'success');
            }
        } catch (\Throwable $exception) {
            return to_route('product.index')->with('alert', $exception->getMessage())->with('type', 'danger');
        }
    }
}
