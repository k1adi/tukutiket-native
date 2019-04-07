<?php

include 'koneksi.php';
$koneksi = open_connection();

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	$query = "INSERT INTO contact_us(name,email,message) VALUES ('$name', '$email', '$message')";
	$sql = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
?>
<script type="text/javascript">
	alert("Pesan berhasil dikirim");
</script>
<meta http-equiv="refresh" content="0;url=../index.php" />
<?php
}

?>