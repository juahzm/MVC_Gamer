<?php

namespace App\Models;
use App\Models\CRUD;

class Client extends CRUD {
    protected $table='Client';
    protected $primaryKey='clientId';
    protected $fillable = ['clientName', 'clientAddress', 'clientTelephone', 'clientUsername', 'clientPassword', 'clientEmail', 'Privilege_PrivilegeId'];


public function hasPassword($clientPassword){
    return password_hash($clientPassword, PASSWORD_BCRYPT, ['cost'=>10]); 
}

public function checkUser($clientUsername, $clientPassword){
    $client = $this->unique('clientUsername', $clientUsername);
    if($client){
        if(password_verify($clientPassword, $client['clientPassword'])){
            session_regenerate_id();
            $_SESSION['client_id'] = $client['clientId'];
            $_SESSION['client_name'] = $client['clientName'];
            $_SESSION['client_privilegeId'] = $client['Privilege_PrivilegeId'];
            $_SESSION['client_fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']);

            // print_r($_SESSION);
            // die(); all good here
            return true;
             
        }else{
            return false;
        }
    }else{
        return false;
    }
}

}