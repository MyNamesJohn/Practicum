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
			
	}
}
?>

		<?php
			
//Post start
		$bear1 = $_SESSION['bear'];
		$buser = mysqli_query($connect, "Select * from bear where buser='$bear1'");
		$text=$_POST['text'];
		$category=$_POST['category'];
		$imagename=$_FILES['myimage']['name'];
		$imagesize=$_FILES['myimage']['size'];
		$tmpname=$_FILES['myimage']['tmp_name'];
		$error=$_FILES['myimage']['error'];
		$validextension=['jpg', 'jpeg', 'png'];
		$imageextension=explode('.', $imagename);
		$imageextension=strtolower(end($imageextension));
	
// Error, Extension, Size checking
	if ($error === 0) {
		if(!in_array($imageextension, $validextension)){
			echo "<script> alert('Invalid Format'); window.location.href='home.php';</script>";
		}
		else if ($imagesize > 15000) {
			echo "<script> alert('Image Size Is Too Large');window.location.href='home.php'; </script>";
		}else {
//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($tmpname));

//Insert the content into bearpost table
$insert = mysqli_query($connect, "insert into bearpost(buser, postcat, post, pdate, image_name, image) values('$bear1', '$category', '$text', now(), '$imagename','$imagetmp')");

echo "Upload successful.";
	?>
	<script>
	window.location.href='home.php';
	</script>
	<?php
	
}
		}
	
		?>

