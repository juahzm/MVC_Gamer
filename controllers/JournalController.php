<?php


namespace App\Controllers;
use App\Providers\Auth;
use App\Models\Journal;
use App\Providers\View;

class JournalController{


    public function __construct(){

        Auth::session();
    }


public function index(){

   
    Auth::session();
    Auth::privilege(1);


    $journal = new Journal();
    $select = $journal->select();
    
    // print_r($select);
    
    if ($select) {
        
        return View::render('/journal/index', ['journals' => $select]);

    } else {

    return View::render('/component'); 
    }



}




}