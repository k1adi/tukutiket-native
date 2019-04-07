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

			<content class="col-md-10 bg-light custom-content">
				<p class="mt-2 page-title">Dashboard Jadwal Kereta</p>

				<!-- Tambah Jadwal -->
				<div class="card">
					<div class="card-header">
						Tambah Jadwal
					</div>
					<div class="card-body">
						<?php
							include '../function/koneksi.php';
							$koneksi = open_connection();
						?>
						<form action="../function/add_jadwal_kereta.php" method="POST">
						  <div class="form-group row">
						  	
						  	<!-- Input Tanggal -->
						  	<div class="col-4">
							    <label>Tanggal </label>
							    <input type="date" name="tanggal"value="<?php echo date('Y-m-d');?>" min="2019-01-01" max="2019-12-31" class="form-control" required>
						  	</div>

						  	<!-- Input Stasiun Awal -->
						  	<div class="col-4">
							    <label>Stasiun Awal </label>
							    <div class="input-group mb-2">
						        <div class="input-group-prepend">
						          <div class="input-group-text"><i class="fas fa-train"></i></div>
						        </div>
						        <input name="stasiun_awal" type="text" class="form-control" required>
						      </div>
						  	</div>

						  	<!-- Input Stasiun Akhir -->
						  	<div class="col-4">
							    <label>Stasiun Akhir </label>
							    <div class="input-group mb-2">
						        <div class="input-group-prepend">
						          <div class="input-group-text"><i class="fas fa-train"></i></div>
						        </div>
						        <input name="stasiun_akhir" type="text" class="form-control" required>
						      </div>
						  	</div>

						  	<!-- Input Kereta -->
						  	<div class="col-4">
							    <label>Kereta </label>
							    <select class="form-control" name="kereta" required>
						        <?php

						        $query = "SELECT nama_kereta FROM kereta";
							    	$sql = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));

							    	while($data = mysqli_fetch_assoc($sql)){
							    		echo "<option>".$data['nama_kereta']."</option>";
							    	}
							    	
							    	?>
						      </select>
						  	</div>

						  	<!-- Input Jam Berangkat -->
						  	<div class="col-4">
							    <label>Jam Berangkat </label>
							    <input type="time" name="jam_berangkat" class="form-control" required>
						  	</div>

						  	<!-- Input Jam Tiba -->
						  	<div class="col-4">
							    <label>Jam Tiba </label>
							    <input type="time" name="jam_tiba" class="form-control" required>
						  	</div>

						  </div>
					    <input type="submit" name="submit" class="btn btn-primary btn-sm">
						</form>
					</div>
				</div>

				<!-- Daftar Jadwal -->
				<p class="mt-5">Daftar Jadwal Kereta</p>
				<table class="table table-hover table-bordered mb-3">
					<thead>
						<tr>
							<td>No</td>
							<td>Tanggal</td>
							<td>Stasiun Awal</td>
							<td>Stasiun Akhir</td>
							<td>Kereta</td>
							<td>Jam Berangkat</td>
							<td>Jam Tiba</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php

							// $sql = "SELECT * FROM `jadwal_kereta`";
							$i = 1;
							$query = "SELECT * FROM `kereta` INNER JOIN jadwal_kereta ON jadwal_kereta.id_kereta = kereta.id";
							$sql = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
							// var_dump($query);
							$cek = mysqli_num_rows($sql);

							if($cek > 0){
								while($data = mysqli_fetch_assoc($sql)){
									echo "<tr>";
									echo "<td>" .$i++. "</td>";
									echo "<td>" .$data['tgl_berangkat']. "</td>";
									echo "<td>" .$data['stasiun_awal']. "</td>";
									echo "<td>" .$data['stasiun_akhir']. "</td>";
									echo "<td>" .$data['nama_kereta']. "</td>";
									echo "<td>" .$data['jam_berangkat']. "</td>";
									echo "<td>" .$data['jam_tiba']. "</td>";
									echo "<td><a href='../function/updt_jadwal_kereta.php?id=$data[id]' class='btn btn-success btn-sm'>ubah</a> ";
									echo "<a href='../function/del_jadwal_kereta.php?id=$data[id]' class='btn btn-danger btn-sm'>hapus</a></td>";
									echo "</tr>";
								}
							} else {
								echo "<tr><td colspan='8' class='text-center'>No Data In This Tables</td></tr>";
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