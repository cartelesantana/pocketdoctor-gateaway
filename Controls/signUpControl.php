<?php
$servername = "localhost";
$DbUser = "root";
$DbPwd = "";
$dbname = "oicData";
$username=$_POST['Username'];
$password=$_POST['password'];
//Coding For Signup

if(isset($_POST['signUp'])) {
    try {
        $conn = new mysqli($servername, $DbUser, $DbPwd, $dbname);
        $userName = $_POST['Username'];
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $pwdConf = $_POST['ConfirmPwd'];
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{
            $query = "select * from users where username=  '$username'";
            $user = $conn->query($query);
            if ($user) {
                if (mysqli_num_rows($user) > 0) {
                    echo "<script>
                alert('user name already available. Please try with diffrent user name.');
                window.location.replace('../Forms/signup.php');
                </script>";
                } else {

                    if ($pwd == $pwdConf) {
                        $passID=null;
                        $securePwd = password_hash($pwd, PASSWORD_BCRYPT);
                        $sql = "INSERT into users(id,username,email,pwd)VALUES(?,?,?,?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param('isss', $passID, $userName, $email, $securePwd);
                        $stmt->execute();
                        $stmt->close();
                        echo "<script>alert('User registration successful, go to log In');
                         window.location.replace('../Forms/login.php');
                        </script>";
                    } else {
                        echo "<script>alert('passwords did not match');
                    window.location.replace('../Forms/signup.php');
                    </script>";
                    }
                }
            }
        }

    }catch (Exception $e){
        echo $e->getMessage();
    }
    } else{
    echo "invalid SignUp";
}

?>