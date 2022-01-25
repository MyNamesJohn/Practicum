<!DOCTYPE html>
<html>
<head>
<style>
body{
	background-color:#072f07;
}
</style>
<?php
session_start();
$user=$_SESSION['username'];
include "connect.php";

$sql=mysqli_query($connect, "select * from Users where username='$user'");
$num=mysqli_num_rows($sql);
if ($num<1)
{
	?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
}
else
{
	while($row=mysqli_fetch_array($sql))
	{
		$fname=$row['fname'];
		$gname=$row['gname'];
		$mname=$row['mname'];
		$gender=$row['gender'];
		$type=$row['admin_type'];
		if ($type == 1)
		{
			$mytype='Administrator';
		}
		else if ($type == 2)
		{
			$mytype='Manager';
		}
		else if ($type == 3)
		{
			$mytype='Cashier';
		}
		else
		{
			$mytype='Undefined';
		}
	}
}
	?>
	<title>Home || <?php echo $gname." ".$fname; ?></title>
	<link rel='stylesheet' type='text/css' href='mystyle.css'/>
	</head>
	<body>
	<?php
	echo "<div class='container bg-main font-large'>";
	echo "<h3>".$gname." ".$mname." ".$fname."</h3>";
	echo "<p>".$mytype."</p>";
	echo "</div>";
	echo "<div class='container bg-second'>";

	if ($type == 1)
	{
		echo "<a href='home.php'>Home</a> ";
		echo "<a href='usearch.php'>Search User</a> ";
		echo "<a href='udelete.php'>Delete User</a> ";
		echo "<a href='unew.php'>Add User</a> ";
		echo "<a href='uedit.php'>Edit User</a> ";
		echo "<a href='active.php'>Active</a> ";
		echo "<a href='deleted.php'>Deleted</a> ";
		echo "<a href='psearch.php'>Search Product</a> ";
		echo "<a href='pdelete.php'>Delete Product</a> ";
		echo "<a href='precall.php'>Recall Product</a> ";
		echo "<a href='pnew.php'>New Product</a> ";
		echo "<a href='pedit.php'>Edit Product</a> ";
		echo "<a href='sales.php'>Sales</a> ";
		echo "<a href='logout.php'>Log Out</a>";
	}
	elseif ($type == 2)
	{
		echo "<a href='home.php'>Home</a> ";
		echo "<a href='active.php'>Active</a> ";
		echo "<a href='deleted.php'>Deleted</a> ";
		echo "<a href='psearch.php'>Search Product</a> ";
		echo "<a href='pdelete.php'>Delete Product</a> ";
		echo "<a href='precall.php'>Recall Product</a> ";
		echo "<a href='pnew.php'>New Product</a> ";
		echo "<a href='pedit.php'>Edit Product</a> ";
		echo "<a href='sales.php'>Sales</a> ";
		echo "<a href='logout.php'>Log Out</a>";
	}
	elseif ($type == 3)
	{
		echo "<a href='home.php'>Home</a> ";
		echo "<a href='sales.php'>Sales</a> ";
		echo "<a href='logout.php'>Log Out</a>";
	}
	else 
	{
		echo " - Undefined";
	}
echo "</div>";
echo "<h1 style='color:yellow;'>Home Page</h1>";
	
?>
</body>
</html>