<?php 
require_once ('./app/views/auth.view.php');
require_once ('./app/models/auth.model.php');
class AuthController{
    private $view;
    private $model;
    public function __construct(){
        $this->model = new AuthModel();
        $this->view = new Authview();
    }
    public function showLogin(){
        return $this->view->showLogin();
    }

    public function login(){
        if (!isset($_POST['name']) || empty($_POST['name'])) {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }
    
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }

        $name = $_POST['name'];
        $password = $_POST['password'];

        $userFromDB = $this->model->getUserByName($name);
        // pass = 123456
        // name = admin
        if($userFromDB && password_verify($password, $userFromDB->password)){
            // Guardo en la sesión el ID del usuario
            session_start();
            $_SESSION['ID_USER'] = $userFromDB->id;
            $_SESSION['NAME_USER'] = $userFromDB->name;
    
            // Redirijo al home
            header('Location: ' . BASE_URL);
        } else {
            return $this->view->showLogin('Credenciales incorrectas');
        }
    }

    public function showRegister(){
        return $this->view->showRegister();
    }

    public function logout() {
        session_start(); // Va a buscar la cookie
        session_destroy(); // Borra la cookie que se buscó
        header('Location: ' . BASE_URL);
    }
}