<!DOCTYPE html>
<html>
<head>
	
	<!-- Meta Tag -->
	<meta charset="utf-8">
	<meta name="author" content="Rizki Adi">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Script.js -->
	<script src="public/js/jquery-3.3.1.slim.min.js"></script>
	<script src="public/js/popper.min.js"></script>
	<script src="public/bootstrap/js/bootstrap.js"></script>
	<script src="public/fontawesome/js/all.js"></script>

	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="public/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="public/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="public/css/custom.css">

	<title>
		Tukutiket
	</title>
</head>
<body>
	<?php
		session_start();
		if(isset($_SESSION['name'])){
			$name = $_SESSION['name'];
		}
	?>

	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top" id="navbar-home">

	  <!-- Apllication -->
	  <a class="navbar-brand" href="index.php"><i class="fas fa-ticket-alt"></i> Tukutiket</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
	    aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <!-- Link With Scrollspy Bootstrap -->
	  <div class="collapse navbar-collapse" id="navbarText">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link text-white" href="#kereta">Kereta Api</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link text-white" href="#pesawat">Pesawat</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link text-white" href="#contact">Contact Us</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link text-white" href="#about">About Us</a>
	      </li>
	    </ul>

	    <!-- Tools -->
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <i class="fas fa-user"></i>
          		
          		<!-- Show Name After Login -->
          		<?php
          			if(isset($_SESSION['name'])){
									$name = $_SESSION['name'];
									echo $name;
								}
          		?>
	        </a>
	        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	          
	        	<!-- To Dashboard Admin When Admin Login -->
	          <?php
        			if(isset($_SESSION['name'])){
        				if($_SESSION['level'] == 1){
	          			echo '<a class="dropdown-item" href="admin\dashboard.php">Admin</a>';
	          		}
						?>
							<a class="dropdown-item" href="function/logout.php">Logout</a>
						
						<!-- Login and Regis for Guest -->
						<?php	} else { ?>
	          	<a class="dropdown-item" href="user/login.php">Login</a>
	          	<a class="dropdown-item" href="user/register.php">Register</a>
	          <?php } ?>
	        </div>
	      </li>
	    </ul>
	  </div>

	</nav>

	<!-- Content -->
	<div class="container" data-spy="scroll" data-target="navbar-home" data-offset="0">
		<div class="text-center text-muted" style="height:75vh;">

			<!-- Application -->
			<div class="title mt-7 mb-4">
				<i class="fas fa-ticket-alt"></i> Tukutiket
			</div>
			<div class="h3 col-7 mx-auto">

				<!-- Description -->
				Get your ticket and booking them Lorem Ipsum dolor sit amet consectetur adi piscing elit

				<!-- Check your code booking -->
				<div class="input-group mt-5">
				  <input type="text" class="form-control" placeholder="Check your code booking">
				  <div class="input-group-append">
				    <button class="btn btn-outline-primary" type="button">Search</button>
				  </div>
				</div>

			</div>
		</div>

		<!-- Kereta Api-->
		<div class="h4 text-center pt-6" id="kereta">
			Kereta Api
		</div>
		<div class="row mb-5">
			<div class="col-md-4 text-center">
				<i class="fas fa-train my-3 title"></i>
			</div>
			<div class="col-md-8">
				Veniam marfa mustache skateboard, adipisicing fugiat velit pitchfork beard. Freegan beard aliqua cupidatat mcsweeney's vero. Cupidatat four loko nisi, ea helvetica nulla carles. Tattooed cosby sweater food truck, mcsweeney's quis non freegan vinyl. Lo-fi wes anderson +1 sartorial. Carles non aesthetic exercitation quis gentrify. Brooklyn adipisicing craft beer vice keytar deserunt.
			</div>
			<div class="col-md-12">
				
			</div>	
		</div>

		<!-- Pesawat -->
		<div class="h4 text-center pt-6" id="pesawat">
			Pesawat
		</div>
		<div class="row mb-5">
			<div class="col-md-8">
				Ad leggings keytar, brunch id art party dolor labore. Pitchfork yr enim lo-fi before they sold out qui. Tumblr farm-to-table bicycle rights whatever. Anim keffiyeh carles cardigan. Velit seitan mcsweeney's photo booth 3 wolf moon irure. Cosby sweater lomo jean shorts, williamsburg hoodie minim qui you probably haven't heard of them et cardigan trust fund culpa biodiesel wes anderson aesthetic. Nihil tattooed accusamus, cred irony biodiesel keffiyeh artisan ullamco consequat.
			</div>
			<div class="col-md-4 text-center">
				<i class="fas fa-plane"></i>
			</div>
			<div class="col-md-12">
				
			</div>	
		</div>

		<!-- Contact Us -->
		<div class="h4 text-center pt-6" id="contact">
			Contact Us
		</div>
		<p class="text-muted txt-small">Fields marked with an <span class="text-primary">*</span> are required</p>
		<form action="function/add_contact_us.php" method="POST">
			<div class="form-group row">
				<div class="col-md-6 mb-4">
					<label class="col-form-label">Name <span class="text-primary">*</span></label>
					<input class="form-control" type="text" name="name" required>
				</div>
				<div class="col-md-6 mb-4">
					<label class="col-form-label">Email <span class="text-primary">*</span></label>
					<input class="form-control" type="text" name="email" required>
				</div>
				<div class="col-md-12">
					<label class="col-form-label">Message <span class="text-primary">*</span></label>
					<textarea class="form-control" name="message" rows="5" required></textarea>
				</div>
	  		<input type="submit" name="submit" class="btn btn-primary btn-sm ml-3 mt-3">
			</div>
		</form>

		<!-- About Us -->
		<div class="h4 text-center pt-6" id="about">
			About Us
		</div>
		<div class="row" style="height: 100vh;">
			
		</div>
	</div>

</body>
</html>