<?php
require '../PHPMailer/PHPMailerAutoload.php';
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
                /*
                $mail=new PHPMailer();
                $mail->IsSMTP();
                $mail->CharSet = 'UTF-8';
                $mail->Host       = "mail.example.com"; // SMTP server example
                $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                $mail->SMTPAuth   = true;                  // enable SMTP authentication
                $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
                $mail->Username   = "username"; 	// SMTP account username example
                $mail->Password   = "password";        // SMTP account password example
                $mail->setFrom($_POST['email']);
                $mail->addAddress('youremailaccount');
                $mail->Subject='Mail From Ocean Innovation Center';
                $mailBody="you have successfully registered for the Forum, we will conctact you for more information";
                $mail->Body = $mailBody;
                $mail->isHTML(true);
                if($mail->send()){
                    header("location:../forum.php?message=success");
                }else{*/
                header("location:../forum.php?message=error");
                //}

            };

        }
    }catch(Exception $e){

    }
}else{
    echo "Error: Ivalid Route";
}

