<?php
namespace App\Providers;
use App\Providers\View;



class Auth {
    static public function session(){
        if(isset($_SESSION['client_fingerPrint']) && $_SESSION['client_fingerPrint'] == md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'])){
            return TRUE;
        }else{
            return view::redirect('login');
            exit();
        }
    }

    static public function privilege($id){
        if($_SESSION['client_privilegeId'] == $id){
             return TRUE;
        }else{
             return view::redirect('login');
             exit();
        }
     }
 

}