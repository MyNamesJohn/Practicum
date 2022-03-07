<?php
session_start();
$_SESSION['bear']='12345';
if (!isset($_SESSION['bear']))
{
?>
	<script>
	window.location.href='index.php';
	</script>
<?php
}
require_once ('MysqliDb.php');
$db = new MysqliDb ('localhost:3308', 'root', '', 'bear');
include "connect.php";
$bear = $_SESSION['bear'];
$search = mysqli_query($connect, "Select * from bear where buser='$bear'");
$num = mysqli_num_rows($search);
if ($num < 1)
{
	session_destroy();
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
else
{
	While ($row = mysqli_fetch_array($search))
	{
			$fname = $row['fname'];
			$gname = $row['gname'];
			$user = $row['user'];
			$buser1 = $row['buser'];
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Home || <?php echo $gname . " " . $fname; ?> </title>
<link rel='icon' href='bear.png' type='image/icon type'/>
<link rel='stylesheet' href='style.css' type='text/css'/>
<script src="https://kit.fontawesome.com/f8a0d66908.js" crossorigin="anonymous"></script>
</head>
<body>
<div class='header'>
	<div class='header_right'>
		<?php
			$pfp = mysqli_query($connect, "select * from profilepic where buser='$bear'");
			$number = mysqli_num_rows($pfp);
			if($number < 1)
			{
				echo "<img src='bear.png'/>";
			
			}
			else
			{
				while ($row1 = mysqli_fetch_array($pfp))
				{
						$pic = $row1['pic'];
				}
				echo '<img src="data:image/jpeg;base64,'.base64_encode($pic).'"/>';
			}
			echo "<p>" .$gname . " " . $fname . "</p>";
		
		//POST
		
		
		?>
		
	</div>
	<div class='header_left'>
		<form action='bsearch.php' method='post'>
			<input type='text' name='search' placeholder='Search'/>
		</form>
		<a href='home.php' title='Home' > <i class="fa-solid fa-house"></i> </a>
		<a href='settings.php' title='Settings' > <i class="fa-solid fa-gear"></i> </a>
		<a href='logout.php' title='Logout' > <i class="fa-solid fa-arrow-right-from-bracket"></i> </a>
	</div>
</div>
<div class='categories'>
	<p> Categories </p>
	<a href='General.php' title='General' > General </a> <br>
	<a href='Food.php' title='Food' > Food </a><br>
	<a href='Academics.php' title='Academics' > Academics </a><br>
	<a href='News.php' title='News' > News </a><br>
	<a href='Fashion.php' title='Fashion' > Fashion </a> <br>
	<a href='Entertainment.php' title='Entertainment' > Entertainment </a><br>
	<a href='Sports.php' title='Sports' > Sports </a><br>
	<a href='Events.php' title='Events' > Events </a><br>
</div>

<?php
$posts = $db->get ('bearpost');
include "connect.php";
	$postsearch = mysqli_query($connect,"Select * from bearpost order by postid desc");
		while ($row=mysqli_fetch_array($postsearch)){
		$postid = $row['postid'];
		$buser = $row['buser'];
		$postcat = $row['postcat'];
		$post = $row['post'];
		$pdate = $row['pdate'];
		$image_name = $row['image_name'];	
		$image = $row['image'];
?>
	<div class='FrontPage'>
	<p class='feed'> <?php echo $user; ?> </p>
	<p class='date'> <?php echo $pdate; ?> </p>
	<div class='links'>
	<form method="POST" action="delete.php">
	<input type="submit" data-postid="'<?php $postid ?>'" class="delete" name="delete" value="Delete">
	</form>
	<form method="POST" action="edit.php">
	<input type="submit" data-postid="'<?php $postid ?>'" class="edit" name="edit" value="Edit">
	</form>
	</div>
	<p class='message'> <?php echo $post." ".$postid; ?> </p>
	<div class='image'>
	<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'"/>'; ?>
	</div>
</div>
	
<?php
		
		}
?>
<div class='post'>
	<div class='pfp'>
	<form action='post.php' method='POST' enctype='multipart/form-data'>
			<textarea id='bearpost' name='text' rows='1' cols='50' placeholder='Something on your Mind? Type it here!'></textarea>
			<input type='file' name='myimage' Placeholder='Upload a Picture'>
			<select name="category">
				<option value="general">General</option>
				<option value="food">Food</option>
				<option value="academics">Academics</option>
				<option value="news">News</option>
				<option value="fashion">Fashion</option>
				<option value="entertainment">Entertainment</option>
				<option value="sports">Sports</option>
				<option value="events">Events</option><br>
			</select>
			<input type='submit' name="submit_image" value='Post'>
		</form>
		<?php
			$pfp = mysqli_query($connect, "select * from profilepic where buser='$bear'");
			$number = mysqli_num_rows($pfp);
			if($number < 1)
			{
				echo "<img src='bear.png'/>";
			
			}
			else
			{
				while ($row1 = mysqli_fetch_array($pfp))
				{
						$pic = $row1['pic'];
				}
				echo '<img src="data:image/jpeg;base64,'.base64_encode($pic).'"/>';
			}
		?>

</div>		
</div>
</body>
</html>
