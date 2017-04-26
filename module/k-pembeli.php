<?php

  if(isset($_POST['Simpan'])){
        if($aksi=='edit'){
            $sql_query = mysql_query("UPDATE pembeli SET pembeli_nama='".$_POST['pembeli_nama']."', pembeli_alamat='".$_POST['pembeli_alamat']."', pembeli_telpon='".$_POST['pembeli_telpon']."', pembeli_hp='".$_POST['pembeli_hp']."' WHERE pembeli_no_ktp='".$_POST['pembeli_no_ktp']."'");
         }else{
             $sql_query = mysql_query("INSERT INTO pembeli VALUES ('".$_POST['pembeli_no_ktp']."','".$_POST['pembeli_nama']."','".$_POST['pembeli_alamat']."','".$_POST['pembeli_telpon']."','".$_POST['pembeli_hp']."')") or die(mysql_error());      
         }
  }

  if($aksi=='hapus' && isset($id)){
     $sql_query   = mysql_query("DELETE FROM pembeli WHERE pembeli_no_ktp='".$id."'");
  }

  if($aksi=='edit' && isset($id)){
      $sql_display    = mysql_query("SELECT *FROM pembeli WHERE pembeli_no_ktp='".$id."'");
      $row_display    = mysql_fetch_assoc($sql_display);
  //    $kredit_tanggal   = $row_display['kredit_tanggal'];
      $pembeli_no_ktp      = $row_display['pembeli_no_ktp'];
      $hidden         = "hidden";
  }


  if($aksi=='hapus' && isset($sql_query)){
      echo "<script>alert('Delete Succesfully!');window.location='index.php?mod=pembeli'</script>";
  }elseif($sql_query){
      $respond = "<div class='respond'>Update/Insert Successfully</div>";
  }


?>


<div class='breadcumb'>
<a href='index.php?mod=dashboard'>Home</a> / <a href='index.php'>Halaman</a> / <a href='index.php?mod=pembeli'>Data Pembeli</a>
	<div class='garis'></div>
</div>
<?php
 echo $respond 
?>
<div class='isi'>
	<div class='isi-judul'><font>Data Pembeli</font><a href='index.php?mod=pembeli'><font>Lihat Data </font></a></div>
	<br>

<form id="form1" name="form1" method="post" action="">
<table width="900" cellspacing="0" id='input' border="0" align='center' cellpadding="0">

  <tr>
    <td width='300px'>No. KTP</td>
    <td>:</td>
    <td ><span id="sprytextfield1">
              <input type='text' name='pembeli_no_ktp' id='pembeli_no_ktp' value=<?php echo '"'.$pembeli_no_ktp.'"'?> >
        <span class="textfieldRequiredMsg">A value is required.</span></span>
    </td>
  </tr>

  <tr>
    <td>Nama </td>
    <td>:</td>
    <td><span id="sprytextfield2">
        <input type="text" required required name='pembeli_nama' id='pembeli_nama'  value='<?php echo $row_display['pembeli_nama'] ?>'  >
        <span class="textfieldRequiredMsg">A value is required.</span></span>
        </td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><span id="sprytextfield3">
          <input type="text" required required name='pembeli_alamat' id='pembeli_alamat'  value='<?php echo $row_display['pembeli_alamat'] ?>'  >
          <span class="textfieldRequiredMsg">A value is required.</span></span>
    </td>
  </tr>
    <tr>
    <td>No. Telpon</td>
    <td>:</td>
    <td><span id="sprytextfield4">
          <input type="text" required required name='pembeli_telpon' id='pembeli_telpon'  value='<?php echo $row_display['pembeli_telpon'] ?>'  > 
          <span class="textfieldRequiredMsg">A value is required.</span></span>
    </td>
  </tr>
    <tr>
    <td>No. HP</td>
    <td>:</td>
    <td><span id="sprytextfield5">
          <input type="text" required required name='pembeli_hp' id='pembeli_hp'  value='<?php echo $row_display['pembeli_hp'] ?>'  > 
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


</script>