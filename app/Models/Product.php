<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class)->using(OrderProduct::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }

}
