<?php
session_start();
if (isset($_SESSION['bear']))
{
    ?>
    <script>
    window.location.href='home.php';
    </script>
    <?php
}
?>
<!DOCTYPE html>
<head>
<title>ShareBear || Login</title>
</head>
<body>
<form action="login.php" method="post">
<input type="text" name="username" placeholder="Username" autocomplete="off" required/>
<input type="password" name="password" placeholder="Password" autocomplete="off" required/>
<input type="submit" value="Login"/>
</form>
<a href="SBcreate.html">Don't have a bear yet? Click here!</a>
<a href="resetps.php">Forgot your password?</a>
</body>
</html>
