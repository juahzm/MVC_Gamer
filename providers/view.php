<?php
namespace App\Providers;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class View {
    static public function render($template, $data = []){ //template: nom du fiche component index, 
        $loader = new FilesystemLoader('views');
        $twig = new Environment($loader);
        $twig->addGlobal('asset', ASSET);
        $twig->addGlobal('base', BASE);
        $twig->addGlobal('session', $_SESSION);

        if(isset($_SESSION['client_fingerPrint']) && $_SESSION['client_fingerPrint'] == md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'])){
            $guest = false;
        }else{
            $guest = true; //verify if i am connected or not, guess not conneted
        }
        $twig->addGlobal('guest', $guest);



        echo $twig->render($template.".php", $data);
    }
    static public function redirect($url){
        return header('location:'.BASE.'/'.$url);
    }
}
