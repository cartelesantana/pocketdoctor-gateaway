<head>
<link href="assets/css/main.css" rel="stylesheet" />
</head>
<section id="topbar" class="topbar d-flex align-items-center">
      <div
        class="container d-flex justify-content-center justify-content-md-between"
      >
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"
            ><a href="mailto:contact@example.com">contact@oickribi.com</a></i
          >
          <i class="bi bi-phone d-flex align-items-center ms-4"
            ><span>(+237) 690 08 91 56</span></i
          >
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
            <a href="https://www.twitter.com/oicpole"  target="_blank"class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="https://www.facebook.com/oicpole"  target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/oipole"  target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://cm.linkedin.com/company/oicpole" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
            <pre>  </pre>
            <i class="bi bi-person-circle">
                  <?php
                    if(isset($_GET['id'])){
                        $servername = "localhost";
                        $DbUser = "root";
                        $DbPwd = "";
                        $dbname = "oicData";
                        try {
                            $conn = new mysqli($servername, $DbUser, $DbPwd, $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }else{
                                $id=$_GET['id'];
                                $query="select username from users where id= '$id'";
                                $userName=$conn->query($query);
                                if ($userName){
                                    if (mysqli_num_rows($userName) >0 ){
                                        $result=$userName->fetch_assoc();
                                        $resultName=$result['username'];
                                        echo $resultName;
                                    }
                                }
                            }
                        }catch (Exception $e){
                            echo "you have an error of type ".$e->getMessage();
                        }
                    }else echo " ";
                  ?>
              </i>
          </a>
        </div>
      </div>
    </section>