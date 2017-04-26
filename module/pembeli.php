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

	$sql_display 	=mysql_query("SELECT *FROM pembeli LIMIT $mulaiawal,$batas");
?>

<div class='breadcumb'>
<a href='index.php?mod=dashboard'>Home</a> / <a href='index.php'>Halaman</a> / <a href='index.php?mod=pembeli'>Data Pembeli</a>
	<div class='garis'></div>
</div>

<div class='isi'>
	<div class='isi-judul'><font>Data Pembeli</font><a href='index.php?mod=pembeli&aksi=tambah'><font>+ Tambah </font></a>
         <a href='print.php?mod=pembeli' style='margin-left:5px'><font> Cetak </font></a>
  </div>
	<br>

        <table width="900" id='display' align='center'  cellspacing="0" cellpadding="0">
          <tr>
            <th width="145" scope="col">No. KTP</th>
            <th width="190" scope="col">Nama</th>
            <th width="163" scope="col">Alamat</th>
            <th width="188" scope="col">No.Telpon</th>
            <th width="125" scope="col">No.HP</th>

            <th width="87" scope="col">Aksi</th>
          </tr>

        <?php while($row=mysql_fetch_assoc($sql_display)){ echo "
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
    $sqljumlahdata     = mysql_query("SELECT *FROM pembeli");  
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
            echo "' href='index.php?mod=pembeli&page=".$i."'>".$i."</a>";
          }

         echo "</div></center>";
    }
?>
</div>