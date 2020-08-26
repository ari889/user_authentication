<?php
	require_once 'app/autoload.php';
	session_start();

	if(isset($_GET['logout']) && $_GET['logout'] == 'ok'){
		session_destroy();
		header('location:index.php');
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
		<a href="all-data.php" class="btn btn-info">All Data</a>
    <div class="card mt-3">
      <div class="card-body">
        <img src="photos/<?php echo $_SESSION['photo']; ?>" alt="" class="user-image shadow-sm">
        <h3 class="text-center"><?php echo $_SESSION['name']; ?></h3>
        <table class="table">
          <tr>
            <td>Email:</td>
            <td><?php echo $_SESSION['email']; ?></td>
          </tr>
          <tr>
            <td>Cell:</td>
            <td><?php echo $_SESSION['cell']; ?></td>
          </tr>
          <tr>
            <td>Username:</td>
            <td><?php echo $_SESSION['uname']; ?></td>
          </tr>
        </table>
      </div>
			<div class="card-footer">
				<a href="?logout=ok">Logout</a>
			</div>
    </div>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
