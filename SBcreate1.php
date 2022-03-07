<!DOCTYPE html>
<html>
<head>
<title>Sharebear: Account Creation</title>
</head>
<?php

$qid = $_POST['QID'];
include "connect.php";
$sql = mysqli_query($connect,"select qid from qidtable where qid='$qid'");
$sql2 = mysqli_query($connect,"select qid from bear where qid='$qid'");
$num = mysqli_num_rows($sql);
$num2 = mysqli_num_rows($sql2);
if ($num < 1)
{
		?>
		<script>
		alert('Invalid QID.');
		window.location.href='SBcreate.html';
		</script>
		<?php
}
elseif ($num2 > 0)
{
		?>
		<script>
		alert('That QID is taken.');
		window.location.href='SBcreate.html';
		</script>
		<?php
}
 
?> 

<body>
<h1>Share Bear: Account Creation</h1>
<form action='SBcreate2.php' method='post' >
<input type='text' name='qid' value='<?php echo $qid; ?>' readonly/>
<br>
<input type='text' name='user' placeholder='Username' required />
<br>
<input type='text' name='pass' placeholder='Password' required />
<br>
<input type='text' name='fname' placeholder='First Name' required />
<br>
<input type='text' name='gname' placeholder='Last Name' required />
<br>
<input type='text' name='email' placeholder='Student Email' required />
<br>
<input type='submit' value='Become a bear'/>
</form>
<br>
<a href = 'SBlogin.php'> Already have a Bear? Click here! </a> 
</body>
</html>