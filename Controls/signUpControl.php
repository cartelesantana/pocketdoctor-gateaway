<?php
$servername = "localhost";
$DbUser = "root";
$DbPwd = "";
$dbname = "oicData";
$username=$_POST['Username'];
$password=$_POST['password'];
//Coding For Signup
if(isset($_POST['signup']))
{
    $conn = new mysqli($servername, $DbUser, $DbPwd, $dbname);
//Getting Psot Values
    $userName=$_POST['Username'];
    $email=$_POST['email'];
    $pwd=$_POST['password'];
    $pwdConf=$_POST['ConfirmPwd'];
//Checking email id exist for not
    $result ="SELECT count(*) FROM users WHERE username='$userName'";
    $stmt = $conn->prepare($result);
    $stmt->bind_param('s',$userName);$stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
//if email already exist
    if($count>0)
    {
        echo "<script>
                alert('user name already available. Please try with diffrent user name.');
                window.location.replace('../Forms/signup.php');
                </script>";
    }
// If email not exist
    else {
        if($pwd==$pwdConf){
            $securePwd=password_hash()
            $sql="INSERT into users(id,username,email,Password)VALUES(?,?,?,?)";
            $stmti = $conn->prepare($sql);
            $stmti->bind_param('ssis',$userName,$email,$mobile,$pass);
            $stmti->execute();
            $stmti->close();
            echo "<script>alert('User registration successful');</script>";
        }else{
            echo "<script>alert('passwords did not match');
                    window.location.replace('../Forms/signup.php');
                    </script>";
        }
    }
}
?>