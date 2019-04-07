<?php

include 'koneksi.php';
$koneksi = open_connection();

if(isset($_POST['submit'])){
	$kelas = $_POST['kelas'];
	$jml_kursi = $_POST['jml_kursi'];
	$harga = $_POST['harga'];
	$kereta = $_POST['kereta'];

	$find_id = mysqli_query($koneksi, "SELECT id FROM `kereta` WHERE nama_kereta = '$kereta'");
	$data = mysqli_fetch_assoc($find_id);
	$id_kereta = $data['id'];
	// var_dump($id_kereta);

	$query = "INSERT INTO `gerbong` (jumlah_kursi,harga,kelas,id_kereta) VALUES ('$jml_kursi', $harga, '$kelas', '$id_kereta')";
	$sql = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));

?>

<script type="text/javascript">
	alert("Gerbong Berhasil Ditambah");
</script>
<meta http-equiv="refresh" content="0;url=../admin/admin_gerbong.php" />

<?php

} else {
	mysqli_error($koneksi);
}

?>