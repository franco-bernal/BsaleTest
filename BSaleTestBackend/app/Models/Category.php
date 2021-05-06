<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;
    protected $table = 'category';

    public function products()
    { //se indica la relación con el producto
        return $this->hasMany(Product::class, 'category');
    }

    //scope para añadir la categoría al producto
    public function scopeWithProducts($query)
    {
        if (request('withProducts')) {
            $query->with('products');
        }
    }
}
