<?php

  $kredit_tanggal = $hariini;
  $kredit_kode    = autopk("KK");

  if(isset($_POST['Simpan'])){
        if($aksi=='edit'){
            $sql_query = mysql_query("UPDATE beli_kredit SET pembeli_no_ktp='".$_POST['pembeli_no_ktp']."', paket_kode='".$_POST['paket_kode']."', motor_kode='".$_POST['motor_kode']."', kredit_tanggal='".$_POST['kredit_tanggal']."', fotokopi_ktp='".$_POST['fotokopi_ktp']."', fotokopi_kk='".$_POST['fotokopi_kk']."', fotokopi_slip_gaji='".$_POST['fotokopi_slip_gaji']."' WHERE kredit_kode='".$_POST['kredit_kode']."'");
         }else{
             $sql_query = mysql_query("INSERT INTO beli_kredit VALUES ('".$_POST['kredit_kode']."','".$_POST['pembeli_no_ktp']."','".$_POST['paket_kode']."','".$_POST['motor_kode']."','".$_POST['kredit_tanggal']."','".$_POST['fotokopi_ktp']."','".$_POST['fotokopi_kk']."','".$_POST['fotokopi_slip_gaji']."')") or die(mysql_error());
          }
  }

  if($aksi=='hapus' && isset($id)){
     $sql_query   = mysql_query("DELETE FROM beli_kredit WHERE kredit_kode='".$id."'");
  }

  if($aksi=='edit' && isset($id)){
      $sql_display    = mysql_query("SELECT *FROM beli_kredit WHERE kredit_kode='".$id."'");
      $row_display    = mysql_fetch_assoc($sql_display);
      $kredit_tanggal = $row_display['kredit_tanggal'];
      $kredit_kode    = $row_display['kredit_kode'];
      $hidden         = "hidden";
  }


  if($aksi=='hapus' && isset($sql_query)){
      echo "<script>alert('Delete Succesfully!');window.location='index.php?mod=kredit'</script>";
  }elseif($sql_query){
      $respond = "<div class='respond'>Update/Insert Successfully</div>";
  }




?>


<div class='breadcumb'>
<a href='index.php?mod=dashboard'>Home</a> / <a href='index.php'>Halaman</a> / <a href='index.php?mod=kredit'>Pembelian Kredit</a>
	<div class='garis'></div>
</div>
<?php
 echo $respond 
?>
<div class='isi'>
	<div class='isi-judul'><font>Pembelian Kredit</font><a href='index.php?mod=kredit'><font>Lihat Data </font></a></div>
	<br>

<form id="form1" name="form1" method="post" action="">
<table width="900" cellspacing="0" id='input' border="0" align='center' cellpadding="0">
  <tr>
    <td width='300px'>Kode Kredit</td>
    <td>:</td>
    <td ><span id="sprytextfield1">
              <input type='text' name='kredit_kode' id='kredit_kode' value=<?php echo '"'.$kredit_kode.'"' ?> readonly>
        <span class="textfieldRequiredMsg">A value is required.</span></span>
    </td>
  </tr>
  <tr>
    <td>No.KTP Pembeli</td>
    <td>:</td>
    <td>
       <span id="spryselect1">
      <select name="pembeli_no_ktp" id="pembeli_no_ktp">
           <option value=<?php echo '"'.$row_display['pembeli_no_ktp'].'"'.$hidden.'' ?> ><?php echo $row_display['pembeli_no_ktp'] ?>  </option>
      <?php 
          $sql_list = mysql_query("SELECT *FROM pembeli");
          while($row_list=mysql_fetch_assoc($sql_list)){
            echo "<option value='".$row_list['pembeli_no_ktp']."'>".$row_list['pembeli_no_ktp']."</option>";
          }
      ?>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span>

    </td>
  </tr>
  <tr>
    <td>Kode Paket</td>
    <td>:</td>
    <td>
       <span id="spryselect2">
      <select name="paket_kode" id="paket_kode">
           <option value=<?php echo '"'.$row_display['paket_kode'].'"'.$hidden.'' ?> ><?php echo $row_display['paket_kode'] ?>  </option>
      <?php 
          $sql_list = mysql_query("SELECT *FROM kredit_paket");
          while($row_list=mysql_fetch_assoc($sql_list)){
            echo "<option value='".$row_list['paket_kode']."'>".$row_list['paket_kode']."</option>";
          }
      ?>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span>

    </td>
  </tr>
  <tr>
    <td>Kode Motor</td>
    <td>:</td>
    <td>   <span id="spryselect3">
    <select name="motor_kode" id="motor_kode">
                <option value=<?php echo '"'.$row_display['motor_kode'].'"'.$hidden.'' ?> ><?php echo $row_display['motor_kode'] ?>  </option>
      <?php 
          $sql_list = mysql_query("SELECT *FROM motor");
          while($row_list=mysql_fetch_assoc($sql_list)){
            echo "<option value='".$row_list['motor_kode']."'>".$row_list['motor_kode']."</option>";
          }
      ?>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span>
      </td>
  </tr>
  <tr>
    <td>Tanggal Kredit</td>
    <td>:</td>
    <td><span id="sprytextfield2">
        <input type="text" name='kredit_tanggal' id='kredit_tanggal'  value='<?php echo $kredit_tanggal ?>'  >
        <span class="textfieldRequiredMsg">A value is required.</span></span>
        </td>
  </tr>
  <tr>
    <td>Fotokopi KTP</td>
    <td>:</td>
    <td>   <span id="spryselect4">
    <select name="fotokopi_ktp" id="fotokopi_ktp">
                <option value=<?php echo '"'.$row_display['fotokopi_ktp'].'"'.$hidden.'' ?> ><?php echo $row_display['fotokopi_ktp'] ?>  </option>
                <option value="Sudah">Sudah</option>
                <option value="Belum">Belum</option>

      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span>
      </td>
  </tr>

  <tr>
    <td>Fotokopi KK</td>
    <td>:</td>
    <td>   <span id="spryselect5">
    <select name="fotokopi_kk" id="fotokopi_kk">
                <option value=<?php echo '"'.$row_display['fotokopi_kk'].'"'.$hidden.'' ?> ><?php echo $row_display['fotokopi_kk'] ?>  </option>
                <option value="Sudah">Sudah</option>
                <option value="Belum">Belum</option>

      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span>
      </td>
  </tr>
  <tr>
    <td>Fotokopi Slip Gaji</td>
    <td>:</td>
    <td>   <span id="spryselect6">
    <select name="fotokopi_slip_gaji" id="fotokopi_slip_gaji">
                <option value=<?php echo '"'.$row_display['fotokopi_slip_gaji'].'"'.$hidden.'' ?> ><?php echo $row_display['fotokopi_slip_gaji'] ?>  </option>
                <option value="Sudah">Sudah</option>
                <option value="Belum">Belum</option>

      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span>
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
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
</script>