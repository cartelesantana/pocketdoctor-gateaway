<?php
$servername = "localhost";
$DbUser = "root";
$DbPwd = "";
$dbname = "oicData";
$username = $_GET['name'];
try {
$conn = new mysqli($servername, $DbUser, $DbPwd, $dbname);
$sql2 = "select * from users where username= '$username' ";
$stm2 = $conn->query($sql2);
if($stm2){
if(mysqli_num_rows($stm2) > 0) {
    $newResult = $stm2->fetch_assoc();
    if(!empty($newResult)){
        header("location:../index.php?id=$newResult[id]");
    }
}
}else{
    echo "bad request";
}
}catch (Exception $e){}