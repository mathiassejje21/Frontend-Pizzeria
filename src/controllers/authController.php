<?php

class authController {
    private $email;
    private $password;
    private $nombre;
    private $apiAuth;

    public function __construct() {
        require_once __DIR__ . '/../services/apiAuthetication.php';
        $this->apiAuth = new apiAuthetication();
        $this->email = "";
        $this->password = "";
        $this->nombre = "";
    }

    public function showLogin() {
        include_once __DIR__ . '/../views/login.php';
    }

    public function processLogin() {
        session_start();
        $this->email = $_POST['email'] ?? '';
        $this->password = $_POST['password'] ?? '';
        $_SESSION['error'] = '';
        $_SESSION['user'] = '';
        try {
            $response = $this->apiAuth->login([
                'email' => $this->email,
                'password' => $this->password
            ]);

            $body = json_decode($response->getBody(), true);

            if (isset($body['mensaje']) && $body['mensaje'] == 'Login exitoso') {
                $user = $this->apiAuth->profile();
                $userBody = json_decode($user->getBody(), true);
                $_SESSION['user'] = $userBody['user'];
                
                if ($_SERVER['REQUEST_URI'] === '/Pizzeria/login'){
                    if ($userBody['user']['rol'] == 'cliente') {
                        header('Location: /Pizzeria/dashboard');
                        exit();
                    } else {
                        $this->logout();
                        exit();
                    }
                } elseif ($_SERVER['REQUEST_URI'] === '/trabajadores/login') {
                    if ($userBody['user']['rol'] == 'administrador') {
                        header  ('Location: /admin/dashboard');
                        exit();
                    } elseif ($userBody['user']['rol'] == 'personal') {
                        header('Location: /personal/dashboard');
                        exit();
                    } else {
                        $this->logout();
                        exit();
                    }
                }
            } elseif (isset($body['mensaje'])) {
                $_SESSION['error'] = $body['mensaje'];
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit();
            }

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $responseBody = (string) $e->getResponse()->getBody();
            $data = json_decode($responseBody, true);
            $_SESSION['error'] = $data['mensaje'] ?? 'Error en la autenticación';
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();

        } catch (\Exception $e) {
            $_SESSION['error'] = 'Error inesperado: ' . $e->getMessage();
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        }
    }

    public function showRegister() {
        include_once __DIR__ . '/../views/cliente/register.php';
    }

    public function processRegister() {
        session_start();
        $this->email = $_POST['email'] ?? '';
        $this->password = $_POST['password'] ?? '';
        $this->nombre = $_POST['nombre'] ?? '';
        $_SESSION['mensaje-register'] = '';

        try{
            $response = $this->apiAuth->register([
                'nombre' => $this->nombre,
                'email' => $this->email,
                'password' => $this->password
            ]);

            $body = json_decode($response->getBody(), true);

            if (isset($body['mensaje']) && $body['mensaje'] == 'Usuario registrado correctamente') {
                $_SESSION['mensaje-register'] = $body['mensaje'];
                header('Location: /Pizzeria/register');
                exit();
            } elseif (isset($body['mensaje'])) {
                $_SESSION['mensaje-register'] = $body['mensaje'];
                header('Location: /Pizzeria/register');
                exit();
            }

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $responseBody = (string) $e->getResponse()->getBody();
            $data = json_decode($responseBody, true);
            $_SESSION['mensaje-register'] = $data['mensaje'] ?? 'Error al Registrarse';
            header('Location: /Pizzeria/register');
            exit();

        } catch (\Exception $e) {
            $_SESSION['mensaje-register'] = 'Error inesperado: ' . $e->getMessage();
            header('Location: /Pizzeria/register');
            exit();
        }
    }

    public function logout() {
        session_start();
        $response = $this->apiAuth->logout();
        json_decode($response->getBody(), true);
        $rol = $_SESSION['user']['rol'] ?? '';
        session_destroy();

        if ($rol === 'cliente') {
            header('Location: /pizzeria/login');
        } elseif ($rol === 'personal' || $rol === 'administrador') {
            header('Location: /trabajadores/login');
        } else {
            header('Location: /pizzeria');
        }

        exit();
    }


}

?>
