<?php

session_start();

if(isset($_POST['signUp'])){
    
    $name=$_POST['Username'];
    $email=$_POST['email'];
    $pwd=$_POST['password'];
    $pwdConf=$_POST['ConfirmPwd'];

    

    if($pwd === $pwdConf){
         try {
            $db = new mysqli("host", "user", "password", "database");

            
         } catch (Exception $e) {
            echo $e->getMessage();
         }
    }else{
        echo"
        <script>
        alert('please verify your Passwords');
        </script>
        ";
    }
    
}else{
    session_abort();
    exit();
}





?>