<?php

namespace App\Controllers;
use App\Models\Client;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;


class AuthController{

    public function index() {
        return View::render('auth/index');

    }

    public function store($data) {
        $validator = new Validator;
        $validator->field('clientUsername', $data['clientUsername'])->required()->max(50)->emailf();
        $validator->field('clientPassword', $data['clientPassword'], 'Password')-> required()->max(255);

        if($validator->isSuccess()){
            $client = new Client;
            $check = $client->checkUser($data['clientUsername'],$data['clientPassword']);
            if($check){
                
                return View::redirect('component');
                
            }else{
                return View::render('auth/index');
            }

        }else{
           
            $errors = $validator->getErrors();
            return View::render('auth/index', ['errors'=>$errors, 'client'=>$data]);

        }
        
    }

    public function delete() {

        session_destroy();
        return View::redirect('login');
        
    }
}