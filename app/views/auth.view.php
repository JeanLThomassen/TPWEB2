<?php 
class AuthView{
    
    public function showLogin($error = ''){
        require 'templates/login.phtml';
    }
    public function showRegister($error = ''){
        require 'templates/register.phtml';
    }
}