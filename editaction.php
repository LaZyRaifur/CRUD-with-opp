<?php
/**
 * Created by PhpStorm.
 * User: raifurrahim
 * Date: 4/7/2018
 * Time: 12:59 AM
 */

include_once ("classes/CRUD.php");
include_once ("classes/Validation.php");

$curd = new CRUD();
$validation = new Validation();

if (isset($_POST['update'])){
    $id = $crud->escape_string($_POST['id']);

    $name = $crud->escape_string($_POST['name']);
    $age = $crud->escape_string($_POST['age']);
    $email = $crud->escape_string($_POST['email']);

    $msg = $validation->check_empty($_POST,array('name','age','email'));
    $check_age = $validation->is_age_valid($_POST['age']);
    $check_email = $validation->is_mail_valid($_POST['email']);

    //checking empty field

    if ($msg){
        echo $msg;
        //link to the previous page;
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }elseif (!$check_age){
        echo 'Please provide proper age';
    }
    elseif (!$check_email){
        echo 'please provide proper email address';
    }else{
        //updating table
        $result = $crud->execute("UPDATE users SET name = '$name',age ='$age',email = '$email' WHERE id=$id");

        //redirecting  to the display page .in our case, it is index.php
        header("Location: index.php");
    }

}
?>