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
<?php
$sql=mysqli_query($connect, "insert into customer(v_date) values(now())");
if (!$sql)
{
	echo "Failed to insert a new customer";
	echo "<a href='newcus.php'>Try Again</a>";
}
else
{
	$sql1=mysqli_query($connect, "select * from customer order by cus_num desc limit 1");
	while ($row=mysqli_fetch_array($sql1))
	{
			$cusnum=$row['cus_num'];
			$vdate=$row['v_date'];
			
	}
	$_SESSION['cusnum']=$cusnum;
	?>
	<script>
	window.location.href='actualsales.php';
	</script>
	<?php
}
?>
</body>
</html>