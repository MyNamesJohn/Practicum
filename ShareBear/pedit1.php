<?php
$con = mysqli_connect("localhost:3308","root","","bear");
if (!$con)
{
die("Failed to connect to the database server.");
}
$pass=$_POST["pass"];
$pass1=$_POST["pass1"];
$sql = mysqli_query($con,"Select * from bear where password='$pass'");
$num = mysqli_num_rows($sql);

if ($pass == $pass1){
		?>
		<script>
		alert('That is your current password.');
		window.location.href='index.php';
		</script>
		<?php	
}
else{
$insert = mysqli_query($con, "update bear set password='$pass1' where password='$pass'")
		?>
		<script>
		alert('Successfully changed password.');
		window.location.href='index.php';
		</script>
		<?php		
}
?>