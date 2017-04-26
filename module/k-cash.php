<?php
$cash_tanggal = $hariini;
$cash_kode = autopk("CK");


if (isset($_POST['Simpan'])) {
    if ($aksi == 'edit') {
        $sql_query = mysql_query("UPDATE beli_cash SET pembeli_no_ktp='" . $_POST['pembeli_no_ktp'] . "', motor_kode='" . $_POST['motor_kode'] . "', cash_tanggal='" . $_POST['cash_tanggal'] . "', cash_bayar='" . $_POST['cash_bayar'] . "' WHERE cash_kode='" . $_POST['cash_kode'] . "'");
    } else {
        $sql_query = mysql_query("INSERT INTO beli_cash VALUES ('" . $_POST['cash_kode'] . "','" . $_POST['pembeli_no_ktp'] . "','" . $_POST['motor_kode'] . "','" . $_POST['cash_tanggal'] . "','" . $_POST['cash_bayar'] . "')") or die(mysql_error());
    }
}

if ($aksi == 'hapus' && isset($id)) {
    $sql_query = mysql_query("DELETE FROM beli_cash WHERE cash_kode='" . $id . "'");
}

if ($aksi == 'edit' && isset($id)) {
    $sql_display = mysql_query("SELECT *FROM beli_cash WHERE cash_kode='" . $id . "'");
    $row_display = mysql_fetch_assoc($sql_display);
    $cash_tanggal = $row_display['cash_tanggal'];
    $cash_kode = $row_display['cash_kode'];
    $hidden = "hidden";
}


if ($aksi == 'hapus' && isset($sql_query)) {
    echo "<script>alert('Delete Succesfully!');window.location='index.php?mod=cash'</script>";
} elseif ($sql_query) {
    $respond = "<div class='respond'>Update/Insert Successfully</div>";
}
?>


<div class='breadcumb'>
    <a href='index.php?mod=dashboard'>Home</a> / <a href='index.php'>Halaman</a> / <a href='index.php?mod=cash'>Pembelian Cash</a>
    <div class='garis'></div>
</div>
<?php
echo $respond
?>
<div class='isi'>
    <div class='isi-judul'><font>Pembelian Cash</font><a href='index.php?mod=cash'><font>Lihat Data </font></a></div>
    <br>

    <form id="form1" name="form1" method="post" action="">
        <table width="900" cellspacing="0" id='input' border="0" align='center' cellpadding="0">
            <tr>
                <td width='300px'>Kode Cash</td>
                <td>:</td>
                <td ><span id="sprytextfield1">
                        <input type='text' name='cash_kode' id='cash_kode' value=<?php echo '"' . $cash_kode . '"' ?> readonly >
                        <span class="textfieldRequiredMsg">A value is required.</span></span>
                </td>
            </tr>
            <tr>
                <td>No.KTP Pembeli</td>
                <td>:</td>
                <td>
                    <span id="spryselect1">
                        <select name="pembeli_no_ktp" id="pembeli_no_ktp">
                            <option value=<?php echo '"' . $row_display['pembeli_no_ktp'] . '"' . $hidden . '' ?> ><?php echo $row_display['pembeli_no_ktp'] ?>  </option>
<?php
$sql_list = mysql_query("SELECT *FROM pembeli");
while ($row_list = mysql_fetch_assoc($sql_list)) {
    echo "<option value='" . $row_list['pembeli_no_ktp'] . "'>" . $row_list['pembeli_no_ktp'] . "</option>";
}
?>
                        </select>
                        <span class="selectRequiredMsg">Please select an item.</span></span>

                </td>
            </tr>
            <tr>
                <td>Kode Motor</td>
                <td>:</td>
                <td>   <span id="spryselect2">
                        <select name="motor_kode" id="motor_kode">
                            <option value=<?php echo '"' . $row_display['motor_kode'] . '"' . $hidden . '' ?> ><?php echo $row_display['motor_kode'] ?>  </option>
<?php
$sql_list = mysql_query("SELECT *FROM motor");
while ($row_list = mysql_fetch_assoc($sql_list)) {
    echo "<option value='" . $row_list['motor_kode'] . "'>" . $row_list['motor_kode'] . "</option>";
}
?>
                        </select>
                        <span class="selectRequiredMsg">Please select an item.</span></span>
                </td>
            </tr>
            <tr>
                <td>Tanggal Cash</td>
                <td>:</td>
                <td><span id="sprytextfield2">
                        <input type="text" required name='cash_tanggal' id='cash_tanggal'  value='<?php echo $cash_tanggal ?>'  >
                        <span class="textfieldRequiredMsg">A value is required.</span></span>
                </td>
            </tr>
            <tr>
                <td>Jumlah Pembayaran</td>
                <td>:</td>
                <td><span id="sprytextfield3">
                        <input type="text" required name='cash_bayar' id='cash_bayar'  value='<?php echo $row_display['cash_bayar'] ?>'  >
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
    var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
    var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
</script>