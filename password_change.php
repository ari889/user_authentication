<?php
	require_once 'app/autoload.php';

	//page security

	if(!isset($_SESSION['id']) && !isset($_SESSION['name'])){
		header('location:index.php');
	}

	if(isset($_POST['pc'])){
		$old_pass = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];
		$confirm_pass = $_POST['confirm_pass'];

		if(password_verify($old_pass, $_SESSION['pass']) == false){
			$old_pass_check = false;
		}else{
			$old_pass_check = true;
		}

		if(empty($old_pass) || empty($new_pass) || empty($confirm_pass)){
			$mess = validation('All filds are required', 'danger');
		}else if($new_pass != $confirm_pass){
			$mess = validation('Password not match', 'warning');
		}else if($old_pass_check == false){
			$mess = validation("Old password doesn't match","Warning");
		}else{
			$pass_hash = password_hash($new_pass, PASSWORD_DEFAULT);
			$user_id = $_SESSION['id'];
			$sql = "UPDATE users SET pass = '$pass_hash' WHERE id = '$user_id'";
			$connection -> query($sql);
			$_SESSION['pass'] = $pass_hash;
			$mess = validation('Password update successful.', 'success');
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_SESSION['name']; ?></title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="custom_signup">
		<a href="all-data.php" class="btn btn-info">All Users</a>
    <div class="card mt-3">
      <div class="card-body">
				<form action="" method="POST">
					<?php
						if(isset($mess)){
							echo $mess;
						}
					 ?>
					<div class="form-group">
						<label for="">Old password</label>
						<input name="old_pass" type="password" class="form-control">
					</div>
					<div class="form-group">
						<label for="">New Password</label>
						<input name="new_pass" type="password" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Confirm Password</label>
						<input name = "confirm_pass" type="password" class="form-control">
					</div>
					<div class="form-group">
						<input name="pc" type="submit" value="Update" class="btn btn-primary">
					</div>
				</form>
      </div>
    </div>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
