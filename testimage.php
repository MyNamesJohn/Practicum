<!DOCTYPE html>
<html>
<head>
<link rel='icon' href='bear.png' type='image/icon type'/>
<link rel='stylesheet' href='style.css' type='text/css'/>
<script src="https://kit.fontawesome.com/f8a0d66908.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
include "connect.php";
	$postsearch = mysqli_query($connect,"Select * from bearpost");
		while ($row=mysqli_fetch_array($postsearch)){
		$postid = $row['postid'];
		$buser = $row['buser'];
		$postcat = $row['postcat'];
		$post = $row['post'];
		$pdate = $row['pdate'];
		$image_name = $row['image_name'];	
		$image = $row['image'];
		$buser = $row['buser'];
?>
	
	<div class='FrontPage'>
	<p class='feed'> <?php echo $buser; ?> </p>
	<p class='date'> <?php echo $pdate; ?> </p> 
	<button class='click'> <i class="fa-solid fa-ellipsis-vertical fa-2xs"></i> </button>
	<div class="list">
	<button class="links">Edit Post</button>
	<button class="links">Delete Post</button>
	</div>
	<script type="text/javascript">

            let click = document.querySelector('.click');

            let list = document.querySelector('.list');

            click.addEventListener("click",()=>{

                list.classList.toggle('newlist');

            });

        </script>
	<p class='message'> <?php echo $post; ?> </p>
	<div class='image'>
	<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'"/>'; ?>
	</div>
</div>
<?php
		}
?>
</body>
</html>