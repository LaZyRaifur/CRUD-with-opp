<?php
/**
 * Created by PhpStorm.
 * User: raifurrahim
 * Date: 4/7/2018
 * Time: 1:21 AM
 */

//including database connection file

include_once ("classes/CRUD.php");
$crud = new CRUD();

//getting id of data from url

$id =$crud->escap_string($_GET['id']);

//delete the row form the table

$result =$crud->delete($id,'users');

if ($result){
    //redirecting to the display page index.php in our case

    header("Location:index.php");
}
?>