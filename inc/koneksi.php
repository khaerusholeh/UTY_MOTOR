<?php

	$host_db 	= 'localhost';
	$user_db 	= 'root';
	$pass_db	= '';
	$nama_db 	= 'motor';

mysql_connect($host_db,$user_db,$pass_db) or die ("Ada Masalah Di Koneksi!");
mysql_select_db($nama_db);

?>