<?php

include 'koneksi.php';
$koneksi = open_connection();

$id = $_GET['id'];
$query = "DELETE FROM gerbong WHERE id = $id";
$sql = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));

?>

<script type="text/javascript">
	alert("Gerbong Berhasil Dihapus");
</script>
<meta http-equiv="refresh" content="0;url=../admin/admin_gerbong.php" />
