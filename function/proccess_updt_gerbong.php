<?php
	
	include 'koneksi.php';
	$koneksi = open_connection();

	if(isset($_POST['update'])){

		$id = $_POST['id'];
		$kelas = $_POST['kelas'];
		$jml_kursi = $_POST['jml_kursi'];
		$harga = $_POST['harga'];
		$kereta = $_POST['kereta'];

		$find_id = mysqli_query($koneksi, "SELECT id FROM `kereta` WHERE nama_kereta = '$kereta'");
		$kereta = mysqli_fetch_assoc($find_id);
		$id_kereta = $kereta['id'];

		$update = mysqli_query($koneksi, "UPDATE `gerbong` SET jumlah_kursi='$jml_kursi',harga='$harga', kelas='$kelas',id_kereta='$id_kereta' WHERE id='$id'");
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