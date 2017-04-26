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

	$sql_display 	=mysql_query("SELECT *FROM kredit_paket LIMIT $mulaiawal,$batas");
?>

<div class='breadcumb'>
<a href='index.php?mod=dashboard'>Home</a> / <a href='index.php'>Halaman</a> / <a href='index.php?mod=paket'>Paket Kredit</a>
	<div class='garis'></div>
</div>

<div class='isi'>
	<div class='isi-judul'><font>Paket Kredit</font><a href='index.php?mod=paket&aksi=tambah'><font>+ Tambah </font></a>
   <a href='print.php?mod=paket' style='margin-left:5px'><font> Cetak </font></a>
  </div>
	<br>

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

        <?php while($row=mysql_fetch_assoc($sql_display)){ echo "
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
    $sqljumlahdata     = mysql_query("SELECT *FROM kredit_paket");  
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
            echo "' href='index.php?mod=paket&page=".$i."'>".$i."</a>";
          }

         echo "</div></center>";
    }
?>
</div>