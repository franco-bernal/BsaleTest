<?php

namespace App\Libraries\ApiTest;

use Exception;
use Illuminate\Support\Facades\Http;

class ProductApi
{
    protected $http;



    public function getProductos() //agrupación de datos
    {
        $response = Http::get('http://localhost:8000/api/product');
        dd($response);
        //    $res = $client->request('GET', 'http://localhost:8000/api/product'); // . $request->input('telefono'));

        // $arreglo = $arreglo["lists"]; //se obtienen los datos dentro de lists
        // $nuevo = []; //arreglo que contendrá el nuevo resultado
        // foreach ($arreglo as $list) {
        //     $attr =
        //         [
        //             'id' => $list["id"],
        //             'name' => $list["name"]
        //         ];
        //     array_push($nuevo, $attr); //se agrega los datos seleccionados al arreglo
        // }
        // return $nuevo;
    }
}
