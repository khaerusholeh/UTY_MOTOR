<?php
session_start();
error_reporting(0);
require_once "inc/koneksi.php";

if (isset($_POST['sigin'])) {
    $username = htmlentities(trim($_POST['username']));
    $password = htmlentities(trim(md5($_POST['password'])));
    $sql_login = mysql_query("SELECT *FROM user WHERE username='" . $username . "' AND password='" . $password . "'");
    $log = mysql_num_rows($sql_login);

    $row_login = mysql_fetch_assoc($sql_login);
    if ($log == 1) {
        $_SESSION['username'] = $row_login['username'];
        $_SESSION['password'] = $row_login['password'];
        echo "<script>window.location='index.php?mod=dashboard';</script>";
    } else {
        $respond = "<script>alert('Login Failed!');</script>";
    }
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sistem Informasi Penjualan Motor</title>
        <link href='./asset/css/login.css' rel='stylesheet'>

    </head>
    <center>
        <form method="POST" action=''>
            <div id='login'>
                <div class='judul'><font>Login in to your account</font></div>
                <?php echo $respond ?>
                <table width="345" height="57" cellpadding="10" cellspacing="0">
                    <tr>
                        <td>Username</td>

                        <td><input type='text' name='username' id='username' placeholder='Username'></td>
                    </tr>
                    <tr>
                        <td>Password</td>

                        <td><input type='password' name='password' id='password' placeholder='Password'></td>
                    </tr>
                    <tr align='center'>
                        <td>&nbsp;</td>

                        <td><input type='submit' name='sigin' id='sigin' value='Login'></td>
                    </tr>
                </table>
        </form>
        <h5>Sistem Informasi Penjualan Motor</h5>


        </div>


        <body>


        </body>
</html>
