<?php
/**
 * Created by PhpStorm.
 * User: raifurrahim
 * Date: 4/5/2018
 * Time: 1:56 AM
 */

class Validation
{

    public function check_empty($data, $field){
        $msg = null;
        foreach ($field as $value){
            if (empty($data[$value])){
                $msg .="$value field is empty.<br/>";
            }
        }
        return $msg;

    }

    public function is_age_valid($age){
        if(preg_match("/^[0-9]+$/", $age)){
            return true;
        }

        return false;
    }

    public function is_mail_valid($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }

        return false;
    }
}
?>