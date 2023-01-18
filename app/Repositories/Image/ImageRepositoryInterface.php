<?php

namespace App\Repositories\Image;

use App\Http\Requests\ProductRequest;
use App\Models\Image;

interface ImageRepositoryInterface
{
    public function add(string $path);

    public function remove(Image $image);
}
