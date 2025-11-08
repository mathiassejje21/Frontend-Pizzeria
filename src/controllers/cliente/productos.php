<?php 

require_once __DIR__ . '/../services/apiProductos.php';

class productosController {
    private $apiProductos;

    public function __construct(){
        $this->apiProductos = new apiProductos();
    }

    public function listarProductos() {
        $response = $this->apiProductos->getAllProductos();
        $body = json_decode($response->getBody()->getContents(), true);
        return $body;
    }

}

?>
