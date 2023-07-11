<?php

class User
{
    private $_username;
    private  $_password;

    public function login($username, $password):void
    {
        $this->_username = mysqli_real_escape_string($username);
        $this->_password = mysqli_real_escape_string($password);
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "oicData";
        //connect to database using Mysqli method
        try {
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }else{
                $stmt = $conn ->prepare("select * from users where username=$username and pwd=$password");

                $stmt->execute();

                $user=$stmt->fetch();

                if(!empty($user)){
                    echo "user has been connected";
                }else{
                    echo " invalid user data";
                }
            }




        }catch (Exception $e){
            echo $e->getTrace();
        }
    }
    public function logout():void{
        session_start();
        session_destroy();
        exit();
    }

}
