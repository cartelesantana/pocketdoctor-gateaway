<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Ocean Innovation Center</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />
  <?php
  include('basicStructures/links.php');
  ?>

</head>

<body>

</body>

<!-- ======= Header ======= -->
<!-- ======= top bar ======= -->
<?php include('basicStructures/head.php'); ?>
<!-- End Top Bar -->
<!--header starts here-->
<header id="header" class="header d-flex align-items-center">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <a href="index.php" class="logo d-flex align-items-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1>
        <span><img src="assets/img/logo.PNG" alt="Logo" class="logoIMG" /></span>
      </h1>
    </a>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a href="index.php#about"><span>About</span>
            <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
            <li>
              <a href="secondary pages/about-vision.php">Our Vision</a>
            </li>
            <li>
              <a href="secondary pages/about-mission.php">Our Mission</a>
            </li>
            <li><a href="team.php">Our Team</a></li>
          </ul>
        </li>

        <li><a href="index.php#services">Activities</a></li>
        <li><a href="forum.php">Forum</a></li>
        <li><a href="index.php#contact">Contact</a></li>
        <li><a href="Forms/adminLogin.php">Admin</a></li>
      </ul>
    </nav>
    <!-- .navbar -->

    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
  </div>
</header>
<!--header ends here-->


<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">

  <nav>
    <div class="container">
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Forum</li>
      </ol>
    </div>
  </nav>
</div><!-- End Breadcrumbs -->



<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row g-5">

      <div class="col-lg-12">

        <article class="blog-details">

          <div class="post-img">
            <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
          </div>

          <h2 class="title">Forum Details</h2>
          <div class="content">
            <p>
              Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et
              laboriosam eius aut nostrum quidem aliquid dicta.
              Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos
              aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.
            </p>

            <p>
              Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel
              aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.
            </p>

            <!-- <blockquote>
              <p>
                Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam
                doloribus minus autem quos.
              </p>
            </blockquote> -->

            <p>
              Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas
              mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate
              ex rerum assumenda dolores nihil quaerat.
              Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum.
              Omnis dolorum exercitationem harum qui qui blanditiis neque.
              Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam
              quod et tempora deleniti error rerum nihil tempora.
            </p>


          </div><!-- End post content -->

          

        <div class="post-author d-flex align-items-center">
          <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="">
          <div>
            <h4>Host: Jacques BONJAWO</h4>
            <div class="social-links">
              <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
              <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
              <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
            </div>
            <p>
              Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat
              voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
            </p>
          </div>
        </div><!-- End post author -->

        <div class="comments">
          <!--reply form starts here-->

          <div class="reply-form" >

            <h4 style="color:black;">Register to the Forum</h4>

            <form action="Controls/ForumRegisterControl.php" method="post">
              <div class="row ">
                <div class="col-md-6 form-group">
                  <input name="firstname" type="text" class="form-control" placeholder="fisrtName*" required>
                </div>
                <div class="col-md-6 form-group">
                  <input name="secondname" type="text" class="form-control" placeholder="SecondName*" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input name="whatsapp" type="number" class="form-control" placeholder="first number(whatsapp)*" required>
                </div>
                <div class="col-md-6 form-group">
                  <input name="phone" type="number" class="form-control" placeholder="second number">
                </div>
                <div class="row col-lg-12">

                  <div class="col-md-6 form-group">
                    <input name="email" type="email" class="form-control" placeholder="email*" required>
                  </div>
                  <div class="col-md-6 form-group">
                    <input name="twitter" type="text" class="form-control" placeholder="twitter account*" Required>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-6 form-group">
                    <input name="facebook" type="text" class="form-control" placeholder="facebook account">
                  </div>
                  <div class="col-md-6 form-group">
                    <input name="linkedin" type="text" class="form-control" placeholder="linkedIn account">
                  </div>
                </div>
                <div class="row">
                <div class="col form-group">
                <label for="howDid">how did you know about our Forum??</label>
                    <select name="howDid" style="border-radius:10px;outline: none; border:none; font-weight:800;background: #061b63;color:white;font-size: 20px">
                          <option  value="twitter">Twitter</option>
                          <option value="instagram">Instagram</option>
                          <option value="facebook">Facebook</option>
                          <option value="website">Our Website</option>
                    </select>
              </div>
                </div>
                <button type="submit" name="ForumReg"class="btn btn-primary">REGISTER!</button>

            </form>

          </div>

        </div><!-- End blog comments -->

      </div>


    </div>

  </div>
</section><!-- End Blog Details Section -->


<!--footer starts her -->
<?php
include('basicStructures/footer.php');
?>
<!-- End Footer -->
<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>

</html>