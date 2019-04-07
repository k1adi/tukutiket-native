<?php

session_start();
include 'koneksi.php';
$koneksi = open_connection();

$email = $_POST['email'];
$pass = md5($_POST['password']);

$sql = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email' and password = '$pass'") or die (mysqli_error($koneksi));

$cek = mysqli_num_rows($sql);

if($cek > 0){

	$login = mysqli_fetch_assoc($sql);
	if($login['level'] == '1'){
		$_SESSION['name'] = $login['name'];
		$_SESSION['level'] = '1';
		echo '<script type="text/javascript">';
		echo 'alert("Anda Berhasil Login sebagai Admin");';
		echo '</script>';
		echo '<meta http-equiv="refresh" content="0;url=../admin/dashboard.php" />';
	}
	else if($login['level'] == '0'){
		$_SESSION['name'] = $login['name'];
		$_SESSION['level'] = '0';
		echo '<script type="text/javascript">';
		echo 'alert("Anda Berhasil Login sebagai Manager");';
		echo '</script>';
		echo '<meta http-equiv="refresh" content="0;url=../admin/dashboard.php" />';
	}
	else if($login['level'] == NULL){
		$_SESSION['name'] = $login['name'];
		$_SESSION['level'] = NULL;
		echo '<script type="text/javascript">';
		echo 'alert("Anda Berhasil Login sebagai User");';
		echo '</script>';
		echo '<meta http-equiv="refresh" content="0;url=../index.php" />';
	}
}
	else{
		echo '<script type="text/javascript">';
		echo 'alert("Gagal Login");';
		echo '</script>';
		echo '<meta http-equiv="refresh" content="0;url=../user/login.php" />';	
	} 
?>