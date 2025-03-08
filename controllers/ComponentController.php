<?php


namespace App\Controllers;
use App\Models\Component;
use App\Models\Manufacturer;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

error_reporting(E_ALL);
ini_set('display_errors', 1);

class ComponentController {

        public function index(){
            Auth::session();

        $component = new Component;
        
        
        $select = $component->select('componentId');

       

        foreach($select as &$row){

            // Auth::privilege(1);
            
            $manufacturer = new Manufacturer;
            $select2 = $manufacturer->selectId($row['Manufacturer_idManufacturer']);
            $row['manufacturer'] = $select2['manufacturerName'];
        }
        // print_r($select);
        // die();

      return  View::render('component/index', ['components'=> $select]); //  $selectId
    }





    public function create() {
         Auth::session();
         Auth::privilege(1);

        $manufacturer = new Manufacturer;
        $select = $manufacturer->select();
        
    return View::render('component/create', ['manufacturers' => $select]);
        
    }
    






    public function show($data=[]){
    if(isset($data['componentId'])&& $data['componentId']!=null){
        $component = new Component;
    //    echo $data['componentId'];


       
    

        if($selectId = $component->selectId($data['componentId'])){

            $manufacturer = new Manufacturer;
            $select2 = $manufacturer->selectId($selectId['Manufacturer_idManufacturer']);
    
            $selectId['manufacturer'] = $select2['manufacturerName'];

            
        return View::render('component/show', ['component'=>$selectId]);
         }

    }
    return View::render('error');
    }





    public function store($data=[]){


     $validator = new Validator;
     $validator->field('componentName', $data['componentName'], 'Name')-> required()->max2(45); 
     $validator->field('componentDescription', $data['componentDescription'], 'Description')-> required()->max(500);
     $validator->field('componentPrice', $data['componentPrice'])->required()->number(); 
     
     if($validator->isSuccess()) {

          $component = new Component;
          $manufacturer = new Manufacturer;

          
        $insert = $component->insert($data);
        if($insert){
         return view::redirect('component?componentId='.$insert);
        }else{
     return View::render('error');
        }

     }else{
          $errors = $validator->getErrors();
          return View::render('component/create', ['errors' =>$errors, 'components'=> $data]);
     }
    }   


    public function edit($data=[]){
        Auth::session();
        Auth::privilege(1);

    if(isset($data['componentId']) && $data['componentId']!=null){
        $component = new Component;
        $manufacturer = new Manufacturer;
        $select = $manufacturer->select();
    //    echo $data['componentId'];
        if($selectId = $component->selectId($data['componentId'])){
        
            return View::render('component/edit', ['component' => $selectId, 'manufacturers' => $select]);
         }

    }
    return View::render('error');
     }

     public function update($data=[], $get=[]){

        Auth::session();

        
          $validator = new Validator;
          $validator->field('componentName', $data['componentName'], 'Name')-> required()->max2(45); 
          $validator->field('componentDescription', $data['componentDescription'], 'Description')-> required()->max(500);
         
        
          if($validator->isSuccess()) {
               $component = new Component;
               $update = $component->update($data, $get['componentId']);

                $manufacturer = new Manufacturer;
                $select = $manufacturer->select();

               if($update){
                   return view::redirect('component');
               }else{
                   return View::render('error');
                      }
               }else{
               $errors = $validator->getErrors();
               
               return View::render('component/edit', ['errors'=>$errors, 'component'=>$data]);
           }
        

     }

     public function delete($data=[]){

        Auth::session();

          $id = $data['id'];
          $component = new Component;
          $delete = $component->delete($id);
          if($delete){
              return view::redirect('component');
          }else{
              return View::render('error');
          }
        
      }
}