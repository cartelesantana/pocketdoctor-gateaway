<?php
session_start();
session_destroy();

header("location:../../Forms/adminLogin.php");