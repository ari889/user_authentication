<?php
	require_once 'app/autoload.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Form Validation</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

	<?php

	/*
	* user registration form isset
	*/
	if(isset($_POST['submit'])){

		//get value
		$name = $_POST['name'];
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$cell = $_POST['cell'];
		$pass = $_POST['password'];
		// $photo = $_POST['photo'];

		//form validation
		if(empty($name) || empty($uname) || empty($email) || empty($cell) || empty($pass)){
			$mess = validation('All fields are required', 'Danger');
		}else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
			$mess = validation('Invalid email.', 'warning');
		}else if(dataCheck($connection, 'users', 'email', $email) == false){
			$mess = validation('Email already exists', 'warning');
		}else if(dataCheck($connection, 'users', 'uname', $uname) == false){
			$mess = validation('Username already exists', 'warning');
		}else{

		}
	}



	 ?>
	<div class="custom_signup">
		<a href="index.php" class="btn btn-info">Sign IN</a>
		<h2 class="text-center">Sign Up</h2>
		<div class="message">
		</div>
		<form method="POST" enctype="multipart/form-data">
			<?php
			if(isset($mess)){
				echo $mess;
			}
			 ?>
		  <div class="form-group">
		    <label for="exampleInputName1">Name</label>
		    <input name="name" type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Username</label>
		    <input name="uname" type="text" class="form-control" id="exampleInputEmail1">
		  </div>
		   <div class="form-group">
		    <label for="email">Email</label>
		    <input name="email" type="text" class="form-control" id="email">
		  </div>
      <div class="form-group">
       <label for="cell">Cell</label>
       <input name="cell" type="text" class="form-control" id="cell">
     </div>
		 <div class="form-group">
			<label for="password">Password</label>
			<input name="password" type="password" class="form-control" id="password">
		</div>
		  <div class="form-group">
		    <label for="photo">Photo</label>
		    <input name="photo" type="file" class="form-control" id="photo">
		  </div>
		  <button name="submit" type="submit" class="btn btn-primary" value="Add">Submit</button>
		</form>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
