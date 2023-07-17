<?php

if(isset($_POST['ForumReg'])){
    $servername = "localhost";
    $DbUser = "root";
    $DbPwd = "";
    $dbname = "oicData";



    try{
        $conn = new mysqli($servername, $DbUser, $DbPwd, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{
            session_start();
            $firstname=$_POST['firstname'];
            $secname=$_POST['secondname'];
            $whatsapp=$_POST['whatsapp'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $twitter = $_POST['twitter'];
            $facebook = $_POST['facebook'];
            $linkedin = $_POST['linkedin'];
            $howdid=$_POST['howDid'];
            $forumid=uniqid();
            $sqli = "INSERT INTO forum (userForumId, firstName,secName,email,whatsapp,phoneNumber,twitter,facebook,linkedIn,how) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sqli);
            $stmt->bind_param('ssssssssss', $forumid, $firstname, $secname, $email,$whatsapp,$phone,$twitter,$facebook,$linkedin,$howdid);
            $stmt->execute();
            $stmt->close();
            if ($stmt) {
                header("location:../forum.php?message=success");
            };

        }
    }catch(Exception $e){

    }
}else{
    echo "Error: Ivalid Route";
}

