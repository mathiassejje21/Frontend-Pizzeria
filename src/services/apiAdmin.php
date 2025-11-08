<?php 
use GuzzleHttp\Client;

class apiAdmin{
    private $admin;
    public function __construct(){
        $this->admin= new Client([
            'base_uri' => 'http://localhost:8000/api/usuario/',
        ]);
    }
}
?>