<?php
	require_once 'app/autoload.php';

	//page security

	if(!isset($_SESSION['id']) && !isset($_SESSION['name'])){
		header('location:index.php');
	}

	if(isset($_GET['profile_id'])){
		$pid = $_GET['profile_id'];

		$sql = "SELECT * FROM users WHERE id = '$pid'";
		$data = $connection -> query($sql);

		$pdata = $data -> fetch_object();
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $pdata -> name; ?></title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="custom_signup">
		<a href="all-data.php" class="btn btn-info">Back</a>
    <div class="card mt-3">
      <div class="card-body">
        <img src="photos/<?php echo $pdata -> photo; ?>" alt="" class="user-image shadow-sm">
        <h3 class="text-center"><?php echo $pdata -> name; ?></h3>
        <table class="table">
          <tr>
            <td>Email:</td>
            <td><?php echo $pdata -> email; ?></td>
          </tr>
          <tr>
            <td>Cell:</td>
            <td><?php echo $pdata -> cell; ?></td>
          </tr>
          <tr>
            <td>Username:</td>
            <td><?php echo $pdata -> uname; ?></td>
          </tr>
        </table>
      </div>
    </div>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
