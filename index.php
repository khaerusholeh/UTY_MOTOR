<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:login.php');
}
error_reporting(0);
require_once "inc/koneksi.php";
require_once "inc/function.php";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sistem Informasi Penjualan Motor</title>
        <link href='./asset/css/style.css' rel='stylesheet'>
            <script src="./asset/js/SpryValidationSelect.js" type="text/javascript"></script>
            <script src="./asset/js/SpryValidationTextField.js" type="text/javascript"></script>
            <link href="./asset/css/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
            <link href="./asset/css/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
    </head>

    <body>

        <div id='header'>
            <div class='logo'><img src='./asset/images/logo.png'></div>
            <div class='line'></div>
            <form method="POST" class='cari' action="index.php?mod=cari">
                <input  type='text' name='cari'  placeholder='Pencarian' required>
            </form>
    <!--	<div class='date'>Tanggal 	: <?php echo date('d M Y'); ?></div> -->
            <a href='index.php?mod=keluar'>Keluar</a>
        </div>

        <?php
        $aksi = $_GET['aksi'];
        $mod = $_GET['mod'];
        $id = $_GET['id'];
        $page = $_GET['page'];
        switch ($mod) {
            case 'cash':
                $cash = 'background-color : #EDEDED';
                if ($aksi == 'edit' || $aksi == 'hapus' || $aksi == 'tambah') {
                    $content = './module/k-cash.php';
                } else {
                    $content = './module/cash.php';
                }
                break;
            case 'kredit':
                $kredit = 'background-color : #EDEDED';
                if ($aksi == 'edit' || $aksi == 'hapus' || $aksi == 'tambah') {
                    $content = './module/k-kredit.php';
                } else {
                    $content = './module/kredit.php';
                }
                break;
            case 'paket':
                $paket = 'background-color : #EDEDED';
                if ($aksi == 'edit' || $aksi == 'hapus' || $aksi == 'tambah') {
                    $content = './module/k-paket.php';
                } else {
                    $content = './module/paket.php';
                }
                break;
            case 'cicilan':
                $cicilan = 'background-color : #EDEDED';
                if ($aksi == 'edit' || $aksi == 'hapus' || $aksi == 'tambah') {
                    $content = './module/k-cicilan.php';
                } else {
                    $content = './module/cicilan.php';
                }
                break;
            case 'pembeli':
                $pembeli = 'background-color : #EDEDED';
                if ($aksi == 'edit' || $aksi == 'hapus' || $aksi == 'tambah') {
                    $content = './module/k-pembeli.php';
                } else {
                    $content = './module/pembeli.php';
                }
                break;
            case 'motor':
                $motor = 'background-color : #EDEDED';
                if ($aksi == 'edit' || $aksi == 'hapus' || $aksi == 'tambah') {
                    $content = './module/k-motor.php';
                } else {
                    $content = './module/motor.php';
                }
                break;
            case 'user':
                $user = 'background-color : #EDEDED';
                if ($aksi == 'edit' || $aksi == 'hapus' || $aksi == 'tambah') {
                    $content = './module/k-user.php';
                } else {
                    $content = './module/user.php';
                }
                break;
            case 'keluar':
                session_destroy();
                session_unset();
                header('location:login.php');
                break;
            case 'cari':
                $content = './module/cari.php';
                break;
            default:
                $active = 'background-color : #EDEDED';
                $content = './module/dashboard.php';
                break;
        }
        ?>
        <div id='side'>
            <div class='profile'>
                <a href='./asset/images/profile.jpg'><img src='./asset/images/profile.jpg' width='50px' height='50px'></a>
                <b>Administrator</b><br>
                    <font> administrator</font>
            </div>

            <div class='menu'>
                <ul>
                    <li style='<?php echo $active ?>'><a href='index.php?mod=dashboard' >Dashboard</a></li>
                    <li style='<?php echo $cash ?>'><a href='index.php?mod=cash'>Beli Cash</a></li>
                    <li style='<?php echo $kredit ?>'><a href='index.php?mod=kredit'>Beli Kredit</a></li>
                    <li style='<?php echo $cicilan ?>'><a href='index.php?mod=cicilan'>Bayar Cicilan</a></li>
                    <li style='<?php echo $paket ?>'><a href='index.php?mod=paket' >Paket Kredit</a></li>
                    <li style='<?php echo $pembeli ?>'><a href='index.php?mod=pembeli'>Pembeli</a></li>
                    <li style='<?php echo $motor ?>'><a href='index.php?mod=motor'>Motor</a></li>
                    <li style='<?php echo $user ?>'><a href='index.php?mod=user'>User Management</a></li>
                </ul>	
            </div>

            <div class='copyright'>
                <center><font>Sisfo Penjualan Motor © 2017<br> <?php base64_encode("ZWNobyAiPGEgaHJlZj0naHR0cHM6Ly9sdXFtYW4ud2ViLmlkJz5MdXFtYW4gRGV2ZWxvcG1lbnQ8L2E+Ijs=") ?></font></center>
            </div>
        </div>

        <div id='content'>
            <?php include $content ?>
        </div>


    </body>
</html>
