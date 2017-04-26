<?php

  if(isset($_POST['Simpan'])){
        if($aksi=='edit'){
                if(empty($_POST['password'])){
                  $password   = $_POST['pwd'];
                }else{
                  $password   = $_POST['password'];
                }
            $sql_query = mysql_query("UPDATE user SET username='".htmlentities(trim($_POST['username']))."', password='".htmlentities(trim(md5($password)))."'WHERE id_user='".$_POST['id_user']."'");
         }else{
             $sql_query = mysql_query("INSERT INTO user (username,password) VALUES ('".htmlentities(trim($_POST['username']))."','".htmlentities(trim(md5($_POST['password'])))."')") or die(mysql_error());      
         }
  }

  if($aksi=='hapus' && isset($id)){
     $sql_query   = mysql_query("DELETE FROM user WHERE id_user='".$id."'");
  }

  if($aksi=='edit' && isset($id)){
      $sql_display    = mysql_query("SELECT *FROM user WHERE id_user='".$id."'");
      $row_display    = mysql_fetch_assoc($sql_display);
  //    $kredit_tanggal   = $row_display['kredit_tanggal'];
      $id_user      = $row_display['id_user'];
      $hidden         = "hidden";
  }


  if($aksi=='hapus' && isset($sql_query)){
      echo "<script>alert('Delete Succesfully!');window.location='index.php?mod=user'</script>";
  }elseif($sql_query){
      $respond = "<div class='respond'>Update/Insert Successfully</div>";
  }


?>


<div class='breadcumb'>
<a href='index.php?mod=dashboard'>Home</a> / <a href='index.php'>Halaman</a> / <a href='index.php?mod=user'>Data User</a>
	<div class='garis'></div>
</div>
<?php
 echo $respond 
?>
<div class='isi'>
	<div class='isi-judul'><font>Data User</font><a href='index.php?mod=user'><font>Lihat Data </font></a></div>
	<br>

<form id="form1" name="form1" method="post" action="">
<table width="900" cellspacing="0" id='input' border="0" align='center' cellpadding="0">


              <input type='text' name='id_user' id='id_user' value=<?php echo '"'.$id_user.'"'?> hidden >


  <tr>
    <td>Username </td>
    <td>:</td>
    <td><span id="sprytextfield2">
        <input type="text" required name='username' id='username'  value='<?php echo $row_display['username'] ?>'  >
        <span class="textfieldRequiredMsg">A value is required.</span></span>
        </td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td>
           <input type="text" required name='password' id='password'  >
          <input type="text" required name='pwd' id='pwd'  value='<?php echo $row_display['password'] ?>' hidden  >
         
    </td>


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