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

	$sql_display 	=mysql_query("SELECT *FROM beli_cash INNER JOIN pembeli ON beli_cash.pembeli_no_ktp=pembeli.pembeli_no_ktp LIMIT $mulaiawal,$batas");
?>

<div class='breadcumb'>
<a href='index.php?mod=dashboard'>Home</a> / <a href='index.php'>Halaman</a> / <a href='index.php?mod=cash'>Pembelian Cash</a>
	<div class='garis'></div>
</div>

<div class='isi'>
	<div class='isi-judul'><font>Pembelian Cash</font>
        <a href='index.php?mod=cash&aksi=tambah'><font>+ Tambah </font></a>
        <a href='print.php?mod=cash' style='margin-left:5px'><font> Cetak </font></a>

  </div>
	<br>

        <table width="900" id='display' align='center'  cellspacing="0" cellpadding="0">
          <tr>
            <th width="145" scope="col">Kode Cash</th>
            <th width="190" scope="col">Nama Pembeli</th>
            <th width="163" scope="col">Kode Motor</th>
            <th width="188" scope="col">Tanggal. Cash</th>
            <th width="125" scope="col">Jumlah. Bayar</th>
            <th width="87" scope="col">Aksi</th>
          </tr>

        <?php while($row=mysql_fetch_assoc($sql_display)){ echo "
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
    $sqljumlahdata     = mysql_query("SELECT *FROM beli_cash");  
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
            echo "' href='index.php?mod=cash&page=".$i."'>".$i."</a>";
          }

         echo "</div></center>";
    }
?>
</div>