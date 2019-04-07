<?php

function open_connection(){
	
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'tukutiket_native';

	$koneksi = new mysqli($host, $user, $pass, $db) or die (mysqli_error($koneksi));	

	return $koneksi;
}
?>