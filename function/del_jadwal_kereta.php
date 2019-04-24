<?php

include 'koneksi.php';
$koneksi = open_connection();

$id = $_GET['id'];
$query = "DELETE FROM `jadwal_kereta` WHERE id_jadwal = $id";
$sql = mysqli_query($koneksi, $query) or die (mysqli_query($koneksi));

?>
<script type="text/javascript">
	alert("Jadwal Kereta Berhasil Dihapus");
</script>
<meta http-equiv="refresh" content="0;url=../admin/admin_jadwal_kereta.php" />