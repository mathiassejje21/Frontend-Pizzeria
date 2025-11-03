<?php

class authController{
    private $email;
    private $password;
    private $nombre;
    private $apiAuth;

    public function __construct() {
        require_once __DIR__ . '/../../services/apiAuthetication.php';
        $this->apiAuth = new apiAuthetication();
        $this->email = "";
        $this->password = "";
        $this->nombre = "";
    }

    public function showLogin() {
        include_once __DIR__ . '/../../../public/views/trabajadores/login.php';
    }

    public function processLogin() {
        $this->email = $_POST['email'] ?? '';
        $this->password = $_POST['password'] ?? '';
        
        $response = $this->apiAuth->login([
            'email' => $this->email,
            'password' => $this->password
        ]);

        $body = json_decode($response->getBody(), true);

        if($body['mensaje']=='Login exitoso'){
            session_start();
            $user = $this->apiAuth->profile();
            $userBody = json_decode($user->getBody(), true);
            $_SESSION['user'] = $userBody['user'];
            if($userBody['user']['rol'] == 'administrador'){
                header('Location: /admin/dashboard');
                exit();
            }elseif($userBody['user']['rol'] == 'personal'){
                header('Location: /personal/dashboard');
                exit();
            }elseif($userBody['user']['rol'] == 'cliente'){
                header('Location: /cliente/dashboard');
                exit();
            }else{
                echo 'hubo un error';
            }
        }else{
            header('Location: /trabajadores/login');
            exit();
        }
    }

    public function logout(){
        session_start();
        $response = $this->apiAuth->logout();
        json_decode($response->getBody(), true);
        session_destroy();
        header('Location: /trabajadores/login');
        exit();
    }
}

?>