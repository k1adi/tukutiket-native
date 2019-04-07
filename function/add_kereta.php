<?php

include 'koneksi.php';
$koneksi = open_connection();

if(isset($_POST['submit'])){
	$kereta = $_POST['kereta'];

	$query = "INSERT INTO `kereta` (nama_kereta) VALUES ('$kereta')";
	$sql = mysqli_query($koneksi, $query) or die (mysql_error($koneksi));

?>

<script type="text/javascript">
	alert("Kereta Berhasil Ditambah");
</script>
<meta http-equiv="refresh" content="0;url=../admin/admin_kereta.php" />

<?php

} else {
	mysqli_error($koneksi);
}

?>