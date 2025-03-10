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
        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1){
            return $stmt->fetch();
        }else{
            return false;
        }

    }


    final public function insert($data){
        if (!is_array($data) || empty($data)) {
            return false;
        }


        $data_keys = array_fill_keys($this->fillable, '');
        $data = array_intersect_key($data, $data_keys);

        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":".implode(', :', array_keys($data));
        $sql="INSERT INTO $this->table ($fieldName) VALUES ($fieldValue);";
        
        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        if($stmt->execute()){
            return $this->lastInsertId();
        }else{
            return false;
        }
  
    }

    final public function update($data, $id){
        if($this->selectId($id)){
            $data_keys = array_fill_keys($this->fillable, '');
            $data = array_intersect_key($data, $data_keys);

            $fieldName = null;
            foreach($data as $key=>$value){
                $fieldName .= "$key = :$key, ";
            }
            $fieldName = rtrim($fieldName, ', ');
            $sql = "UPDATE $this->table SET $fieldName WHERE $this->primaryKey = :$this->primaryKey";
            
            $data[$this->primaryKey] = $id;
        
            $stmt = $this->prepare($sql);
            foreach($data as $key=>$value){
                $stmt->bindValue(":$key", $value);
            }
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    final public function delete($value){
        if($this->selectId($value)){
            $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
            $stmt = $this->prepare($sql);
            $stmt->bindValue(":$this->primaryKey", $value);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            } 
        }else{
            return false;
        }
    }
    
    //function pour definir est-ce que la valeur existe dans les tables ... 
      public function unique($field, $value){
        $sql = "SELECT * FROM $this->table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count==1){
            return $stmt->fetch();
        }else{
            return false;
        }

    }

}