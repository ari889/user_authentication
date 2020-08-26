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

	//login form
	if(isset($_POST['submit'])){
		$ue = $_POST['ue'];
		$pass = $_POST['pass'];

		if(empty($ue) || empty($pass)){
			$mess = validation('All fields are required', 'warning');
		}else{

			//login request send
			$sql = "SELECT * FROM users WHERE uname = '$ue' || email = '$ue'";
			$data = $connection -> query($sql);
			$user_num = $data -> num_rows;
			$login_user_data = $data -> fetch_assoc();

			//username or email check for login
			if($user_num == 1){
				//password check
				if(password_verify($pass, $login_user_data['pass']) == true){
					//session data management
					session_start();
					$_SESSION['id'] = $login_user_data['id'];
					$_SESSION['name'] = $login_user_data['name'];
					$_SESSION['cell'] = $login_user_data['cell'];
					$_SESSION['uname'] = $login_user_data['uname'];
					$_SESSION['email'] = $login_user_data['email'];
					$_SESSION['photo'] = $login_user_data['photo'];


					//redirect profile
					header('location:profile.php');
				}else{
					$mess = validation('Wrong password', 'danger');
				}
			}else{
				$mess = validation('Username or email is incorrect', 'danger');
			}
		}
	}

	 ?>
	<div class="custom_signup">
		<a href="registration.php" class="btn btn-info">Register user</a>
		<h2 class="text-center">Sign IN</h2>
		<div class="message">
		</div>
		<form method="POST">
			<?php
			if(isset($mess)){
				echo $mess;
			}
			 ?>
		  <div class="form-group">
		    <label for="exampleInputName1">Username / Email</label>
		    <input name="ue" type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
		  </div>
			 <div class="form-group">
				<label for="pass">Password</label>
				<input name="pass" type="password" class="form-control" id="pass">
			</div>
		  <button name="submit" type="submit" class="btn btn-primary" value="Add">Submit</button>
		</form>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
