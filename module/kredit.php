<?php
  
  $batas    = 10;
  if(!empty($page)){
        $nilaiawal  = $page-1;
        $mulaiawal  = $nilaiawal * $batas;
  }elseif($page==1){
        $mulaiawal  = 0;
  }else{
        $mulaiawal  = 0;
  }

	$sql_display 	=mysql_query("SELECT *FROM beli_kredit LIMIT $mulaiawal,$batas");
?>

<div class='breadcumb'>
<a href='index.php?mod=dashboard'>Home</a> / <a href='index.php'>Halaman</a> / <a href='index.php?mod=kredit'>Pembelian Kredit</a>
	<div class='garis'></div>
</div>

<div class='isi'>
	<div class='isi-judul'><font>Pembelian Kredit</font><a href='index.php?mod=kredit&aksi=tambah'><font>+ Tambah </font></a>
   <a href='print.php?mod=kredit' style='margin-left:5px'><font> Cetak </font></a>
  </div>
	<br>

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

        <?php while($row=mysql_fetch_assoc($sql_display)){ echo "
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
    $sqljumlahdata     = mysql_query("SELECT *FROM beli_kredit");  
    $jumlahdata        = mysql_num_rows($sqljumlahdata);

    if($jumlahdata > $batas){
          echo "<div class='pagination'><center>Halaman : ";
          $a    = explode(".", $jumlahdata/$batas);
          $b    = $a[0];
          $c    = $b + 1;
          for($i=1;$i<$c;$i++){
            echo "<a style='";
            if($i==$page){
              echo "font-weight : bold";
            }
            echo "' href='index.php?mod=kredit&page=".$i."'>".$i."</a>";
          }

         echo "</div></center>";
    }
?>
</div>