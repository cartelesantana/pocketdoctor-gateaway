<?php


           $servername = "localhost";
           $DbUser = "root";
           $DbPwd = "";
           $dbname = "oicData";
           $username=$_POST['Username'];
           $pass=$_POST['password'];
           //connect to database using Mysqli method
           try {
               $conn = new mysqli($servername, $DbUser, $DbPwd, $dbname);

               if ($conn->connect_error) {
                   die("Connection failed: " . $conn->connect_error);
               }else{
                   session_start();

                   $query="select * from users where username=  '$username'";
                   $user=$conn->query($query);
                   if($user){
                       if(mysqli_num_rows($user) > 0){
                           $result = $user -> fetch_assoc();
                           if(password_verify($pass,$result['pwd'])){
                               $UserId=$result['id'];
                               header("location:../index.php?id=$UserId");
                           }else{

                               echo "
                                <script> 
                                    alert('password is wrong');
                                    window.location.replace('../Forms/login.php');
                                </script>
                            ";

                           }
                       }else echo "
                                <script> 
                                    alert('User does not exist');
                                    window.location.replace('../Forms/login.php');
                                </script>
                    ";
                   }else{
                       echo "we had a problem";
                   }
               }
               $conn->close();
           }catch (Exception $e){
               echo $e->getTrace();
           }






