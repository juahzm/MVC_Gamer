<?php
namespace App\Models;

abstract class CRUD extends \PDO {
    final public function __construct(){
        parent::__construct('mysql:host=localhost; dbname=compuparts; port=3306; charset=utf8', 'root', '');
    }

    final public function select($field = null) {
        if($field == null){
            $field = $this->primaryKey;
        }
        
        $sql = "SELECT * FROM $this->table";//la variable table du component.php
        $stmt =$this->query($sql);
        return $stmt->fetchAll();
    }

    final public function selectId($value){
        $sql = "SELECT * FROM $this->table WHERE $this->primarykey = :$this->primarykey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primarykey", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1){
            return $stmt->fetch();
        }else{
            return false;
        }

    }
}