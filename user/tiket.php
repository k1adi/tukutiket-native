<!DOCTYPE html>
<html>
<head>
	<!-- Include Meta Tag, Bootstrap, FontAwesome -->
	<?php include '../template/temp_head.php'; ?>
	<title>Tukutiket - Tiket KA</title>
</head>
<body>
	<?php

		include '../function/koneksi.php';
		$koneksi = open_connection();

		$query = "SELECT * FROM ((((pesan_kereta INNER JOIN jadwal_kereta ON pesan_kereta.id_jadwal = jadwal_kereta.id_jadwal) INNER JOIN penumpang ON pesan_kereta.nik = penumpang.nik) INNER JOIN kereta ON jadwal_kereta.id_kereta = kereta.id_kereta) INNER JOIN gerbong ON gerbong.id_kereta - kereta.id_kereta))";

	?>
	<div class="container mt-5">
		<a href="#" style="float:right;">print</a><br>
		<div class="card mt-3">
			<div class="card-body">
				<div class="row">
					<div class="col-3">
						
					</div>
					<div class="col-3">
						
					</div>
					<div class="col-3">
						
					</div>
					<div class="col-3">
						
					</div>
				</div>	
			</div>
		</div>


	</div>
</body>
</html>