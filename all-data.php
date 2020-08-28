<?php
	require_once "app/autoload.php";


	if(isset($_GET['account_deactive_id'])){
		$daid = $_GET['account_deactive_id'];
		$sql = "DELETE FROM users WHERE id='$daid'";
		$connection -> query($sql);
		session_destroy();
		unlink('photos/'.$_SESSION['photo']);
		header('location:index.php');
	}
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

	<div class="container mt-5">
		<a href="profile.php" class="btn btn-info">My account</a>
    <div class="card">
      <div class="card-header">
        <h3>Product Management</h3>
      </div>
      <div class="card-body">
        <table class="table table-hover table-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Username</th>
              <th scope="col">photo</th>
              <th scope="col" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>

						<?php
								$sql = 'SELECT * FROM users';
								$data = $connection -> query($sql);
								$i = 1;
								while($user_data = $data -> fetch_assoc()):
						 ?>
              <tr>
                <th scope="row"><?php echo $i; $i++; ?></th>
                <td><?php echo $user_data['name']; ?></td>
                <td><?php echo $user_data['email']; ?></td>
                <td><?php echo $user_data['uname']; ?></td>
								<td><img src="photos/<?php echo $user_data['photo']; ?>" alt="" class="img-fluid custom-image"></td>
                <td class="text-right">
									<?php if($user_data['id'] == $_SESSION['id']): ?>
                  <a href="edit.php?edit_id=<?php echo $user_data['id']; ?>" class="btn btn-warning">Edit</a>
                  <a id="deactivate" href="?account_deactive_id=<?php echo $user_data['id']; ?>" class="btn btn-danger" id="delete-btn">Deactive</a>
									<?php else: ?>
									  <a href="view.php?profile_id=<?php echo $user_data['id']; ?>" class="btn btn-info">View</a>
									<?php endif; ?>
                </td>
              </tr>
						<?php endwhile; ?>



          </tbody>
        </table>
      </div>
    </div>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
