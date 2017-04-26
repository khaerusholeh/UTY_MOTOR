<?php


  $cari   = $_POST['cari'];



	$sql_display_1 	=mysql_query("SELECT *FROM beli_kredit WHERE kredit_kode  LIKE '%".$cari."%'");
  $hitung       = mysql_num_rows($sql_display_1);
    if($hitung >=1 && empty($kategori)){
      $kategori   = 'kredit';
      $sql        = $sql_display_1;
 
    }


  $sql_display_2  =mysql_query("SELECT *FROM motor WHERE motor_kode  LIKE '%".$cari."%'");  
  $hitung       = mysql_num_rows($sql_display_2);
    if($hitung>=1 && empty($kategori)){
      $kategori   = 'motor';
        $sql        = $sql_display_2; 
    }

  $sql_display_3  =mysql_query("SELECT *FROM kredit_paket WHERE paket_kode LIKE '%".$cari."%'");
  $hitung       = mysql_num_rows($sql_display_3);
    if($hitung >=1 && empty($kategori)){
      $kategori   = 'paket';
      $row  = mysql_fetch_assoc($sql_display);
            $sql        = $sql_display_3;
    }

  $sql_display_4  =mysql_query("SELECT *FROM pembeli  WHERE pembeli_no_ktp LIKE '%".$cari."%'");
  $hitung       = mysql_num_rows($sql_display_4);
    if($hitung >=1 && empty($kategori)){
      $kategori   = 'pembeli';
            $sql        = $sql_display_4;
   
    }


  $sql_display_5  =mysql_query("SELECT *FROM beli_cash  WHERE cash_kode LIKE '%".$cari."%'");
  $hitung       = mysql_num_rows($sql_display_5);
    if($hitung >=1 && empty($kategori)){
      $kategori   = 'cash';
            $sql        = $sql_display_5;
   
    }



  $sql_display_6  =mysql_query("SELECT *FROM bayar_cicilan  WHERE cicilan_kode LIKE '%".$cari."%'");
  $hitung       = mysql_num_rows($sql_display_6);
    if($hitung >=1 && empty($kategori)){
      $kategori   = 'cicilan';
            $sql        = $sql_display_6;
   
    }

?>

<div class='breadcumb'>
<a href='index.php?mod=dashboard'>Home</a> / <a href='index.php'>Halaman</a> / <a href='index.php?mod=cari'>Pencarian</a>
	<div class='garis'></div>
</div>

<div class='isi'>
          <div class='isi-judul'><font>Pencarian</font></a>
          </div>
<br>

