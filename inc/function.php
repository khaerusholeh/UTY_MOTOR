<?php

date_default_timezone_set("Asia/Jakarta");
$hariini = date("y/m/d");
$haricetak = date("Y-m-d");
function rupiah($nilai){
	$rupiah = "Rp.".number_format($nilai,2,',','.'); 
	return $rupiah;
}

function tglindo($nilai){
	$pecah 	= explode("-",$nilai);
	$hari   = $pecah[2];
	$bulan  = $pecah[1];
	$tahun 	= $pecah[0];
	$tglindo = "".$hari."-".$bulan."-".$tahun."";
	return $tglindo;
}

function autopk($kode){
	$rand 	= array_rand(array(1,2,3,4,5,6,7,8,9,0));
	$rand2 	= array_rand(array(1,2,3,4,5,6,7,8,9,0));
	$pk  	= "".date("dhis")."".$rand."".$rand2."";
	$autopk = $kode.$pk;
	return $autopk;
}

?>