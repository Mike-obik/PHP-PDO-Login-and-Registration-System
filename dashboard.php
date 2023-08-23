<!DOCTYPE html>
<?php
	require 'connect.php';
	session_start();
	
	if(!ISSET($_SESSION['user'])){
		header('location:login.php');
	}
?>
<html lang="en">
	<head>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
	
<style>
			body{
				background-color: #e2e2e2;
				color:#000;
				font-weight: bold;
			}
		</style>
	
	<div class="container mt-5 bg-dark bg-opacity-75 p-5 w-50 p-3">
		<h1 class="text-dark fw-bolder">Dashboard</h1>
			
			<?php
				$id = $_SESSION['user'];
				$sql = $connect->prepare("SELECT * FROM `users` WHERE `users_id`='$id'");
				$sql->execute();
				$fetch = $sql->fetch();
			?>
			<h2 class="text-left">Welcome <?php echo $fetch['firstname']." ". $fetch['lastname']?></h2>
			<a href = "logout.php">Logout</a>
			<h6 class="text-left pt-3">Designed and Developed by Mike Obi</h6>
	</div>
	
</body>
</html>