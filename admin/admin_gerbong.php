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
				<p class="mt-2 page-title">Dashboard Gerbong</p>

				<!-- Tambah Gerbong -->
				<div class="card">
					<div class="card-header">
						Tambah Gerbong
					</div>
					<div class="card-body">
						<form action="../function/add_gerbong.php" method="POST">
						  <div class="form-group row">
						  	<div class="col">
							    <label>Kelas </label>
							    <input type="text" name="kelas" class="form-control" required>
						  	</div>
						  	<div class="col">
							    <label>Jumlah Kursi </label>
							    <input type="number" name="jml_kursi" class="form-control" required>
						  	</div>
						  	<div class="col">
							    <label>Harga </label>
							    <div class="input-group mb-2">
						        <div class="input-group-prepend">
						          <div class="input-group-text">Rp. </div>
						        </div>
						        <input name="harga" type="number" class="form-control">
						      </div>
						  	</div>
						  	<div class="col">
							    <label>Kereta </label>
							    <select class="form-control" name="kereta">
							    	<?php

							    	include'../function/koneksi.php';
							    	$koneksi = open_connection();

							    	$query = "SELECT nama_kereta FROM kereta";
							    	$sql = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));

							    	while($data = mysqli_fetch_assoc($sql)){
							    		echo "<option>".$data['nama_kereta']."</option>";
							    	}
							    	?>
						      </select>
						  	</div>
						  </div>
					    <input type="submit" name="submit" class="btn btn-primary btn-sm">
						</form>
					</div>
				</div>

				<!-- Daftar Kereta -->
				<p class="mt-5">Daftar Gerbong</p>
				<table class="table table-hover table-bordered mb-3">
					<thead>
						<tr>
							<td>No</td>
							<td>Kelas</td>
							<td>Kursi</td>
							<td>Harga</td>
							<td>Kereta</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php

							$i = 1;
							$query = "SELECT * FROM `kereta` INNER JOIN gerbong ON kereta.id = gerbong.id_kereta";
							$sql = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
							$cek = mysqli_num_rows($sql);
							if($cek > 0){
							while($data = mysqli_fetch_assoc($sql)){
								echo "<tr>";
								echo "<td>".$i++."</td>";
								echo "<td>".$data['kelas']."</td>";
								echo "<td>".$data['jumlah_kursi']."</td>";
								echo "<td>".$data['harga']."</td>";
								echo "<td>".$data['nama_kereta']."</td>";
								echo "<td><a href='../admin/admin_updt_gerbong.php?id=$data[id]' class='btn btn-success btn-sm'>ubah</a> ";
								echo "<a href='..function/del_gerbong.php?id=$data[id]' class='btn btn-danger btn-sm'>hapus</a></td>";
								echo "</tr>";
							}
						} else {
							echo "<tr><td colspan='6' class='text-center'>No Data In This Tables</td></tr>";
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