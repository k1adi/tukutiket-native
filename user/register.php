<!DOCTYPE html>
<html>
<head>

	<!-- Include Meta Tag, Bootstrap, FontAwesome -->
	<?php include '../template/temp_head.php'; ?>

	<title>Tukutiket - Register</title>
	<link rel="stylesheet" href="">
</head>
<body>

	<?php
		session_start();
		if(isset($_SESSION['name'])){
			$name = $_SESSION['name'];
		}
	?>

	<!-- Navbar -->
	<?php include'../template/temp_navbar.php' ?>

	<div class="card mx-auto mt-4" style="width: 35rem;">
		<h5 class="card-header bg-light text-secondary text-center">
			Register
		</h5>
		<div class="card-body">
			<form action="../function/proccess_register.php" method="POST">

				<div class="form-group row">
			    <label class="col-sm-3 col-form-label">Name</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" name="name" required>
			    </div>
			  </div>

				<div class="form-group row">
			    <label class="col-sm-3 col-form-label">E-mail</label>
			    <div class="col-sm-9">
			      <input type="email" class="form-control" name="email" required>
			    </div>
			  </div>

    		<div class="form-group row">
			    <label class="col-sm-3 col-form-label">Password</label>
			    <div class="col-sm-9">
			      <input type="password" class="form-control" name="password" required>
			    </div>
			  </div>

			  <div class="col-sm-9 offset-sm-3 pl-2">
	    		<input type="submit" name="register" value="Register" class="btn btn-primary">
			  </div>
			</form>
		</div>
	</div>
</body>
</html>