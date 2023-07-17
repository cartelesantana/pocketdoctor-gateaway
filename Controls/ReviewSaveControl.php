<?php
$servername = "localhost";
$DbUser = "root";
$DbPwd = "";
$dbname = "oicData";

if (!isset($_POST['senMessage'])){
    echo "wrong Route";
}else{
    $senName=$_POST['name'];
    $senMail=$_POST['email'];
    $senSbj=$_POST['subject'];
    $senText=$_POST['message'];

    try {
        $conn = new mysqli($servername, $DbUser, $DbPwd, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{
            $query= "insert into reviews(senderName,senderMail,subject,text) values (?,?,?,?)";
            $stmt=$conn ->prepare($query);
            $stmt->bind_param('ssss',$senName,$senMail,$senSbj,$senText);
            $stmt->execute();
            $stmt->close();
            echo "
            <script> 
                alert('you message was sent !!!!')
                window.location.replace('../index.php')
            </script>
            ";

        }
    }catch (Exception $e){
        echo $e -> getMessage();
    }
}