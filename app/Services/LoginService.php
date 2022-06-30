<?php

namespace App\Services;


use App\Services\ApiHandler;
use App\Services\Implemen\LoginServiceImpl;


class LoginService implements LoginServiceImpl{
    // private $base = 'api';

    public function login($user, $password)
    {
        return ApiHandler::requestWithoutAccessToken("POST","/api/login",[
            "email"     => $user,
            "password"  => $password
        ]);
    }

    public function resetPassword($password, $password_confirmation)
    {
        return ApiHandler::request("POST","/api/resetPassword",[
            "password"  => $password,
            "password_confirmation" => $password_confirmation
        ]);
    }

    public function profile(){
        return ApiHandler::request("GET","/api/userProfile");
    }


    public function getUser($page,$limit){
        return ApiHandler::request("GET","/api/user?page=".$page."&limit=".$limit);
    }
    
    public function  registerUser($name,$email,$phone,$password,$password_confirmation){
        return ApiHandler::requestWithoutAccessToken("POST","/api/register",[
            "name"  => $name,
            "email" => $email,
            "phone" => $phone,
            "password" => $password,
            "password_confirmation" => $password_confirmation,
        ]);
    }
}
