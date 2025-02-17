<?php

namespace App\Controllers;
use App\Models\Component;
use App\Providers\View;

class ComponentController {


    public function index(){
$components = new Component;
// this one is the method from the crud, l'enfant herite sa methode, on eleev 'Component' this one is the varable table from component.php
$select = $components->select('ComponentName'); 
   return  View::render('component/index.php', ['components'=> $select]);
}

public function create() {

    return View::render('component/create.php');
}

public function show($data=[]){
    if(isset($data['componentId'])&& $data['componentId']!=null){
        $component = new Component;
    // echo $data['componentId'];
    if($selectId = $component->selectId($data['componentId'])){
        return View::render('component/show.php', ['component'=>$selectId]);
    }else{
        echo "sorry";
        // return View::render('error', ['msg'=>'Invalid Component']); 
    }
 

    }
    // return View::render('error BIO, ne marche pas');



}

}