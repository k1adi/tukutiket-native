<?php

	include 'koneksi.php';
	$koneksi = open_connection();

	if(isset($_POST['submit'])){
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$no = $_POST['no_hp'];
		$nik = $_POST['no_nik'];
		$jml = $_POST['jml'];
		$harga = $_POST['harga'];
		$id_jadwal = $_POST['id_jadwal'];

		$bayar = $jml * $harga;
		$length = 5;
		$code = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

		mysqli_query($koneksi, 'SET foreign_key_checks = 0');
		$query = "INSERT INTO `penumpang` (nama,nik,no_hp,email) VALUES ('$nama','$nik','$no','$email')";
		$query = "INSERT INTO `pesan_kereta` (nik,id_jadwal,jml_pesan,total_bayar,code_booking) VALUES ('$nik','$id_jadwal','$jml','$bayar','$code')";
		$sql = mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));
		mysqli_query($koneksi, 'SET foreign_key_checks = 1');
?>

	<script type="text/javascript"> 
		alert('Pemesanan tiket berhasil');
	</script>
	<meta http-equiv="refresh" content="0;url=../index.php" />
<?php

	} else {
		echo "Data Pemesanan Gagal";
	}

?>