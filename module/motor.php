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

	$sql_display 	=mysql_query("SELECT *FROM motor LIMIT $mulaiawal,$batas");
?>

<div class='breadcumb'>
<a href='index.php?mod=dashboard'>Home</a> / <a href='index.php'>Halaman</a> / <a href='index.php?mod=motor'>Data Motor</a>
	<div class='garis'></div>
</div>

<div class='isi'>
	<div class='isi-judul'><font>Data Motor</font><a href='index.php?mod=motor&aksi=tambah'><font>+ Tambah </font></a>  
   <a href='print.php?mod=motor' style='margin-left:5px'><font> Cetak </font></a>
  </div>
	<br>

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

        <?php while($row=mysql_fetch_assoc($sql_display)){ echo "
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
    $sqljumlahdata     = mysql_query("SELECT *FROM motor");  
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
            echo "' href='index.php?mod=motor&page=".$i."'>".$i."</a>";
          }

         echo "</div></center>";
    }
?>
</div>