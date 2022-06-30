<?php

namespace App\Services\Implemen;


interface LoginServiceImpl{
    
    //Do login.  
    public function login($user, $password);
    public function resetPassword($password, $password_confirmation);
    public function profile();
    public function  registerUser($name,$email,$phone,$password,$password_confirmation);
    public function getUser($page,$limit);
    
}
