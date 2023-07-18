<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from bootstrapdash.com/demo/skydash-free/template/pages/tables/basic-table.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Jul 2023 07:51:19 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>O I C - Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/logo.PNG" />
</head>

<body>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="../../images/logo.PNG" class="mr-2" alt="logo"/></a>
        </div>
        
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_settings-panel.html -->


        <!-- partial -->
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="../../index.php?txt=C@B@A@">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Registered Members For the Forum</h4>
                                <div class="table-responsive pt-3">
                                    <table class="table table-bordered" style="text-align: center;">
                                        <thead>
                                        <tr>
                                            <th>
                                                id
                                            </th>
                                            <th>
                                                First name
                                            </th>
                                            <th>
                                                Second Name
                                            </th>
                                            <th>
                                                Email
                                            </th>
                                            <th>
                                                whatsapp number
                                            </th>
                                            <th>
                                                second number
                                            </th>
                                            <th>
                                                Twitter account 
                                            </th>
                                            <th>
                                                facebook account 
                                            </th>
                                            <th>
                                                LinkedIn account 
                                            </th>
                                            <th>
                                                how did?? 
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $servername = "localhost";
                                        $DbUser = "root";
                                        $DbPwd = "";
                                        $dbname = "oicData";
                                        try {
                                            $conn = new mysqli($servername, $DbUser, $DbPwd, $dbname);
                                            $ForumQuery="select * from forum";
                                            $requestForum=$conn->query($ForumQuery);
                                            if(mysqli_num_rows($requestForum)>0){
                                                $i=mysqli_num_rows($requestForum);

                                                while ($ForumData=$requestForum->fetch_assoc()){
                                                    echo "
                                        <tr class='table-info'>
                                            <td>$ForumData[userForumId]</td>
                                            <td>$ForumData[firstName]</td>
                                            <td>$ForumData[secName]</td>
                                            <td>$ForumData[email]</td>
                                            <td>$ForumData[whatsapp]</td>
                                            <td>$ForumData[phoneNumber]</td>
                                            <td>$ForumData[twitter]</td>
                                            <td>$ForumData[facebook]</td>
                                            <td>$ForumData[linkedIn]</td>
                                            <td>$ForumData[how]</td>

                                        </tr>
                                    ";
                                                }
                                }
                                $conn->close();
                                        }catch (Exception $e){
                                            echo $e->getMessage();
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Member Of OIC</h4>
                                <div class="table-responsive pt-3">
                                    <table class="table table-bordered" style="text-align: center;">
                                        <thead>
                                        <tr>
                                            <th>
                                                id
                                            </th>
                                            <th>
                                                profile
                                            </th>
                                            <th>
                                                name
                                            </th>
                                            <th>
                                                mail
                                            </th>
                                            <th>
                                                role
                                            </th>
                                            <th>
                                                facebook
                                            </th>
                                            <th>
                                                twitter
                                            </th>
                                            <th>
                                                linkedIn
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $servername = "localhost";
                                        $DbUser = "root";
                                        $DbPwd = "";
                                        $dbname = "oicData";
                                        try {
                                            $conn = new mysqli($servername, $DbUser, $DbPwd, $dbname);
                                            $MembersQuery="select * from members";
                                            $requestMembers=$conn->query($MembersQuery);
                                            if(mysqli_num_rows($requestMembers)>0){
                                                $i=mysqli_num_rows($requestMembers);
                                                while ($MemberData=$requestMembers->fetch_assoc()){
                                                    echo "
                                        <tr class='table-info'>
                                            <td>$MemberData[userId]</td>
                                            <td><img src='../../../$MemberData[useProfile]' style='height:40px;weight:60px;border-radius:100%;'/></td>
                                            <td>$MemberData[userName]</td>
                                            <td>$MemberData[userMail]</td>
                                            <td>$MemberData[role]</td>
                                            <td>$MemberData[fblink]</td>
                                            <td>$MemberData[twtlink]</td>
                                            <td>$MemberData[Lkdlink]</td>

                                        </tr>
                                    ";
                                                }
                                }
                                        }catch (Exception $e){
                                            echo $e->getMessage();
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Latest Registered Users</h4>
                                <div class="table-responsive pt-3">
                                    <table class="table table-bordered" style="text-align: center;">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>user name</th>
                                            <th>email</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $servername = "localhost";
                                        $DbUser = "root";
                                        $DbPwd = "";
                                        $dbname = "oicData";
                                        try {
                                            $conn = new mysqli($servername, $DbUser, $DbPwd, $dbname);
                                            $UserQuery="select * from users order by id Desc Limit 10";
                                            $requestUser=$conn->query($UserQuery);
                                            if(mysqli_num_rows($requestUser)>0){
                                                ;
                                                while ($UserData=$requestUser->fetch_assoc()){
                                                    echo "
                                        <tr class='table-info'>
                                            <td>$UserData[id]</td>
                                            <td>$UserData[username]</td>
                                            <td>$UserData[email]</td>
                                        </tr>
                                    ";
                                                }
                                }
                                        }catch (Exception $e){
                                            echo $e->getMessage();
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">View Latest Messages</h4>
                                <div class="table-responsive pt-3">
                                    <table class="table table-bordered" style="text-align: center;">
                                        <thead>
                                        <tr>
                                            <th>sender name</th>
                                            <th>Sender Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $servername = "localhost";
                                        $DbUser = "root";
                                        $DbPwd = "";
                                        $dbname = "oicData";
                                        try {
                                            $conn = new mysqli($servername, $DbUser, $DbPwd, $dbname);
                                            $UserQuery="select * from reviews order by senderName desc Limit 10";
                                            $requestUser=$conn->query($UserQuery);
                                            if(mysqli_num_rows($requestUser)>0){

                                                while ($UserData=$requestUser->fetch_assoc()){
                                                    echo "
                                        <tr class='table-info'>
                                            <td>$UserData[senderName]</td>
                                            <td>$UserData[senderMail]</td>
                                            <td>$UserData[subject]</td>
                                            <td>$UserData[text]</td>
                                        </tr>
                                    ";
                                                }
                                            }
                                        }catch (Exception $e){
                                            echo $e->getMessage();
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 Ocean Innovation Center. All rights reserved.</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../js/off-canvas.js"></script>
<script src="../../js/hoverable-collapse.js"></script>
<script src="../../js/template.js"></script>
<script src="../../js/settings.js"></script>
<script src="../../js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- End custom js for this page-->
</body>


<!-- Mirrored from bootstrapdash.com/demo/skydash-free/template/pages/tables/basic-table.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Jul 2023 07:51:21 GMT -->
</html>
