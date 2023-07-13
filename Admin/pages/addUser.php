<!DOCTYPE html>
<html>
<head>
<title>Add Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link rel="shortcut icon" href="../images/logo.PNG" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
<link rel="stylesheet" href="../assets/css/forms.css">
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Register a New Member</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="../Controls/AddUserControl.php" method="post" enctype="multipart/form-data">
					<input class="text" type="text" name="Name" placeholder="Enter the Name" required="">
                    <input class="text" type="email" name="Email" placeholder="Enter emailAdress" required="">
                    <input class="text email" type="text" name="Role" placeholder="what is the members role" required="">
					<input class="file" type="file" name="MbrProfile">
					<input type="text" name="UserFb" placeholder="Facebook profile (optional)">
					<input type="text" name="UserTwt" placeholder="Twitter profile (optional)" >
					<input type="text" name="UserLkn" placeholder="LinkedIn profile (optional)" >
					<div class="wthree-text">
					</div>
					<input type="submit" name="AddMbr"value="ADD">
				</form>
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>
                &copy; Copyright <strong><span>2023 Ocean innovation center (OIC) </span></strong>. All Rights Reserved

            </p>
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>