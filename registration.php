<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Form Validation</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="custom_signup">
		<a href="index.php" class="btn btn-info">Sign IN</a>
		<h2 class="text-center">Sign Up</h2>
		<div class="message">
		</div>
		<form method="POST" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="exampleInputName1">Username / Email</label>
		    <input name="name" type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Username</label>
		    <input name="email" type="text" class="form-control" id="exampleInputEmail1">
		  </div>
		   <div class="form-group">
		    <label for="cell">Email</label>
		    <input name="cell" type="text" class="form-control" id="cell">
		  </div>
      <div class="form-group">
       <label for="username">Cell</label>
       <input name="username" type="text" class="form-control" id="username">
     </div>
		 <div class="form-group">
			<label for="username">Password</label>
			<input name="username" type="password" class="form-control" id="username">
		</div>
		  <div class="form-group">
		    <label for="image">Photo</label>
		    <input name="image" type="file" class="form-control" id="image">
		  </div>
		  <button name="submit" type="submit" class="btn btn-primary" value="Add">Submit</button>
		</form>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
