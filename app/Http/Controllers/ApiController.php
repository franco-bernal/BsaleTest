<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Libraries\ApiTest\ProductApi;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //metodo con la consulta para la bd de datos que alimanta el select
    public function category(Request $request)
    {
        $category = Category::all();
        return $category;
    }

    public function product(Request $request)
    {
        return Product::with('category')->paginate(8);
    }

    //Metodo que procesa los filtros de nombre,categoría y orden
    public function productByCategory($name = "all", $category = "all", $orden = "asc", Request $request)
    {
        $name = strtolower(request('name'));
        $category = request('category');

        if ($name == "all") {
            $name = "";
        }
        if ($category == "all") {
            $category = "";
        }

        $products = Product::where('category', 'LIKE', "%" . $category . "%")
            ->where('name', 'LIKE', "%" . $name . "%")
            ->with('category');

        if ($orden == "mas") {
            return $products->orderBy('price', "desc")->paginate(7);
        }
        if ($orden == "menos") {
            return $products->orderBy('price', "asc")->paginate(7);
        }

        return $products->orderBy('category', $orden)->paginate(7);
    }
}
