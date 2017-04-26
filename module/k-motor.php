<?php

  $motor_kode    = autopk("MK");


  if(isset($_POST['Simpan'])){
    if(!empty($_FILES['motor_gambar']['name'])){
        $nama_gambar    = autopk();
        $ext            = explode(".",$_FILES['motor_gambar']['name']);
        $ext            = $ext[1];
        $nama_file      = "./upload/".$nama_gambar.".".$ext."";
        move_uploaded_file($_FILES['motor_gambar']['tmp_name'],  $nama_file);
        $motor_gambar   = $nama_file;
    }else{
        $motor_gambar   = $_POST['gbr'];
    }

        if($aksi=='edit'){

            $sql_query = mysql_query("UPDATE motor SET motor_merk='".$_POST['motor_merk']."', motor_type='".$_POST['motor_type']."', motor_warna_pilihan='".$_POST['motor_warna_pilihan']."', motor_harga='".$_POST['motor_harga']."', motor_gambar='".$motor_gambar."' WHERE motor_kode='".$_POST['motor_kode']."'") or die(mysql_error());
         }else{
             $sql_query = mysql_query("INSERT INTO motor VALUES ('".$_POST['motor_kode']."','".$_POST['motor_merk']."','".$_POST['motor_type']."','".$_POST['motor_warna_pilihan']."','".$_POST['motor_harga']."','".$motor_gambar."')") or die(mysql_error());      
         }
  }

  if($aksi=='hapus' && isset($id)){
     $sql_query   = mysql_query("DELETE FROM motor WHERE motor_kode='".$id."'");
  }

  if($aksi=='edit' && isset($id)){
      $sql_display    = mysql_query("SELECT *FROM motor WHERE motor_kode='".$id."'");
      $row_display    = mysql_fetch_assoc($sql_display);
  //    $kredit_tanggal   = $row_display['kredit_tanggal'];
      $motor_kode      = $row_display['motor_kode'];
      $hidden         = "hidden";
  }


  if($aksi=='hapus' && isset($sql_query)){
      echo "<script>alert('Delete Succesfully!');window.location='index.php?mod=motor'</script>";
  }elseif($sql_query){
      $respond = "<div class='respond'>Update/Insert Successfully</div>";
  }


?>


<div class='breadcumb'>
<a href='index.php?mod=dashboard'>Home</a> / <a href='index.php'>Halaman</a> / <a href='index.php?mod=motor'>Data Motor</a>
	<div class='garis'></div>
</div>
<?php
 echo $respond 
?>
<div class='isi'>
	<div class='isi-judul'><font>Data Motor</font><a href='index.php?mod=motor'><font>Lihat Data </font></a></div>
	<br>

<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<table width="900" cellspacing="0" id='input' border="0" align='center' cellpadding="0">

  <tr>
    <td width='300px'>Kode Motor</td>
    <td>:</td>
    <td ><span id="sprytextfield1">
              <input type='text' name='motor_kode' id='motor_kode' value=<?php echo '"'.$motor_kode.'"'?> readonly >
        <span class="textfieldRequiredMsg">A value is required.</span></span>
    </td>
  </tr>

  <tr>
    <td>Merk</td>
    <td>:</td>
    <td><span id="sprytextfield2">
        <input type="text" required name='motor_merk' id='motor_merk'  value='<?php echo $row_display['motor_merk'] ?>'  >
        <span class="textfieldRequiredMsg">A value is required.</span></span>
        </td>
  </tr>
  <tr>
    <td>Tipe</td>
    <td>:</td>
    <td><span id="sprytextfield3">
          <input type="text" required name='motor_type' id='motor_type'  value='<?php echo $row_display['motor_type'] ?>'  >
          <span class="textfieldRequiredMsg">A value is required.</span></span>
    </td>
  </tr>
    <tr>
    <td>Warna</td>
    <td>:</td>
    <td><span id="sprytextfield4">
          <input type="text" required name='motor_warna_pilihan' id='motor_warna_pilihan'  value='<?php echo $row_display['motor_warna_pilihan'] ?>'  > 
          <span class="textfieldRequiredMsg">A value is required.</span></span>
    </td>
  </tr>
    <tr>
    <td>Harga</td>
    <td>:</td>
    <td><span id="sprytextfield5">
          <input type="text" required name='motor_harga' id='motor_harga'  value='<?php echo $row_display['motor_harga'] ?>'  > 
          <span class="textfieldRequiredMsg">A value is required.</span></span>
    </td>
  </tr>
  <tr>
    <td>Gambar</td>
    <td>:</td>
    <td>
          <input type="file" name='motor_gambar' id='motor_gambar'>
          <input type="text" required name='gbr' id='gbr'  value='<?php echo $row_display['motor_gambar'] ?>' hidden >
         
         
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