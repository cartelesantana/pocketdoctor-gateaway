<?php 

if(isset($_POST['AddBlog'])){
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
                $blgtype=$_POST['BlogType'];
            $blglink = $_POST['BlogLink'];
            $blgauthor = $_POST['BlogAuthor'];

            $target_dir = "BlogImages/";
            $target_file = '../../'.$target_dir . basename($_FILES["BlogPicture"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if ($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg") {
                if (move_uploaded_file($_FILES["BlogPicture"]["tmp_name"], $target_file)) {
                    $files = basename($_FILES["BlogPicture"]["name"]);
                } else {
                    echo "Error Uploading File";
                    exit;
                }
            } else {
                echo "File Not Supported";
                exit;
            }
            $blogId = uniqid();
            $location = $target_dir. $files;
            $sqli = "INSERT INTO blog (id, subject,link,author,picture) VALUES (?,?,?,?,?)";
            $stmt = $conn->prepare($sqli);
            $stmt->bind_param('sssss', $blogId, $blgtype, $blglink, $blgauthor, $location);
            $stmt->execute();
            $stmt->close();
                if ($stmt) {
                header("location: ../index.php?id");
                };
                
            }
        }catch(Exception $e){
        }
}else{
    echo "Error: Ivalid Route";
}