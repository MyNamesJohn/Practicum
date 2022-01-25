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
	$cusnum=$_SESSION['cusnum'];
	$qty=$_POST['quantity'];
	$qty1=$qty*-1;
	$barcode=$_POST['barcode'];
	$sql=mysqli_query($connect, "select * from myproducts where barcode='$barcode'");
	$num=mysqli_num_rows($sql);
	if ($num>0)
	{
	$sql1=mysqli_query($connect, "insert into sales(cus_num, barcode, qty) values('$cusnum', '$barcode', '$qty1')");
	}
	?>

<script>
	window.location.href='actualsales.php';
	</script>
</body>
</html>