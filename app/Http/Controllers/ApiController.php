<?php

namespace App\Http\Controllers;

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
    public function category()
    {
        $category = Category::all();
        return $category;
    }
    public function product()
    {
        $product = Product::all();
        return $product;
    }
    public function productByCategory()
    {
        $categories = $this->category();
        $products = $this->product();

        $orderByCategory = [];

        // $posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);
        // dd($categories[0]['name']);
        foreach ($categories as $category) {

            foreach ($products as $product) {
                if ($product['category'] == $category['id']) {
                    array_push($orderByCategory, $product);
                }
            }
        }



        return $orderByCategory;
    }


    public function filterName($name = 'energetica')
    {
        $products = $this->product();
        $name = strtolower($name);
        if ($name == "all") {
            return $products;
        } else {
            $coincidences = [];

            foreach ($products as $product) {
                $existHere = strpos(strtolower($product['name']), $name);
                if ($existHere === false) {
                } else {
                    array_push($coincidences, $product);
                }
            }
            return $coincidences;
        }
    }
}





///////
