<!DOCTYPE html>
<html>
<head>
	<!-- Include Meta Tag, Bootstrap, FontAwesome -->
	<?php include '../template/temp_head.php'; ?>

	<title>Tukutiket - Pesan KA</title>
</head>
<body>
	<!-- Navbar -->
	<?php include'../template/temp_navbar.php' ?>
	<?php

		include '../function/koneksi.php';
		$koneksi = open_connection();

		$id = $_GET['id_jadwal'];

		$query = "SELECT * FROM ((jadwal_kereta INNER JOIN kereta ON jadwal_kereta.id_kereta = kereta.id_kereta) INNER JOIN gerbong ON gerbong.id_kereta = kereta.id_kereta) WHERE id_jadwal = '$id'";
		// var_dump($query);
		$sql = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
		$data = mysqli_fetch_assoc($sql);

	?>
	<div class="container">
		<div class="row mt-5">
			<div class="col-8">
				<p class="h4 mb-4">Informasi Pribadi</p>
				<div class="card">
					<div class="card-body">
						<form action="../function/add_pesan_kereta.php" method="POST">
							<div class="form-group row">
								<div class="col-12 mb-3">
									<label class="col-form-label">Nama</label>
									<input type="text" name="nama" class="form-control" required>
								</div>
								<div class="col-12 mb-3">
									<label class="col-form-label">Email</label>
									<input type="email" name="email" class="form-control" required>
								</div>
								<div class="col-6 mb-3">
									<label class="col-form-label">No Handphone</label>
									<input type="text" name="no_hp" class="form-control" required>
								</div>
								<div class="col-6 mb-3">
									<label class="col-form-label">NIK</label>
									<input type="text" name="no_nik" class="form-control" required>
								</div>
								<div class="col-6">
									<label class="col-form-label">Jumlah Penumpang</label>
									<input type="number" name="jml" class="form-control" min="1" max="4" required>
								</div>
								<input type="hidden" name="id_jadwal" value="<?= $data['id_jadwal']; ?>">
								<input type="hidden" name="harga" value="<?= $data['harga']; ?>">
								<div class="col-6">
									<input type="submit" name="submit" class="btn btn-warning btn-block mt-cstm text-white">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
	
			<div class="col-4">
				<div class="card">
					<div class="card-header">Jadwal Keberangkatan</div>
					<div class="card-body text-muted">
						<p class="mb-1 h6 font-weight-bold"><?= $data['nama_kereta']; ?></p>
						<p class="mb-3 font-weight-light" style="font-size:14px;"><?= $data['kelas']; ?></p>
						<div class="ml-3">
							<ul class="timeline">
								<li class="mb-5">
									<?= $data['jam_berangkat']; ?>
									<br>
									<?= $data['stasiun_awal']; ?>
								</li>
								<li>
									<?= $data['jam_tiba'] ?>
									<br>
									<?= $data['stasiun_akhir']; ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>