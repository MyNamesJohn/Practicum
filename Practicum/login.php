<!DOCTYPE html>
<html>
<head>
<title>Practicum || Login</title>
</head>
<body>
<?php
$a = $_POST['username'];
$b = $_POST['password'];
include "connect.php";
$sql=mysqli_query($connect, "select * from Users where username='$a'");
$num=mysqli_num_rows($sql);
if ($num<1)
{
	echo "Username not found.";	
	include "index.php";
}
else
{
	while($row=mysqli_fetch_array($sql))
	{
		$user=$row['username'];
		$pass=$row['password'];
	
	}
	if ($b==$pass)
	{
		session_start();
		$_SESSION['username']=$user;
		?>
		<script>
		window.location.href='home.php';
		</script>
		<?php
	}
	else
	{
		echo "Incorrect password.";
		include "index.php";
	}
}
?>
</body>
</html>