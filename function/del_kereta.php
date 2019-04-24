<?php

include 'koneksi.php';
$koneksi = open_connection();

$id = $_GET['id'];
$query = "DELETE FROM kereta WHERE id_kereta = $id";
$sql = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));

?>

<script type="text/javascript">
	alert("Kereta Berhasil Dihapus");
</script>
<meta http-equiv="refresh" content="0;url=../admin/admin_kereta.php" />
