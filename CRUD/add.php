

<hmtl>
    <head>
        <title>Add Data</title>
    </head>

    <body>
    <?php
    /**
     * Created by PhpStorm.
     * User: raifurrahim
     * Date: 4/5/2018
     * Time: 2:08 AM
     */

     include_once ("classes/Crud.php");
     include_once ("classes/Validation.php");

     $crud = new CRUD();
     $validation = new Validation();

     if (isset($_POST['Submit'])){
         $name = $crud->escape_string($_POST['name']);
         $age = $crud->escape_string($_POST['age']);
         $email = $crud->escape_string($_POST['email']);


         $msg = $validation->check_empty($_POST,array('name','age','email'));

         $check_age =$validation->is_age_valid($_POST['age']);
         $check_mail = $validation->is_mail_valid($_POST['email']);

         //checking empty fields

         if ($msg !=null ){
             echo $msg;
             //link to previous page.

             echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
         }

         elseif (!$check_age){
             echo 'Please provide proper age.';
         }elseif (!$check_mail){
             echo 'Please provide proper mail.';
         }

         else{
             //if all field are not empty
             //insert the database

             $result = $crud->execute("INSERT INTO  users(name,age,email)VALUES ('$name','$age','$email')");

             //display for success

             echo "<font color='green'>Data successfully .</font>";
             echo "<br/><a href='index.php'>View Result</a>";
         }

     }


    ?>
    </body>
</hmtl>