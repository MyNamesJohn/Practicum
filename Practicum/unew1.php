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
$user=$_SESSION['user'];
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
echo "<h1>Add User</h1>";
//This is the start of the program
$use=$_POST['user'];
$pass=$_POST['pass'];
$fn=$_POST['fname'];
$gn=$_POST['gname'];
$mn=$_POST['mname'];
$gen=$_POST['gen'];
$admin=$_POST['admin'];

$connect = mysqli_connect("localhost:3308","root","","mercado");
if (!$con)
{
	die("Failed to connect to MySQL Server");
}
$search = mysqli_query($connect, "select * from users where username='$use'");
$num = mysqli_num_rows($search);
if ($num > 0)
{
	$search = mysqli_query($connect,"Select * from user where username='$use'");
	echo "<table border='1'>";
	echo "<tr>";
	echo "<th>Username</th>";
	echo "<th>Password</th>";
	echo "<th>Name</th>";
	echo "<th>Gender</th>";
	echo "<th>Admin Type</th>";
	echo "</tr>";
while ($row=mysqli_fetch_array($search))
{
	echo "<tr>";
$a = $row['username'];
$b = $row['password'];
$c = $row['fname'];
$d = $row['gname'];
$e = $row['mname'];
$f = $row['gender'];
$g = $row['admin_type'];

if ($f == 1)
{
$f1 = "Male";
}
else
{
$f1 = "Female";
}

if ($g == 1)
		{
			$g1='Administrator';
		}
		else if ($g == 2)
		{
			$g1='Manager';
		}
		else if ($g == 3)
		{
			$g1='Cashier';
		}
		else
		{
			$g1='Undefined';
		}

echo "<td>".$a."</td>";
echo "<td>".$b."</td>";
echo "<td>".$c. ", ".$d." ".$e."</td>";
echo "<td>".$f1."</td>";
echo "<td>".$g1."</td>";
echo "</tr>";

}
	echo "</table>";
	echo "<h5> Record exists. </h5>";
}
else
{
	
	$sql = mysqli_query($con,"insert into users(username, password, fname, gname, mname, gender, admin_type) 
	values('$use', '$pass', '$fn', '$gn', '$mn', '$gen', '$admin')");
	echo "New Record Has Been Added to the Database";
	if (!$sql) 
	{
		echo "Failed to add the new record.";
	}
	else
	{
	$search = mysqli_query($con,"Select * from users where username='$user'");
	echo "<table border='1'>";
	echo "<tr>";
	echo "<th>Username</th>";
	echo "<th>Password</th>";
	echo "<th>Name</th>";
	echo "<th>Gender</th>";
	echo "<th>Admin Type</th>";
	echo "</tr>";
	while ($row=mysqli_fetch_array($search))
{
	echo "<tr>";
$a = $row['username'];
$b = $row['password'];
$c = $row['fname'];
$d = $row['gname'];
$e = $row['mname'];
$f = $row['gender'];
$g = $row['admin_type'];

if ($f == 1)
{
$f1 = "Male";
}
else
{
$f1 = "Female";
}

if ($g == 1)
		{
			$g1='Administrator';
		}
		else if ($g == 2)
		{
			$g1='Manager';
		}
		else if ($g == 3)
		{
			$g1='Cashier';
		}
		else
		{
			$g1='Undefined';
		}
		
echo "<td>".$a."</td>";
echo "<td>".$b."</td>";
echo "<td>".$c. ", ".$d." ".$e."</td>";
echo "<td>".$f1."</td>";
echo "<td>".$g1."</td>";
echo "</tr>";

}
	echo "</table>";
		echo "<h5> New record added to the database. </h5>";
	}
}

//This is the end of the program
echo "</div>";	
?>
</body>
</html>