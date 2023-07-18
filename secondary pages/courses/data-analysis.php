<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OIC / Data-Analysis</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/logo.PNG" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../../assets/css/main.css" rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->
  <?php include ('../../basicStructures/head.php');?>
    <!-- End Top Bar -->
<!--header starts-->
<header id="header" class="header d-flex align-items-center">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
          <h1>
            <span
              ><img src="../../assets/img/logo.PNG" alt="Logo" class="logoIMG"
            /></span>
          </h1>
        </a>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a href="../../index.php">Home</a></li>
            <li class="dropdown">
              <a href="../../#about"
                ><span>About</span>
                <i class="bi bi-chevron-down dropdown-indicator"></i
              ></a>
              <ul>
                <li>
                  <a href="../../secondary pages/about-vision.php">Our Vision</a>
                </li>
                <li>
                  <a href="../../secondary pages/about-mission.php">Our Mission</a>
                </li>
                <li><a href="../../team.php">Our Team</a></li>
              </ul>
            </li>

            <li><a href="../../#services">Our Courses</a></li>
            <li><a href="../../forum.php">Forum</a></li>
            <li><a href="../../#contact">Contact</a></li>
            <li><a href="../../Forms/adminLogin.php">Admin</a></li>
          </ul>
        </nav>
        <!-- .navbar -->

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      </div>
    </header>
    
    <!-- End Header -->
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <!--
      <nav>
        <div class="container">
          <ol>
            <li><a href="../../index.php">Home</a></li>
            <li>Data Analysis</li>
          </ol>
        </div>
      </nav>
      -->
      <div class="page-header d-flex align-items-center">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
                <h2>Data Analysis Course Pricing</h2>
                <p style="font-weight: 800;"> 
                    <i class="bi bi-bell-fill"></i>
                    to register for this course, go to OIC headquaters based at kribi where you wil recieve your formation 
                </p>    
            </div>
            
          </div>
        </div>
      </div>
      
    </div><!-- End Breadcrumbs -->

      <section class="sample-page">
          <div class="container" data-aos="fade-up">
              <div class="row gy-4">
                  <div class="col-xl-4 ">
                      <div class="col-lg-4">
                          <div class="pricing-item">
                              <h2>DESCRIPTION <i class="bi bi-arrow-down-circle-fill"></i></h2>
                              <h4>
                                  This course will help you to differentiate between the roles of Data Analysts,
                                  Data Scientists, and Data Engineers. You will familiarize yourself with the data ecosystem, alongside Databases,
                                  Data Warehouses, Data Marts, Data Lakes and Data Pipelines
                              </h4>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-4 col-md-6">
                      <div class="pricing-item">
                          <h2>DURATION <i class="bi bi-calendar3-week-fill"></i></h2>

                          <h4>The formation goes from 1 to 9 months</h4><br>
                          <h4>and it is seperated in three levels</h4>
                          <h4><small>-1 to 3 months: biginner</small></h4>
                          <h4><small>-1 to 6 months: intermediary</small></h4>
                          <h4><small>-1 to 9 months: advanced</small></h4>
                      </div>
                  </div>
                  <div class="col-xl-4 col-md-6">
                      <div class="pricing-item">
                          <h2>PRICING  <i class="bi bi-cash-coin"></i></h2>

                          <h4>The registration for this formation is 50.000Fcfa</h4>
                          <h4>And the whole formation is 300.000Fcfa</h4>
                          <h4>NB: <small>it can be based on the trainning plan you choose</small></h4>
                      </div>
                  </div>
              </div>
          </div>

          </div>
      </section>
   
  </main><!-- End #main -->
  <!--footer starts her -->
  <?php 
      include ('../../basicStructures/footer.php');
    ?>
    <!-- End Footer -->
    <a
      href="#"
      class="scroll-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>
    <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/aos/aos.js"></script>
  <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>