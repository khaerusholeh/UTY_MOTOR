<?php

  $paket_kode    = autopk("PK");


  if(isset($_POST['Simpan'])){
        if($aksi=='edit'){
            $sql_query = mysql_query("UPDATE kredit_paket SET paket_harga_cash='".$_POST['paket_harga_cash']."', paket_uang_muka='".$_POST['paket_uang_muka']."', paket_jumlah_cicilan='".$_POST['paket_jumlah_cicilan']."', paket_bunga='".$_POST['paket_bunga']."', paket_nilai_cicilan='".$_POST['paket_nilai_cicilan']."' WHERE paket_kode='".$_POST['paket_kode']."'");
         }else{
             $sql_query = mysql_query("INSERT INTO kredit_paket VALUES ('".$_POST['paket_kode']."','".$_POST['paket_harga_cash']."','".$_POST['paket_uang_muka']."','".$_POST['paket_jumlah_cicilan']."','".$_POST['paket_bunga']."','".$_POST['paket_nilai_cicilan']."')") or die(mysql_error());      
         }
  }

  if($aksi=='hapus' && isset($id)){
     $sql_query   = mysql_query("DELETE FROM kredit_paket WHERE paket_kode='".$id."'");
  }

  if($aksi=='edit' && isset($id)){
      $sql_display    = mysql_query("SELECT *FROM kredit_paket WHERE paket_kode='".$id."'");
      $row_display    = mysql_fetch_assoc($sql_display);
  //    $kredit_tanggal   = $row_display['kredit_tanggal'];
      $paket_kode      = $row_display['paket_kode'];
      $hidden         = "hidden";
  }


  if($aksi=='hapus' && isset($sql_query)){
      echo "<script>alert('Delete Succesfully!');window.location='index.php?mod=paket'</script>";
  }elseif($sql_query){
      $respond = "<div class='respond'>Update/Insert Successfully</div>";
  }


?>


<div class='breadcumb'>
<a href='index.php?mod=dashboard'>Home</a> / <a href='index.php'>Halaman</a> / <a href='index.php?mod=paket'>Paket Kredit</a>
	<div class='garis'></div>
</div>
<?php
 echo $respond 
?>
<div class='isi'>
	<div class='isi-judul'><font>Paket Kredit</font><a href='index.php?mod=paket'><font>Lihat Data </font></a></div>
	<br>

<form id="form1" name="form1" method="post" action="">
<table width="900" cellspacing="0" id='input' border="0" align='center' cellpadding="0">

  <tr>
    <td width='300px'>Paket Kode</td>
    <td>:</td>
    <td ><span id="sprytextfield1">
              <input type='text' name='paket_kode' id='paket_kode' value=<?php echo '"'.$paket_kode.'"'?> readonly >
        <span class="textfieldRequiredMsg">A value is required.</span></span>
    </td>
  </tr>

  <tr>
    <td>Harga Cash</td>
    <td>:</td>
    <td><span id="sprytextfield2">
        <input type="text" required name='paket_harga_cash' id='paket_harga_cash'  value='<?php echo $row_display['paket_harga_cash'] ?>'  >
        <span class="textfieldRequiredMsg">A value is required.</span></span>
        </td>
  </tr>
  <tr>
    <td>Uang Muka</td>
    <td>:</td>
    <td><span id="sprytextfield3">
          <input type="text" required name='paket_uang_muka' id='paket_uang_muka'  value='<?php echo $row_display['paket_uang_muka'] ?>'  >
          <span class="textfieldRequiredMsg">A value is required.</span></span>
    </td>
  </tr>
    <tr>
    <td>Jumlah Cicilan</td>
    <td>:</td>
    <td><span id="sprytextfield4">
          <input type="text" required name='paket_jumlah_cicilan' id='paket_jumlah_cicilan'  value='<?php echo $row_display['paket_jumlah_cicilan'] ?>'  > 
          <span class="textfieldRequiredMsg">A value is required.</span></span>
    </td>
  </tr>
    <tr>
    <td>Bunga</td>
    <td>:</td>
    <td><span id="sprytextfield5">
          <input type="text" required name='paket_bunga' id='paket_bunga'  value='<?php echo $row_display['paket_bunga'] ?>'  > %
          <span class="textfieldRequiredMsg">A value is required.</span></span>
    </td>
  </tr>
  <tr>
    <td>Nilai Cicilan</td>
    <td>:</td>
    <td><span id="sprytextfield6">
          <input type="text" required name='paket_nilai_cicilan' id='paket_nilai_cicilan'  value='<?php echo $row_display['paket_nilai_cicilan'] ?>'  >
          <span class="textfieldRequiredMsg">A value is required.</span></span>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td ><input type="submit" name="Simpan" id="Simpan" value="Simpan" /></td>
  </tr>
</table>
</form>
</div>

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");

</script>