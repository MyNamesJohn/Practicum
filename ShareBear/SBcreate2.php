<!DOCTYPE html>
<html>
<head>
</head>
<?php
include "connect.php";
$qid = $_POST['qid'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$fname = $_POST['fname'];
$gname = $_POST['gname'];
$email = $_POST['email'];

$insert = mysqli_query($connect,"insert into bear(user, fname, gname, email, password, qid) 
values('$user', '$fname', '$gname', '$email', '$pass', '$qid')");

if (!$sql) 
	{
		?>
		<script>
		alert('Account Creation Failed.');
		window.location.href='SBcreate.html';
		</script>
		<?php
	}
	
else
	{
		?>
		<script>
		alert('Account Creation Successful.');
		window.location.href='SBcreate.html';
		</script>
		<?php
	}
	?>

</body>
</html>
