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
		echo '<meta http-equiv="refresh" content="0;url=index.php" />';
		}
	?>

	<!-- Navbar -->
	<?php include'../template/temp_navbar.php' ?>

	<!-- Container -->
	<div class="container-fluid">
		<div class="row">
			
			<!-- Aside -->
			<?php include'../template/temp_aside_admin.php'; ?>

			<content class="col-md-10 bg-white custom-content">
				<p class="mt-2 page-title">Dashboard Kereta</p>

				<!-- Tambah Kereta -->
				<div class="card">
					<div class="card-header">
						Tambah Kereta
					</div>
					<div class="card-body">
						<form action="../function/add_kereta.php" method="POST">
						  <div class="form-group">
						    <label>Kereta </label>
						    <input type="text" name="kereta" class="form-control mb-2" required>
						    <input type="submit" name="submit" class="btn btn-primary btn-sm">
						  </div>
						</form>
					</div>
				</div>

				<!-- Daftar Kereta -->
				<p class="mt-5">Daftar Kereta</p>
				<table class="table table-hover table-bordered mb-3">
					<thead>
						<tr>
							<td>No</td>
							<td>Kereta</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php
							
							include '../function/koneksi.php';
							$koneksi = open_connection();

							$query = "SELECT * FROM `kereta`";
							$sql = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
							$i = 1;
							$cek = mysqli_num_rows($sql);
							if($cek > 0){
							while($data = mysqli_fetch_assoc($sql)){
								echo "<tr>";
								echo "<td>". $i++ ."</td>";
								echo "<td>". $data['nama_kereta'] ."</td>";
								echo "<td><a href='../function/del_kereta.php?id=$data[id]' class='btn btn-danger btn-sm'>hapus</a></td>";
								echo "</tr>";	
							}
							}else {
								echo "<tr><td colspan='3' class='text-center'>No Data In This Tables</td></tr>";
							}
						?>
					</tbody>
				</table>
			</content>

		</div>
	</div>

	<!-- Footer -->
	<?php include '../template/temp_footer_admin.php'; ?>

</body>
</html>