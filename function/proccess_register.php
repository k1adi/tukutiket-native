<?php
include 'koneksi.php';
$koneksi = open_connection();

if(isset($_POST['register'])){
$name = $_POST['name'];
$email = $_POST['email'];
$pass = md5($_POST['password']);

$query = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$pass')"; 
$sql = mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));

?>
<script type="text/javascript">
	alert("Registrasi berhasil");
</script>
<meta http-equiv="refresh" content="0;url=../user/login.php" />
<?php
}

?>