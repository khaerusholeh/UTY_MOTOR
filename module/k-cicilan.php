<?php

  $cicilan_tanggal = $hariini;
  $cicilan_kode    = autopk("CC");

  if(isset($_POST['kredit_kode'])){
      $sql_change     = mysql_query("SELECT *FROM beli_kredit INNER JOIN kredit_paket ON (beli_kredit.paket_kode=kredit_paket.paket_kode) WHERE kredit_kode='".$_POST['kredit_kode']."'");
      $row_display    = mysql_fetch_assoc($sql_change);
      $cicilan_ke     = mysql_query("SELECT * FROM bayar_cicilan WHERE kredit_kode='".$_POST['kredit_kode']."'");
      $cicilan_ke     = mysql_num_rows($cicilan_ke);
      $cicilan_ke     = $cicilan_ke+1;
      $sisa_cicilan   =  $row_display['paket_jumlah_cicilan']-$cicilan_ke;
      $sisa_harga     = ($row_display['paket_nilai_cicilan']*$row_display['paket_jumlah_cicilan'])-($row_display['paket_nilai_cicilan']*$cicilan_ke);
  }


  if(isset($_POST['Simpan'])){
        if($aksi=='edit'){
            $sql_query = mysql_query("UPDATE bayar_cicilan SET kredit_kode='".$_POST['kredit_kode']."', cicilan_tanggal='".$_POST['cicilan_tanggal']."', cicilan_jumlah='".$_POST['cicilan_jumlah']."', cicilan_ke='".$_POST['cicilan_ke']."', cicilan_sisa_ke='".$_POST['cicilan_sisa_ke']."', cicilan_sisa_harga='".$_POST['cicilan_sisa_harga']."' WHERE cicilan_kode='".$_POST['cicilan_kode']."'");
         }else{
             $sql_query = mysql_query("INSERT INTO bayar_cicilan VALUES ('".$_POST['cicilan_kode']."','".$_POST['kredit_kode']."','".$_POST['cicilan_tanggal']."','".$_POST['cicilan_jumlah']."','".$_POST['cicilan_ke']."','".$_POST['cicilan_sisa_ke']."','".$_POST['cicilan_sisa_harga']."')") or die(mysql_error());      
         }
  }

  if($aksi=='hapus' && isset($id)){
     $sql_query   = mysql_query("DELETE FROM bayar_cicilan WHERE cicilan_kode='".$id."'");
  }
/*
  if($aksi=='edit' && isset($id)){
      $sql_display    = mysql_query("SELECT *FROM bayar_cicilan WHERE cicilan_kode='".$id."'");
      $row_display    = mysql_fetch_assoc($sql_display);
      $cicilan_tanggal   = $row_display['cicilan_tanggal'];
      $cicilan_kode    = $row_display['cicilan_kode'];
      $hidden         = "hidden";
  }
*/

  if($aksi=='hapus' && isset($sql_query)){
      echo "<script>alert('Delete Succesfully!');window.location='index.php?mod=cicilan'</script>";
  }elseif($sql_query){
      $respond = "<div class='respond'>Update/Insert Successfully</div>";
  }


?>


<div class='breadcumb'>
<a href='index.php?mod=dashboard'>Home</a> / <a href='index.php'>Halaman</a> / <a href='index.php?mod=cicilan'>Bayar Cicilan</a>
	<div class='garis'></div>
</div>
<?php
 echo $respond 
?>
<div class='isi'>
	<div class='isi-judul'><font>Bayar Cicilan</font><a href='index.php?mod=cicilan'><font>Lihat Data </font></a></div>
	<br>

<form id="form1" name="form1" method="post" action="">
<table width="900" cellspacing="0" id='input' border="0" align='center' cellpadding="0">
  <tr>
    <td width='300px'>Kode Cicilan</td>
    <td>:</td>
    <td ><span id="sprytextfield1">
              <input type='text' name='cicilan_kode' id='cicilan_kode' value=<?php echo '"'.$cicilan_kode.'"'?> readonly >
        <span class="textfieldRequiredMsg">A value is required.</span></span>
    </td>
  </tr>
  <tr>
    <td>Kode Kredit</td>
    <td>:</td>
    <td>
       <span id="spryselect1">
      <select name="kredit_kode" id="kredit_kode" onchange="this.form.submit();" value="">

      <?php 
          $sql_list = mysql_query("SELECT *FROM beli_kredit");
          while($row_list=mysql_fetch_assoc($sql_list)){
            echo "<option value='".$row_list['kredit_kode']."'>".$row_list['kredit_kode']."</option>";
          }
      ?>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span>

    </td>
  </tr>
  <tr>
    <td>Tanggal Cicilan</td>
    <td>:</td>
    <td><span id="sprytextfield2">
        <input type="text" required name='cicilan_tanggal' id='cicilan_tanggal'  value='<?php  echo $cicilan_tanggal ?>'  readonly >
        <span class="textfieldRequiredMsg">A value is required.</span></span>
        </td>
  </tr>
  <tr>
    <td>Jumlah Cicilan</td>
    <td>:</td>
    <td><span id="sprytextfield3">
        <input type="text" required name='cicilan_jumlah' id='cicilan_jumlah'  value='<?php echo $row_display['paket_nilai_cicilan'] ?>'  readonly >
        <span class="textfieldRequiredMsg">A value is required.</span></span>
        </td>
  </tr>
  <tr>
    <td>Cicilan Ke</td>
    <td>:</td>
    <td><span id="sprytextfield4">
        <input type="text" required name='cicilan_ke' id='cicilan_ke'  value='<?php echo $cicilan_ke ?>'  readonly>
        <span class="textfieldRequiredMsg">A value is required.</span></span>
        </td>
  </tr>
  <tr>
    <td>Sisa Cicilan</td>
    <td>:</td>
    <td><span id="sprytextfield5">
        <input type="text" required name='cicilan_sisa_ke' id='cicilan_sisa_ke'  value='<?php echo $sisa_cicilan ?>'  readonly >
        <span class="textfieldRequiredMsg">A value is required.</span></span>
        </td>
  </tr>
  <tr>
    <td>Sisa Harga Cicilan</td>
    <td>:</td>
    <td><span id="sprytextfield6">
        <input type="text" required name='cicilan_sisa_harga' id='cicilan_sisa_harga'  value='<?php echo  $sisa_harga ?>'readonly>
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
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");

</script>