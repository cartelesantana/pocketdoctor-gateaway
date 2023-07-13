<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>OIC / Team</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/logo.PNG" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="assets/css/main.css" rel="stylesheet" />
  </head>

  <body>
    <!-- ======= Header ======= -->
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
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          <a href=""><i class="bi bi-person-circle"> user name</i></a>
        </div>
      </div>
    </section>

    <main id="main">
      <!-- ======= Breadcrumbs ======= -->
      <div class="breadcrumbs">
        <nav>
          <div class="container">
            <ol>
              <li><a href="index.php">Home</a></li>
              <li>Team</li>
            </ol>
          </div>
        </nav>
          <div class="container position-relative">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-6 text-center">
                <h2>Our Team</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Breadcrumbs -->
      <section class="sample-page">
          <div >
              <div class='row' data-aos='fade-up' data-aos-delay='100'>
                  <?php
                  $servername = "localhost";
                  $DbUser = "root";
                  $DbPwd = "";
                  $dbname = "oicData";
                  try {
                      $conn = new mysqli($servername, $DbUser, $DbPwd, $dbname);
                      if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                      }else{
                          $query="select * from members";
                          $member=$conn->query($query);
                          $result=$member->fetch_assoc();
                          if($result){
                              $i = mysqli_num_rows($member);
                              while ($i>0){
                                  echo "
                        <div class='col-md-2 col-md-2' style='text-align: center'>
                  <img src=$result[useProfile] class='img-fluid' style='width: 90%;height:230px'/>
                    
                <p class='post-category'><b>$result[userName]</b></p>
                <p class='post-category'><b>$result[role]</b></p>
                <p class='post-category'><a href=https://www.google.com/$result[userMail]>$result[userMail]</a></p>
                <p>
                    <a href=https://www.$result[fblink]><i class='bi bi-facebook'></i></a>
                    <a href=https://www.$result[twtlink]><i class='bi bi-twitter'></i></a>
                    <a href=https://www.$result[Lkdlink]><i class='bi bi-linkedin'></i></a>
                </p>
                 
               
                  </div>
                          ";
                                  $i--;
                              }
                          }
                      }
                  }catch (Exception $e){ print $e->getMessage();}
                  ?>

              </div>
          </div>
      </section>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.php" class="logo d-flex align-items-center">
              <span>Ocean Innovation Center</span>
            </a>
            <p>Concieve - Believe - Achieve</p>
            <div class="social-links d-flex mt-4">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Quick links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><a href="#">Incubation and acceleration</a></li>
              <li><a href="#">ICT training</a></li>
              <li><a href="#">Advice and Expertise</a></li>
              <li><a href="#">Co-Working SPACE</a></li>
            </ul>
          </div>

          <div
            class="col-lg-3 col-md-12 footer-contact text-center text-md-start"
          >
            <h4>Contact Us</h4>
            <p>
              Kribi <br />
              derriere la Mairie de <br />
              Kribi 1er <br /><br />
              <strong>Phone:</strong> +237 690 08 91 56<br />
              <strong>Email:</strong> contact@oickribi.com<br />
            </p>
          </div>
        </div>
      </div>

      <div class="container mt-4">
        <div class="copyright">
          &copy; Copyright
          <strong><span>2023 Ocean innovation center (OIC) </span></strong>. All
          Rights Reserved
        </div>
      </div>
    </footer>
    <!-- End Footer -->
    <!-- End Footer -->

    <a
      href="#"
      class="scroll-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
