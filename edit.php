<?php
	require_once 'app/autoload.php';

	//page security

	if(!isset($_SESSION['id']) && !isset($_SESSION['name'])){
		header('location:index.php');
	}


	if(isset($_GET['edit_id'])){
		$eid = $_GET['edit_id'];
	}

	if(isset($_POST['edit'])){
		//get value
		$name = $_POST['name'];
		$email = $_POST['email'];
		$cell = $_POST['cell'];

		if(empty($name) || empty($email) || empty($cell)){
			$mess = validation('All filds are required.', 'danger');
		}else{

			if(!empty($_FILES['new_photo']['name'])){
				$photo = fileUpload($_FILES['new_photo'], 'photos/');
				$photo_name = $photo['file_name'];
			}else{
				$photo_name = $_POST['old_photo'];
			}
			$sql = "UPDATE users SET name = '$name', email = '$email', cell = '$cell', photo = '$photo_name' WHERE id = '$eid'";
			$connection -> query($sql);
			$mess = validation('Data update successful.', 'success');

			$_SESSION['photo'] = $photo_name;
		}
	}
	if(isset($_GET['edit_id'])){
		$sql = "SELECT * FROM users WHERE id = '$eid'";
		$data = $connection -> query($sql);

		$edit_data = $data -> fetch_object();
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
		<a href="password_change.php" class="btn btn-info">Change Password</a>
    <div class="card mt-3">
      <div class="card-body">
				<form action="" method="POST" enctype="multipart/form-data">
					<?php
						if(isset($mess)){
							echo $mess;
						}
					 ?>
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" type="text" class="form-control" value="<?php echo $edit_data -> name; ?>">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" type="text" class="form-control" value="<?php echo $edit_data -> email; ?>">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" class="form-control" value="<?php echo $edit_data -> uname; ?>" disabled>
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" type="text" class="form-control" value="<?php echo $edit_data -> cell; ?>">
					</div>
					<div class="form-group">
						  <img src="photos/<?php echo $edit_data -> photo; ?>" alt="" class="shadow-sm img-fluid">
							<input type="hidden" value="<?php echo $edit_data -> photo; ?>" name="old_photo">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input type="file" class="form-control" name="new_photo">
					</div>
					<div class="form-group">
						<input name="edit" type="submit" value="Update" class="btn btn-primary">
					</div>
				</form>
      </div>
    </div>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
