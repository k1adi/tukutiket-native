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
						Update Gerbong
					</div>
					<div class="card-body">
						<?php

						include '../function/koneksi.php';
						$koneksi = open_connection();

						$id = $_GET['id'];
						$query = "SELECT * FROM `gerbong` WHERE id = $id";
						$sql = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
						$data = mysqli_fetch_assoc($sql)
						?>
						<form action="../function/proccess_updt_gerbong.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
						  <div class="form-group row">
						  	<div class="col">
							    <label>Kelas </label>
							    <input type="text" name="kelas" class="form-control" value="<?php echo $data['kelas'];?>" required>
						  	</div>
						  	<div class="col">
							    <label>Jumlah Kursi </label>
							    <input type="number" name="jml_kursi" class="form-control" value="<?php echo $data['jumlah_kursi'];?>" required>
						  	</div>
						  	<div class="col">
							    <label>Harga </label>
							    <div class="input-group mb-2">
						        <div class="input-group-prepend">
						          <div class="input-group-text">Rp. </div>
						        </div>
						        <input name="harga" type="number" class="form-control"  value="<?php echo $data['harga'];?>">
						      </div>
						  	</div>
						  	<div class="col">
							    <label>Kereta </label>
							    <select class="form-control" name="kereta">
							    	<?php

							    	$query2 = "SELECT nama_kereta FROM kereta";
							    	$sql2 = mysqli_query($koneksi, $query2) or die (mysqli_error($koneksi));

							    	while($data2 = mysqli_fetch_assoc($sql2)){
							    		echo "<option>".$data2['nama_kereta']."</option>";
							    	}
							    	?>
						      </select>
						  	</div>
						  </div>
					    <input type="submit" name="update" class="btn btn-warning text-white btn-sm">
						</form>
					</div>
				</div>
			</content>
			<?php
		
				if(isset($_POST['update'])){

					$id = $_POST['id'];
					$kelas = $_POST['kelas'];
					$jml_kursi = $_POST['jml_kursi'];
					$harga = $_POST['harga'];
					$kereta = $_POST['kereta'];

					$find_id = mysqli_query($koneksi, "SELECT id FROM `kereta` WHERE nama_kereta = '$kereta'");
					$kereta = mysqli_fetch_assoc($find_id);
					$id_kereta = $kereta['id'];

					$update = mysqli_query($koneksi, "UPDATE `gerbong` SET jumlah_kursi='$jml_kursi',harga='$harga', kelas='$kelas',id_kereta='$id_kereta' WHERE id=$id");
				?>

					<script type="text/javascript">
						alert("Gerbong Berhasil Diubah");
					</script>
					<meta http-equiv="refresh" content="0;url=../admin/admin_gerbong.php" />

				<?php

					} else {
						mysqli_error($koneksi);
					}

				?>	
		</div>
	</div>

	<!-- Footer -->
	<?php include '../template/temp_footer_admin.php'; ?>

</body>
</html>