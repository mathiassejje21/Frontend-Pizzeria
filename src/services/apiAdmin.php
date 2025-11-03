<?php 
use GuzzleHttp\Client;

class apiAdmin{
    private $admin;
    private $personal;
    private $cliente;
    public function __construct(){
        $this->admin= new Client([
            'base_uri' => 'http://localhost:8000/api/usuario?rol=4/',
        ]);
        $this->personal= new Client([
            'base_uri' => 'http://localhost:8000/api/usuario?rol=3/',
        ]);
        $this->cliente= new Client([
            'base_uri' => 'http://localhost:8000/api/usuario?rol=1/',
        ]);
    }
}
?>