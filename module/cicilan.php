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

	$sql_display 	=mysql_query("SELECT *FROM bayar_cicilan LIMIT $mulaiawal,$batas");
?>

<div class='breadcumb'>
<a href='index.php?mod=dashboard'>Home</a> / <a href='index.php'>Halaman</a> / <a href='index.php?mod=cicilan'>Bayar Cicilan</a>
	<div class='garis'></div>
</div>

<div class='isi'>
	<div class='isi-judul'><font>Bayar Cicilan</font>
        <a href='index.php?mod=cicilan&aksi=tambah'><font>+ Tambah </font></a>
        <a href='print.php?mod=cicilan' style='margin-left:5px'><font> Cetak </font></a>

  </div>
	<br>

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

        <?php while($row=mysql_fetch_assoc($sql_display)){ echo "
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
    $sqljumlahdata     = mysql_query("SELECT *FROM bayar_cicilan");  
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
            echo "' href='index.php?mod=cicilan&page=".$i."'>".$i."</a>";
          }

         echo "</div></center>";
    }
?>
</div>