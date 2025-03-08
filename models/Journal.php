<?php

namespace App\Models;
use App\Models\CRUD;

class Journal extends CRUD {

    protected $table='Journal';
    protected $primaryKey='journalId';
    protected $fillable = ['journalId', 'journalIp', 'journalTime', 'journalUsername']; 

    public function getJournalInfo(){

        $data = [];
        if (isset($_SESSION['client_fingerPrint']) and md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'])) {
            $data['journalUsername'] = $_SESSION['client_name'];


            $data['journalTime'] = date_create()->format('Y-m-d H:i:s');
            $data['journalIp'] = $_SERVER['SERVER_ADDR'];
           

        return $data;


    }

} 
}
