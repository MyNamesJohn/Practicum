<?php
session_start();
$user=$_SESSION['username'];
include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
<title> Sales || <?php echo $user; ?> </title>
</head>
<body>
<a href='newcus.php'>New Customer</a>
</body>
</html>