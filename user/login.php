<!DOCTYPE html>
<html>
<head>

	<!-- Include Meta Tag, Bootstrap, FontAwesome -->
	<?php include '../template/temp_head.php'; ?>

	<title>Tukutiket - Login</title>
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

	<!-- Container -->
	<div class="card mx-auto mt-5" style="width: 35rem;">
		<h5 class="card-header bg-light text-secondary text-center">
			Login
		</h5>
		<div class="card-body">
			<form action="../function/proccess_login.php" method="POST">
				
				<div class="form-group row">
			    <label class="col-sm-3 col-form-label">E-mail</label>
			    <div class="col-sm-9">
			      <input type="email" name="email" class="form-control" required>
			    </div>
			  </div>

    		<div class="form-group row">
			    <label class="col-sm-3 col-form-label">Password</label>
			    <div class="col-sm-9">
			      <input type="password" name="password" class="form-control" required>
			    </div>
			  </div>

			  <div class="col-sm-9 offset-sm-3 pl-2">
	    		<input type="submit" name="login" value="Login" class="btn btn-primary">
			  </div>
			</form>
		</div>
	</div>
</body>
</html>