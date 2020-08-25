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
              <th scope="col">Photo</th>
              <th scope="col">Product Name</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total</th>
              <th scope="col" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <th scope="row">1</th>
                <td><img src="products/image.jpg" alt="" class="img-fluid custom-image"></td>
                <td>Alu</td>
                <td>25</td>
                <td>25</td>
                <td>225</td>
                <td class="text-right">
                  <a href="profile.php" class="btn btn-info">View</a>
                  <a href="#" class="btn btn-warning">Edit</a>
                  <a href="all-data.php" class="btn btn-danger" id="delete-btn">Delete</a>
                </td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
