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
                    $attr = [
                        'id' => $product['id'],
                        'name' => $product['name'],
                        'url_image' => $product['url_image'],
                        'price' => $product['price'],
                        'discount' => $product['discount'],
                        'category' => $product['category'],
                        'name_category' => $category['name'],
                    ];
                    array_push($orderByCategory, $attr);
                }
            }
        }
        return $orderByCategory;
    }


    public function filterName($name = 'all', $category = "all")
    {
        $products = $this->productByCategory();
        $name = strtolower($name);
        if ($name == "all" && $category == "all") { //si hay valores en los parametros diferentes de all, procesamos
            return $products;
        } else { // si los dos parametros son all, devolvemos los productos
            $coincidences = []; //arreglo para los productos que coincidan con el parametro $name
            $newCoincidences = []; //arreglo para el parametro category

            if ($name != "all") { //si se pide algo en especifico que lo procese
                foreach ($products as $product) { //recorremos todos los productos
                    $existHere = strpos(strtolower($product['name']), $name); //buscamos el pedazo de texto del parametro en el producto
                    if ($existHere === false) {
                    } else { //se verifica que si no es false puede ser cualquier otro resultado, en caso de que sea 0
                        array_push($coincidences, $product); //entonces devolvemos la posición
                    }
                }
            } else { //si pidieron todos los productos relacionados se mantiene intacto el product
                $coincidences = $products;
            }

            if ($category != "all") { //si se pide algo en especifico que lo procese
                foreach ($coincidences as $coincidence) { //recorremos todos los productos procesados
                    if ($coincidence['category'] == $category) { //si coincide con el id del parametro lo guardamos en el arreglo
                        array_push($newCoincidences, $coincidence);
                    }
                }
            } else {
                $newCoincidences = $coincidences;
            }

            return $newCoincidences;
        }
    }
}
