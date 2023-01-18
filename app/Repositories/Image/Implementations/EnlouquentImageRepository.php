<?php

namespace App\Repositories\Image\Implementations;

use App\Http\Requests\ProductRequest;
use App\Models\Image;
use App\Repositories\Image\ImageRepositoryInterface;
use Illuminate\Support\Facades\DB;

class EnlouquentImageRepository implements ImageRepositoryInterface
{

    public function add(string $path)
    {
        return DB::transaction(function() use ($path) {
            return Image::create([
                'image_url' => $path
            ]);
        });
    }

    public function remove(Image $image)
    {
        // TODO: Implement remove() method.
    }
}