<?php
  if($kategori=='kredit'){

?>


                <table width="900" id='display' align='center'  cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="145" scope="col">Kode Kredit</th>
                    <th width="190" scope="col">No.KTP</th>
                    <th width="190" scope="col">Kode Paket</th>
                    <th width="163" scope="col">Kode Motor</th>
                    <th width="188" scope="col">FK. KTP</th>
                    <th width="125" scope="col">FK. KK</th>
                    <th width="125" scope="col">FK. Slip Gaji</th>
                    <th width="87" scope="col">Aksi</th>
                  </tr>

                <?php while($row=mysql_fetch_assoc($sql)){ echo "
                  <tr align='center'>
                    <td>".$row['kredit_kode']."</td>
                    <td>".$row['pembeli_no_ktp']."</td>
                    <td>".$row['paket_kode']."</td>
                    <td>".$row['motor_kode']."</td>
                    <td>".$row['fotokopi_ktp']."</td>
                    <td>".$row['fotokopi_kk']."</td>
                    <td>".$row['fotokopi_slip_gaji']."</td>
                    <td>
                    	<a href='index.php?mod=kredit&aksi=edit&id=".$row['kredit_kode']."''>Edit</a>
                    	<a href='index.php?mod=kredit&aksi=hapus&id=".$row['kredit_kode']."''>Hapus</a>
                    	</td>
                  </tr>";
                  }
                ?>
                </table>


<?php
  }elseif($kategori=='motor'){

?>
        <table width="900" id='display' align='center'  cellspacing="0" cellpadding="0">
          <tr>
            <th width="145" scope="col">Kode Motor</th>
            <th width="190" scope="col">Merk</th>
            <th width="163" scope="col">Type</th>
            <th width="188" scope="col">Warna</th>
            <th width="188" scope="col">Harga</th>
            <th width="125" scope="col">Gambar</th>
            <th width="87" scope="col">Aksi</th>
          </tr>

        <?php while($row=mysql_fetch_assoc($sql)){ echo "
          <tr align='center'>
            <td>".$row['motor_kode']."</td>
            <td>".$row['motor_merk']."</td>
            <td>".$row['motor_type']."</td>
            <td>".$row['motor_warna_pilihan']."</td>
            <td>".$row['motor_harga']."</td>
            <td><img src='".$row['motor_gambar']."' width='40px' height='40px'></td>
            <td>
              <a href='index.php?mod=motor&aksi=edit&id=".$row['motor_kode']."''>Edit</a>
              <a href='index.php?mod=motor&aksi=hapus&id=".$row['motor_kode']."''>Hapus</a>
              </td>
          </tr>";
          }
        ?>
        </table>
<?php
  }elseif($kategori=='paket'){

?>
        <table width="900" id='display' align='center'  cellspacing="0" cellpadding="0">
          <tr>
            <th width="145" scope="col">Kode Paket</th>
            <th width="190" scope="col">Harga Cash</th>
            <th width="163" scope="col">Uang Muka</th>
            <th width="188" scope="col">Jumlah Cicilan</th>
            <th width="125" scope="col">Bunga</th>
            <th width="125" scope="col">Nilai Cicilan</th>
            <th width="87" scope="col">Aksi</th>
          </tr>

        <?php while($row=mysql_fetch_assoc($sql)){ echo "
          <tr align='center'>
            <td>".$row['paket_kode']."</td>
            <td>".rupiah($row['paket_harga_cash'])."</td>
            <td>".rupiah($row['paket_uang_muka'])."</td>
            <td>".$row['paket_jumlah_cicilan']."</td>
            <td>".$row['paket_bunga']."</td>
            <td>".rupiah($row['paket_nilai_cicilan'])."</td>
            <td>
              <a href='index.php?mod=paket&aksi=edit&id=".$row['paket_kode']."''>Edit</a>
              <a href='index.php?mod=paket&aksi=hapus&id=".$row['paket_kode']."''>Hapus</a>
              </td>
          </tr>";
          }
        ?>
        </table>

<?php
  }elseif($kategori=='pembeli'){

?>


        <table width="900" id='display' align='center'  cellspacing="0" cellpadding="0">
          <tr>
            <th width="145" scope="col">No. KTP</th>
            <th width="190" scope="col">Nama</th>
            <th width="163" scope="col">Alamat</th>
            <th width="188" scope="col">No.Telpon</th>
            <th width="125" scope="col">No.HP</th>

            <th width="87" scope="col">Aksi</th>
          </tr>

        <?php while($row=mysql_fetch_assoc($sql)){ echo "
          <tr align='center'>
            <td>".$row['pembeli_no_ktp']."</td>
            <td>".$row['pembeli_nama']."</td>
            <td>".$row['pembeli_alamat']."</td>
            <td>".$row['pembeli_telpon']."</td>
            <td>".$row['pembeli_hp']."</td>
            <td>
              <a href='index.php?mod=pembeli&aksi=edit&id=".$row['pembeli_no_ktp']."''>Edit</a>
              <a href='index.php?mod=pembeli&aksi=hapus&id=".$row['pembeli_no_ktp']."''>Hapus</a>
              </td>
          </tr>";
          }
        ?>
        </table>

<?php
  }elseif($kategori=='cash'){

?>


        <table width="900" id='display' align='center'  cellspacing="0" cellpadding="0">
          <tr>
            <th width="145" scope="col">Kode Cash</th>
            <th width="190" scope="col">Nama Pembeli</th>
            <th width="163" scope="col">Kode Motor</th>
            <th width="188" scope="col">Tanggal. Cash</th>
            <th width="125" scope="col">Jumlah. Bayar</th>
            <th width="87" scope="col">Aksi</th>
          </tr>

        <?php while($row=mysql_fetch_assoc($sql)){ echo "
          <tr align='center'>
            <td>".$row['cash_kode']."</td>
            <td>".$row['pembeli_nama']."</td>
            <td>".$row['motor_kode']."</td>
            <td>".tglindo($row['cash_tanggal'])."</td>
            <td>".rupiah($row['cash_bayar'])."</td>
            <td>
              <a href='index.php?mod=cash&aksi=edit&id=".$row['cash_kode']."''>Edit</a>
              <a href='index.php?mod=cash&aksi=hapus&id=".$row['cash_kode']."''>Hapus</a>
              </td>
          </tr>";
          }
        ?>
        </table>
<?php
  }elseif($kategori=='cicilan'){

?>
        <table width="900" id='display' align='center'  cellspacing="0" cellpadding="0">
          <tr>
            <th width="145" scope="col">Kode Cicilan</th>
            <th width="190" scope="col">Kode Kredit</th>
            <th width="163" scope="col">Tanggal Cicilan</th>
            <th width="163" scope="col">Jumlah Cicilan</th>
            <th width="188" scope="col">Cicilan Ke.</th>
            <th width="125" scope="col">Sisa</th>
            <th width="125" scope="col">Jumlah Sisa</th>
            <th width="87" scope="col">Aksi</th>
          </tr>

        <?php while($row=mysql_fetch_assoc($sql)){ echo "
          <tr align='center'>
            <td>".$row['cicilan_kode']."</td>
            <td>".$row['kredit_kode']."</td>
            <td>".$row['cicilan_tanggal']."</td>
            <td>".$row['cicilan_jumlah']."</td>
            <td>".$row['cicilan_ke']."</td>
            <td>".$row['cicilan_sisa_ke']."</td>
            <td>".$row['cicilan_sisa_harga']."</td>
            <td>
            
              <a href='index.php?mod=cicilan&aksi=hapus&id=".$row['cicilan_kode']."''>Hapus</a>
              </td>
          </tr>";
          }
        ?>
        </table>
  <?php
}

?>
</div>