<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    public function category()
    {//Acá se indica la relacion con la categoria
        return $this->belongsTo(Category::class, 'category');
    }
}
