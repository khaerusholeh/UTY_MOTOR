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

	$sql_display 	=mysql_query("SELECT *FROM user LIMIT $mulaiawal,$batas");
?>

<div class='breadcumb'>
<a href='index.php?mod=dashboard'>Home</a> / <a href='index.php'>Halaman</a> / <a href='index.php?mod=user'>Data Pembeli</a>
	<div class='garis'></div>
</div>

<div class='isi'>
	<div class='isi-judul'><font>Data Pembeli</font><a href='index.php?mod=user&aksi=tambah'><font>+ Tambah </font></a>
         <a href='print.php?mod=user' style='margin-left:5px'><font> Cetak </font></a>
  </div>
	<br>

        <table width="900" id='display' align='center'  cellspacing="0" cellpadding="0">
          <tr>
            <th width="145" scope="col">Username</th>
            <th width="190" scope="col">Password</th>


            <th width="87" scope="col">Aksi</th>
          </tr>

        <?php while($row=mysql_fetch_assoc($sql_display)){ echo "
          <tr align='center'>
            <td>".$row['username']."</td>
            <td>----</td>

            <td>
            	<a href='index.php?mod=user&aksi=edit&id=".$row['id_user']."''>Edit</a>
            	<a href='index.php?mod=user&aksi=hapus&id=".$row['id_user']."''>Hapus</a>
            	</td>
          </tr>";
          }
        ?>
        </table>
<?php 
    $sqljumlahdata     = mysql_query("SELECT *FROM user");  
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
            echo "' href='index.php?mod=user&page=".$i."'>".$i."</a>";
          }

         echo "</div></center>";
    }
?>
</div>