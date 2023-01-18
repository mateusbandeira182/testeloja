<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadImagesProductRequest;
use App\Models\Image;
use App\Models\Product;
use App\Repositories\Image\ImageRepositoryInterface;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct(
        private ImageRepositoryInterface $imageRepository
    )
    {}

    public function remove(Product $product, Image $image)
    {
        $response = $this->imageRepository->remove($image);
        if($response === 1) {
            return to_route('product.show', $product->id)
                ->with('alert', 'Imagem removida com sucesso')
                ->with('type', 'success');
        } else {
            return to_route('product.index')
                ->with('alert', 'Aconteceu algo e a imagem não pode ser removida')
                ->with('type', 'danger');
        }
    }

    public function upload(Product $product, UploadImagesProductRequest $request)
    {
        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products');
                $this->imageRepository->add($path, $product);
            }
        }
        return to_route('product.show', $product->id)
            ->with('alert', "Upload de imagens do produto '{$product->name}' realizado com sucesso")
            ->with('type', 'success');
    }
}
