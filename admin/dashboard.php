<!DOCTYPE html>
<html>
<head>
	
	<!-- Include Meta Tag, Bootstrap, FontAwesome -->
	<?php include '../template/temp_head.php'; ?>

	<title>Tukutiket - Admin</title>
</head>
<body>
	<?php
		session_start();
		if($_SESSION['level'] == null){
		echo '<script type="text/javascript">';
		echo 'alert("Anda Tidak Punya Akses");';
		echo '</script>';
		echo '<meta http-equiv="refresh" content="0;url=../index.php" />';
		}
	?>

	<!-- Navbar -->
	<?php include'../template/temp_navbar.php' ?>

	<!-- Container -->
	<div class="container-fluid">
		<div class="row">
			
			<!-- Aside -->
			<?php include'../template/temp_aside_admin.php'; ?>

			<content class="col-md-10 bg-light custom-content">
				<p class="mt-2 page-title">Dashboard</p>
			</content>

		</div>
	</div>

	<!-- Footer -->
	<?php include '../template/temp_footer_admin.php'; ?>

</body>
</html>