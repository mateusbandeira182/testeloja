<?php

namespace App\Repositories\Image\Implementations;

use App\Http\Requests\ProductRequest;
use App\Models\Image;
use App\Models\Product;
use App\Repositories\Image\ImageRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EnlouquentImageRepository implements ImageRepositoryInterface
{

    public function add(string $path, Product $product)
    {
        return DB::transaction(function() use ($path, $product) {
            return Image::create([
                'image_url' => $path,
                'product_id' => $product->id
            ]);
        });
    }

    public function getImages(int $product_id)
    {
        // TODO: Implement getImages() method.
    }

    public function remove(Image $image)
    {
        return DB::transaction(function () use ($image) {
            Storage::delete($image->image_url);
            return Image::where('id', $image->id)->delete();
        });
    }

    public function removeAllImages(Product $product)
    {
        return DB::transaction(function() use ($product) {
            $images = Image::where('product_id', $product->id)->get();
            foreach ($images as $image) {
                Storage::delete($image->image_url);
                $image->delete();
            }
            return true;
        });
    }

}
