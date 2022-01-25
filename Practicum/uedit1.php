<!DOCTYPE html>
<html>
<head>
<style>
body{
	background-color:#072f07;
	color:yellow;
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
echo "<div class='main bg-main'>";
echo "<h1>Edit User</h1>";
//This is the start of the program
$user1=$_POST['user1'];
$sql1=mysqli_query ($connect,"select * from users where username='$user1'");
while ($row1=mysqli_fetch_array($sql1))
{
    $b = $row1['password'];
    $c = $row1['fname'];
    $d = $row1['gname'];
    $e = $row1['mname'];
	$f = $row1['gender'];
    $g = $row1['admin_type'];

    }
//This is the end of the program
echo "</div>";	
?>
<form action='uedit2.php' method='post'>
    <input type='text' name='user1' value='<?php echo $user1; ?>' readonly/>
    <br>
    <input type='text' name='pass' value='<?php echo $b; ?>'/>
    <br>
    <input type='text' name='fn' value='<?php echo $c; ?>'/>
    <br>
    <input type='text' name='gn' value='<?php echo $d; ?>'/>
    <br>
    <input type='text' name='mn' value='<?php echo $e; ?>'/>
    <br>
	<input type='text' name='gen' value='<?php echo $f; ?>'/>
    <br>
	<input type='text' name='adm' value='<?php echo $g; ?>'/>
    <br>
    <input type='submit' name='Save'/>
	</form>
</body>
</html>


