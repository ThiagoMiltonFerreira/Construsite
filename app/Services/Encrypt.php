<?php

namespace App\Services;


class Encrypt
{
    private function Encrypt($password){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        return $hashed_password;
    }
    public function GetEncryptPassword($password){
        return $this->Encrypt($password);
    }    
}