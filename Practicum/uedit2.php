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
$sql1=mysqli_query ($connect,"select * from MyProducts");
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
	$a = $_POST ['user1'];
    $b = $_POST ['pass'];
    $c = $_POST ['fn'];
    $d = $_POST ['gn'];
    $e = $_POST['mn'];
	$f = $_POST ['gen'];
    $g = $_POST['adm'];
	
if (!$connect)
    {
            die("Failed to Connect to the MySQL Server");
    }
$sql = mysqli_query($connect, "update users set password='$b', fname='$c', gname='$d', mname='$e', gender='$f', admin_type='$g' where username='$a'");
    if (!$sql)
    {
        echo "Failed to update new record.";
    }
    else
    {
        echo "Record updates succesfully.";
        $sql1 = mysqli_query($connect, "select * from users where username='$a'");
        echo "<table border='1'>";
		echo "<tr>";
		echo "<th>Username</th>";
		echo "<th>Password</th>";
		echo "<th>Name</th>";
		echo "<th>Gender</th>";
		echo "<th>Admin Type</th>";
		echo "</tr>";
        while ($row=mysqli_fetch_array($sql1))
            {
$a1 = $row['username'];
$b1 = $row['password'];
$c1 = $row['fname'];
$d1 = $row['gname'];
$e1 = $row['mname'];
$f1 = $row['gender'];
$g1 = $row['admin_type'];

if ($f1 == 1)
{
$f2 = "Male";
}
else
{
$f2 = "Female";
}

if ($g1 == 1)
		{
			$g2='Administrator';
		}
		else if ($g1 == 2)
		{
			$g2='Manager';
		}
		else if ($g1 == 3)
		{
			$g2='Cashier';
		}
		else
		{
			$g2='Undefined';
		}

echo "<td>".$a1."</td>";
echo "<td>".$b1."</td>";
echo "<td>".$c1. ", ".$d1." ".$e1."</td>";
echo "<td>".$f2."</td>";
echo "<td>".$g2."</td>";
echo "</tr>";
                }
            echo "</table>";
    }
//This is the end of the program
echo "</div>";	
?>
</body>
</html>