<!DOCTYPE html>
<html>
<head>

	<!-- Include Meta Tag, Bootstrap, FontAwesome -->
	<?php include '../template/temp_head.php'; ?>

	<title>Tukutiket - Search KA</title>
</head>
<body>

	<!-- Navbar -->
	<?php include'../template/temp_navbar.php' ?>

	<?php
			$tgl = $_GET['tgl_berangkat'];
			$st_awal = $_GET['st_awal'];
			$st_akhir = $_GET['st_tujuan'];
			$date = date_create($tgl);
	?>
	<div class="container">
		<div class="row justify-content-between mt-5 border-bottom">
			<div class="col-6">
				<div class="h4 text-muted font-weight-bolder">
					<?php echo $st_awal; ?> &#x2192; <?php echo $st_akhir; ?>
					<!-- <i class="fas fa-arrow-right"></i> -->
					<!-- Pasar Senen -->
				</div>
				<p class="text-muted"><?= date("l, d-F-Y", strtotime($_GET['tgl_berangkat']));?></p>
			</div>
			<div class="col-2">
				<a href="../index.php" class="btn btn-warning text-white">Change Search</a>
			</div>
		</div>
		<?php

		include '../function/koneksi.php';
		$koneksi = open_connection();

		if(isset($_GET['searchKA'])){

			$query = "SELECT * FROM ((jadwal_kereta INNER JOIN kereta ON jadwal_kereta.id_kereta = kereta.id_kereta) INNER JOIN gerbong ON gerbong.id_kereta = kereta.id_kereta) WHERE tgl_berangkat = '$tgl' AND stasiun_awal = '$st_awal' AND stasiun_akhir = '$st_akhir'";
			$sql = mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));
			$cek = mysqli_num_rows($sql);
			// var_dump($sql);

			if ($cek > 0){
				while ($data = mysqli_fetch_assoc($sql)){
		?>

		<div class="card card-cstm mx-auto mt-4">
			<div class="card-body row">
				<div class="col-4">
					<p class="h5 text-muted font-weight-bold mb-0"> <?= $data['nama_kereta']; ?> </p>
					<p class="text-muted font-weight-light mb-0"> <?= $data['kelas']; ?></p>
					<!-- <p class="txt-small ml-3 font-weight-light text-muted">Sisa kursi : 45</p> -->
				</div>
				<div class="col-2">
					<p class="h5 text-muted font-weight-bold mb-0"><?= $data['jam_berangkat']; ?></p>					
					<p class="text-muted font-weight-light"><?= $data['stasiun_awal']; ?></p>
				</div>
				<div class="col-1">
					<p class="mt-2 text-muted font-weight-light">&#x2192;</p>					
				</div>
				<div class="col-2">
					<p class="h5 text-muted font-weight-bold mb-0"><?= $data['jam_tiba']; ?></p>					
					<p class="text-muted font-weight-light"><?= $data['stasiun_akhir']; ?></p>
				</div>
				<div class="col-3">
					<p class="h5 text-muted font-weight-bold mb-2">Rp. <?= $data['harga']; ?></p>					
					<a href="../user/pesan_kereta.php?id_jadwal=<?= $data['id_jadwal']; ?>" class="btn btn-primary btn-sm mb-3">Pesan</a>
				</div>
			</div>
		</div>
		<?php

				} 
			}
			else {
					echo "Jadwal Kereta Tidak Ada";
				}
		}
		?>

	</div>
</body>
</html>