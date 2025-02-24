<?php


namespace App\Controllers;
use App\Models\Component;
use App\Providers\View;
use App\Providers\Validator;

error_reporting(E_ALL);
ini_set('display_errors', 1);

class ComponentController {

        public function index(){
        $components = new Component;
        // this one is the method from the crud, l'enfant herite sa methode, on eleev 'Component' this one is the varable table from component.php
        $select = $components->select('ComponentName'); 
   return  View::render('component/index', ['components'=> $select]);
    }

    public function create() {

    return View::render('component/create');
    }

    public function show($data=[]){
    if(isset($data['componentId'])&& $data['componentId']!=null){
        $component = new Component;
       echo $data['componentId'];
        if($selectId = $component->selectId($data['componentId'])){
        return View::render('component/show', ['component'=>$selectId]);
         }

    }
    return View::render('error');
    }

    public function store($data=[]){


     $validator = new Validator;
     $validator->field('componentName', $data['componentName'], 'Name')-> required()->max2(45); 
     $validator->field('componentDescription', $data['componentDescription'], 'Description')-> required()->max(500); 
     
     if($validator->isSuccess()) {

          $component = new Component;
    $insert = $component->insert($data);
    if($insert){
         return view::redirect('component/show?componentId='.$insert);
    }else{
     return View::render('error');
    }

     }else{
          $errors = $validator->getErrors();
          return View::render('component/create', ['errors' =>$errors, 'components'=> $data]);
     }
    }   


    public function edit($data=[]){
    if(isset($data['componentId']) && $data['componentId']!=null){
        $component = new Component;
    //    echo $data['componentId'];
        if($selectId = $component->selectId($data['componentId'])){
        return View::render('component/edit', ['component' => $selectId]);
         }

    }
    return View::render('error');
     }

     public function update(){

     }
}