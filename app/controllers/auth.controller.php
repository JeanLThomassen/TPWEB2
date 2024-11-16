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
        // name = webadmin
        // pass = admin
        if($userFromDB && password_verify($password, $userFromDB->password)){
            session_start();
            $_SESSION['ID_USER'] = $userFromDB->id;
            $_SESSION['NAME_USER'] = $userFromDB->name;
    
            header('Location: ' . BASE_URL);
        } else {
            return $this->view->showLogin('Nombre o contraseña incorrectas');
        }
    }


    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
    }

}
