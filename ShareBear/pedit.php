<?php
$pass=$_POST["password"];
$con = mysqli_connect("localhost:3308","root","","bear");
if (!$con)
{
die("Failed to connect to the database server.");
}
$sql = mysqli_query($con,"Select * from bear where password='$pass'");
$num = mysqli_num_rows($sql);
if ($num < 1 )
{
		?>
		<script>
		alert('Invalid Password.');
		window.location.href='index.php';
		</script>
		<?php
}
else
{
while ($row=mysqli_fetch_array($sql))
{
echo "<form action='pedit1.php' method='post'>";
echo "Current Password: ";
echo "<input type='text' name='pass' value='$pass' placeholder='$pass' readonly/><br>";
echo "<br>";
echo "New Password: ";
echo "<input type='text' name='pass1' placeholder='New Password'/><br>";
echo "<br>";
echo "<input type='submit' value='Save'/>";
echo "</form>";
}
}
?>