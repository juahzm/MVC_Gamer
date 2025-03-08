<?php



namespace App\Controllers;
use App\Models\Privilege;
use App\Models\Client;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

error_reporting(E_ALL);
ini_set('display_errors', 1);

class ClientController {


    // public function __construct(){

    //     Auth::session();
    //     Auth::privilege(1);
    // }

    public function store($data=[]){
        
        $validator = new Validator;
        $validator->field('clientName', $data['clientName'], 'Name')-> required()->max2(45); 
        $validator->field('clientUsername', $data['clientUsername'])->unique('Client')->required()->max(50)->emailf();
        $validator->field('clientPassword', $data['clientPassword'], 'Password')-> required()->max(255);
        // $validator->field('clientEmail', $data['clientEmail'])->required()->emailf();
        // $validator->field('Privilege_PrivilegeId', $data['Privilege_PrivilegeId'],)->required(); 

        
     if($validator->isSuccess()) {
      
        $data['clientEmail'] = $data ['clientUsername'];
        $client = new Client;
        $data['clientPassword'] = $client->hasPassword($data['clientPassword'], PASSWORD_BCRYPT, ['cost'=>10]);


       $client = new Client;
      
       $insert =$client->insert($data);

       if($insert){
        return view::redirect('login');
       }

   }else{
        $errors = $validator->getErrors();
        $privilege = new Privilege;
        $select = $privilege->Select();
        return View::render('client/create', ['errors' =>$errors, 'client'=> $data, 'privileges'=> $select]);
   }

    }

    public function create(){
       
        // Auth::privilege(1);
        


        $privilege = new Privilege;
        $select = $privilege->select();
        
    return View::render('client/create', ['privileges' => $select]);

    }
    

}