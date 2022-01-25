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
	$sql1=mysqli_query($connect, "select * from customer where cus_num='$cusnum'");
	while ($row=mysqli_fetch_array($sql1))
	{
			$cusnum=$row['cus_num'];
			$vdate=$row['v_date'];
			
	}
	$sql2=mysqli_query($connect, "select * from Sales where cus_num='$cusnum'");
	
	echo "Customer Number: ".$cusnum."<br>";
	echo "Date/Time: ".$vdate."<br><br><br>";
	echo "<table border='1'>";
	echo "<tr>";
	echo "<th>No.</th>";
	echo "<th>Barcode</th>";
	
	echo "<th>Item</th>";
	echo "<th>Quantity</th>";
	echo "<th>Subtotal</th>";
	echo "</tr>";
	$no=0;
	$total=0;
	while ($item=mysqli_fetch_array($sql2))
	{
		$no=$no+1;
		$barcode=$item['barcode'];
		$qty=$item['qty'];
		$sql3=mysqli_query($connect, "select item_name, price from myproducts where barcode='$barcode'");
		while ($item1=mysqli_fetch_array($sql3))
		{
			$item_name=$item1['item_name'];
			$price=$item1['price'];
			
		}
		$sub=$qty*$price;
		$total=$total+$sub;
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$barcode."</td>";
		echo "<td>".$item_name."</td>";
		echo "<td>".$qty." @ ".$price." QR </td>";
		echo "<td>".$sub."</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "Total: ".$total;
	
?>
<br>
<br>
<hr>
<form action='buy.php' method='post'>
<input type='text' name='quantity' placeholder='Quantity' required/><br>
<input type='text' name='barcode' placeholder='Barcode' required/><br>
<input type='submit' value='Add to Cart'/>
</form>
<br>
<hr>
<form action='return.php' method='post'>
<input type='text' name='quantity' placeholder='Quantity' required/><br>
<input type='text' name='barcode' placeholder='Barcode' required/><br>
<input type='submit' value='Remove from Cart'/>
</form>
</body>
</html>