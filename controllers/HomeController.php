<?php

namespace App\Controllers;

use App\Models\Examplemodel;


class HomeController {

    public function index() {

        $model = new Examplemodel ;
        $data = $model->getData();

        include('views/home.php'); 
    }
}

?>
