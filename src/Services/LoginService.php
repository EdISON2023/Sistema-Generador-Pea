<?php

namespace PeaYavirac\Services;
ob_start();
use PeaYavirac\Models\UsuariosModel;

class LoginService
{
    private $model;
    public function __construct()
    {
        $this->model = new UsuariosModel();
    }

    public function login()
    {

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->model->login($username, $password);
            if ($user['estado'] == 'ok') {

                if (isset($_SESSION['redirect_url'])) {
                    $_SESSION['user'] = $user;
                    $redirectre_url = $_SESSION['redirect_url'];
                    unset($_SESSION['redirect_url']);
                    header("Location: " . $redirectre_url);
                    ob_end_clean();
                    exit();
                    
                }
            }else{
                $_SESSION['user']=false;
            }
        }
    }

    public function configuracionPage($id){
        return $this->model->findOne($id);
    }
}

?>
