<?php

use GuzzleHttp\Client;


class apiProductos{
    private $productos;
    public function __construct(){
        $this->productos = new Client(['base_uri' => 'http://localhost:8000/api/']);
    }
    
    public function getAllProductos(){
        $response = $this->productos->get('producto');
        return $response;
    }

    public function getProducto($id){
        $response = $this->productos->get('producto/' . $id);
        return $response;
    }
}
?>