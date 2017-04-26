
<link href='./asset/css/print.css' rel='stylesheet'>
<?php

include "./inc/function.php";
include "./inc/koneksi.php";



$mod  = $_GET['mod'];
 if($mod=='cicilan'){ 
    $sql_display    =mysql_query("SELECT *FROM bayar_cicilan");
?>
<div style='judul'>
  <b> Data          : </b>Cicilan<br>
  <b> Tanggal Cetak : </b><?php echo tglindo($haricetak) ?>
</div>
        <table width="900" id='display' align='center'  cellspacing="0" cellpadding="0">
          <tr>
            <th width="145" scope="col">Kode Cicilan</th>
            <th width="190" scope="col">Kode Kredit</th>
            <th width="163" scope="col">Tanggal Cicilan</th>
            <th width="163" scope="col">Jumlah Cicilan</th>
            <th width="188" scope="col">Cicilan Ke.</th>
            <th width="125" scope="col">Sisa</th>
            <th width="125" scope="col">Jumlah Sisa</th>
          </tr>

        <?php while($row=mysql_fetch_assoc($sql_display)){ echo "
          <tr align='center'>
            <td>".$row['cicilan_kode']."</td>
            <td>".$row['kredit_kode']."</td>
            <td>".$row['cicilan_tanggal']."</td>
            <td>".$row['cicilan_jumlah']."</td>
            <td>".$row['cicilan_ke']."</td>
            <td>".$row['cicilan_sisa_ke']."</td>
            <td>".$row['cicilan_sisa_harga']."</td></tr>";
          }
        ?>
        </table>
<?php 
}elseif($mod=='cash'){
      $sql_display    =mysql_query("SELECT *FROM beli_cash");
?>
<div style='judul'>
  <b> Data          : </b>Beli Cash<br>
  <b> Tanggal Cetak : </b><?php echo tglindo($haricetak) ?>
</div>
      <table width="900" id='display' align='center'  cellspacing="0" cellpadding="0">
          <tr>
            <th width="145" scope="col">Kode Cash</th>
            <th width="190" scope="col">No. KTP Pembeli</th>
            <th width="163" scope="col">Kode Motor</th>
            <th width="188" scope="col">Tanggal. Cash</th>
            <th width="125" scope="col">Jumlah. Bayar</th>

          </tr>

        <?php while($row=mysql_fetch_assoc($sql_display)){ echo "
          <tr align='center'>
            <td>".$row['cash_kode']."</td>
            <td>".$row['pembeli_no_ktp']."</td>
            <td>".$row['motor_kode']."</td>
            <td>".tglindo($row['cash_tanggal'])."</td>
            <td>".rupiah($row['cash_bayar'])."</td>

          </tr>";
          }
        ?>
        </table>
<?php 
}elseif($mod=='motor'){
      $sql_display    =mysql_query("SELECT *FROM motor");
?>
<div style='judul'>
  <b> Data          : </b>Motor<br>
  <b> Tanggal Cetak : </b><?php echo tglindo($haricetak) ?>
</div>
        <table width="900" id='display' align='center'  cellspacing="0" cellpadding="0">
          <tr>
            <th width="145" scope="col">Kode Motor</th>
            <th width="190" scope="col">Merk</th>
            <th width="163" scope="col">Type</th>
            <th width="188" scope="col">Warna</th>
            <th width="188" scope="col">Harga</th>
            <th width="125" scope="col">Gambar</th>

          </tr>

        <?php while($row=mysql_fetch_assoc($sql_display)){ echo "
          <tr align='center'>
            <td>".$row['motor_kode']."</td>
            <td>".$row['motor_merk']."</td>
            <td>".$row['motor_type']."</td>
            <td>".$row['motor_warna_pilihan']."</td>
            <td>".$row['motor_harga']."</td>
            <td><img src='.".$row['motor_gambar']."' width =30px height=30px></td>

          </tr>";
          }
        ?>
        </table>

<?php 
}elseif($mod=='kredit'){
      $sql_display    =mysql_query("SELECT *FROM beli_kredit");
?>
<div style='judul'>
  <b> Data          : </b>Beli Kredit<br>
  <b> Tanggal Cetak : </b><?php echo tglindo($haricetak) ?>
</div>
        <table width="900" id='display' align='center'  cellspacing="0" cellpadding="0">
          <tr>
            <th width="145" scope="col">Kode Kredit</th>
            <th width="190" scope="col">No.KTP</th>
            <th width="190" scope="col">Kode Paket</th>
            <th width="163" scope="col">Kode Motor</th>
            <th width="188" scope="col">FK. KTP</th>
            <th width="125" scope="col">FK. KK</th>
            <th width="125" scope="col">FK. Slip Gaji</th>

          </tr>

        <?php while($row=mysql_fetch_assoc($sql_display)){ echo "
          <tr align='center'>
            <td>".$row['kredit_kode']."</td>
            <td>".$row['pembeli_no_ktp']."</td>
            <td>".$row['paket_kode']."</td>
            <td>".$row['motor_kode']."</td>
            <td>".$row['fotokopi_ktp']."</td>
            <td>".$row['fotokopi_kk']."</td>
            <td>".$row['fotokopi_slip_gaji']."</td>

          </tr>";
          }
        ?>
        </table>
<?php 
}elseif($mod=='paket'){
      $sql_display    =mysql_query("SELECT *FROM kredit_paket");
?>
       <div style='judul'>
  <b> Data          : </b>Paket Kredit<br>
  <b> Tanggal Cetak : </b><?php echo tglindo($haricetak) ?>
</div>
        <table width="900" id='display' align='center'  cellspacing="0" cellpadding="0">
          <tr>
            <th width="145" scope="col">Kode Paket</th>
            <th width="190" scope="col">Harga Cash</th>
            <th width="163" scope="col">Uang Muka</th>
            <th width="188" scope="col">Jumlah Cicilan</th>
            <th width="125" scope="col">Bunga</th>
            <th width="125" scope='col'>Sisa Cicilan</th>

          </tr>

        <?php while($row=mysql_fetch_assoc($sql_display)){ echo "
          <tr align='center'>
            <td>".$row['paket_kode']."</td>
            <td>".rupiah($row['paket_harga_cash'])."</td>
            <td>".rupiah($row['paket_uang_muka'])."</td>
            <td>".$row['paket_jumlah_cicilan']."</td>
            <td>".$row['paket_bunga']."</td>
            <td>".rupiah($row['paket_nilai_cicilan'])."</td>

          </tr>";
          }
        ?>
        </table>
<?php 
}elseif($mod=='pembeli'){
      $sql_display    =mysql_query("SELECT *FROM pembeli");
?>

<div style='judul'>
  <b> Data          : </b>Pembeli<br>
  <b> Tanggal Cetak : </b><?php echo tglindo($haricetak) ?>
</div>
        <table width="900" id='display' align='center'  cellspacing="0" cellpadding="0">
          <tr>
            <th width="145" scope="col">No. KTP</th>
            <th width="190" scope="col">Nama</th>
            <th width="163" scope="col">Alamat</th>
            <th width="188" scope="col">No.Telpon</th>
            <th width="125" scope="col">No.HP</th>

          </tr>

        <?php while($row=mysql_fetch_assoc($sql_display)){ echo "
          <tr align='center'>
            <td>".$row['pembeli_no_ktp']."</td>
            <td>".$row['pembeli_nama']."</td>
            <td>".$row['pembeli_alamat']."</td>
            <td>".$row['pembeli_telpon']."</td>
            <td>".$row['pembeli_hp']."</td>

          </tr>";
          }
        ?>
        </table>
<?php }
?>

<script>
window.print();
</script>
  