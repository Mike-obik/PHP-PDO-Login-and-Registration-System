<?php
	session_start();
	require_once 'connect.php';
 
	if(ISSET($_POST['register'])){
		if($_POST['firstname'] != "" || $_POST['email'] != "" || $_POST['username'] != "" || sha1($_POST['password']) != ""){
			try{
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$username = $_POST['username'];
				$email = $_POST['email'];
				$password = sha1($_POST['password']);
				$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `users` VALUES ('', '$firstname', '$lastname', '$email', '$username', '$password')";
				$connect->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"You have Registered Successfully.","alert"=>"success");
			$connect = null;
			header('location:login.php');
		}else{
			echo "
				<script>alert('Please All Fields are required!')</script>
				<script>window.location = 'registration.php'</script>
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
				<h4 class="text-white text-dcoration-underline">Register</h4>
				
				<div class="form-group">
					<label>Firstname</label>
					<input type="text" class="form-control" name="firstname" />
				</div>
				<div class="form-group">
					<label>Lastname</label>
					<input type="text" class="form-control" name="lastname" />
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" name="email" />
				</div>
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
					<button class="btn btn-primary form-control" name="register">Register</button>
				</div>
				<p class="fw-bolder">Already Registered? <a href="login.php">Login</a></p>
			</form>
			<h6 class="text-left">Designed and Developed by Mike Obi</h6>
	</div>
</body>
</html>