<?php
/**
 * Created by PhpStorm.
 * User: raifurrahim
 * Date: 4/5/2018
 * Time: 1:39 AM
 */

include_once 'DBConfig.php';

class CRUD extends DBConfig
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getData($query){
        $result = $this->connection->query($query);

        if ($result == false){
            return false;
        }

        $row = array();

        while ($row = $result->fetch_assoc()){
            $rows = $row;
        }

        return $rows;
    }

    public function execute($query){
        $result=$this->connection->query($query);

        if ($result = false){
            echo 'Error: can not execute the command';
            return false;
        }
        else{
            return true;
        }
    }

    public function delete($id,$table){
        $query = "DELETE FROM $table WHERE id = $id";

        $result = $this->connection->query($query);

        if ($result=false){
            echo 'Error: can not delete this id '. $id .'from table '.$table;
            return false;
        }
        else{
            return true;
        }
    }

    public function escape_string($value){

        return $this->connection->real_escape_string($value);
    }

}
?>