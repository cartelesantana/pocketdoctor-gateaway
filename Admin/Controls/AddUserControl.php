<?php

if(isset($_POST['AddMbr'])){
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
            $mbrName=$_POST['Name'];
            $mbrMail=$_POST['Email'];
            $mbrRole=$_POST['Role'];
            $mbrFb = $_POST['UserFb'];
            $mbrTwt = $_POST['UserTwt'];
            $mbrLkn = $_POST['UserLkn'];
            $target_dir = "MemberProfiles/";
            $target_file = '../../'.$target_dir . basename($_FILES["MbrProfile"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if ($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg") {
                if (move_uploaded_file($_FILES["MbrProfile"]["tmp_name"], $target_file)) {
                    $files = basename($_FILES["MbrProfile"]["name"]);
                } else {
                    echo "Error Uploading File";
                    exit;
                }
            } else {
                echo "File Not Supported";
                exit;
            }
            $MbrId = uniqid();
            $location = $target_dir. $files;
            $sqli = "INSERT INTO members (userId, userName,userMail,role,useProfile,fblink,twtlink,lkdlink) VALUES (?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sqli);
            $stmt->bind_param('ssssssss', $MbrId, $mbrName, $mbrMail, $mbrRole,$location,$mbrFb,$mbrTwt,$mbrLkn);
            $stmt->execute();
            $stmt->close();
            if ($stmt) {
                echo "File has been uploaded";
            };

        }
    }catch(Exception $e){

    }
}else{
    echo "Error: Ivalid Route";
}

