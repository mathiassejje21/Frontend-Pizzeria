<?php
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

class apiAuthetication {
    private $user;
    private $jar;

    public function __construct() {
        if (isset($_SESSION['cookiejar'])) {
            $this->jar = unserialize($_SESSION['cookiejar']);
        } else {
            $this->jar = new CookieJar();
        }

        $this->user = new Client([
            'base_uri' => 'http://localhost:8000/api/auth/',
            'cookies' => $this->jar,
        ]);
    }

    public function __destruct() {
        $_SESSION['cookiejar'] = serialize($this->jar);
    }

    public function register($data) {
        $response = $this->user->post('register', [
            'json' => $data
        ]);
        return $response;
    }

    public function login($data) {
        $response = $this->user->post('login', [
            'json' => $data
        ]);
        return $response;
    }

    public function logout() {
        $response = $this->user->post('logout');
        return $response;
    }

    public function profile() {
        $response = $this->user->get('profile');
        return $response;
    }
}
