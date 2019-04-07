<?php
	include 'koneksi.php';
	$koneksi = open_connection();

	if(isset($_POST["submit"])){
		$tanggal = $_POST['tanggal'];
		$st_awal = $_POST['stasiun_awal'];
		$st_akhir = $_POST['stasiun_akhir'];
		
		// Mencari id_kereta		
		$kereta = $_POST['kereta'];
		$find_id = mysqli_query($koneksi, "SELECT id FROM `kereta` WHERE nama_kereta = '$kereta'");
		$data = mysqli_fetch_assoc($find_id);
		$id_kereta = $data['id'];

		$jam_brgkt = $_POST['jam_berangkat'];
		$jam_tiba = $_POST['jam_tiba'];

		$query = "INSERT INTO `jadwal_kereta` (tgl_berangkat,stasiun_awal,stasiun_akhir,id_kereta,jam_berangkat,jam_tiba) VALUES ('$tanggal','$st_awal', '$st_akhir', '$id_kereta', '$jam_brgkt', '$jam_tiba') ";
		$sql = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));

?>
	<script type="text/javascript">
		alert("Data Jadwal Kereta Berhasil Ditambah");
	</script>
	<meta http-equiv="refresh" content="0;url=../admin/admin_jadwal_kereta.php" />
<?php
	}
?>