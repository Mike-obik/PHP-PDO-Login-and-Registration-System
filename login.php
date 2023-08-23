<?php
	session_start();
	
	require_once 'connect.php';
	
	if(ISSET($_POST['login'])){
		if($_POST['username'] != "" || sha1($_POST['password']) != ""){
			$username = $_POST['username'];
			// md5 encrypted
			 $password = sha1($_POST['password']);
			//$password = $_POST['password'];
			$sql = "SELECT * FROM `users` WHERE `username`=? AND `password`=? ";
			$query = $connect->prepare($sql);
			$query->execute(array($username,$password));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['user'] = $fetch['users_id'];
				header("location: dashboard.php");
			} else{
				echo "
				<script>alert('Wrong username or password')</script>
				<script>window.location = 'login.php'</script>
				";
			}
		}else{
			echo "
				<script>alert('All Fields are required!')</script>
				<script>window.location = 'login.php'</script>
			";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>

<style>
			body{
				background-image: linear-gradient(#000428,#004e92);
				color:#fff;
				font-weight: bold;
			}
		</style>
	
	<div class="container mt-5 bg-dark bg-opacity-50 p-5 w-75">
		<h3 class="text-white fw-bolder">PHP PDO Registration</h3>
		
		
			<form action="" method="POST" class="w-50">	
				<h4 class="text-white text-dcoration-underline">Login</h4>
	
			<?php if(isset($_SESSION['message'])): ?>
				<div class="alert alert-<?php echo $_SESSION['message']['alert'] ?> msg"><?php echo $_SESSION['message']['text'] ?></div>
			<script>
				(function() {
					// removing the message 3 seconds after the page load
					setTimeout(function(){
						document.querySelector('.msg').remove();
					},3000)
				})();
			</script>
			<?php 
				endif;
				// clearing the message
				unset($_SESSION['message']);
			?>
			<form action="" method="POST">	
				
				
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" />
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" />
				</div>
				<br />
				<div class="form-group">
					<button class="btn btn-primary form-control" name="login">Login</button>
				</div>
				<p class="fw-bolder">Not Registered? <a href="registration.php">Register</a>
			</form>
			<h6 class="text-left">Designed and Developed by Mike Obi</h6>
			</div>
		
	
</body>
</html>