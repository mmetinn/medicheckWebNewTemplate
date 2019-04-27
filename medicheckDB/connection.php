
 <?php
$link=@mysqli_connect("localhost","username","password") or die ("Sunucuya Bağlanamadık");
$sec=@mysqli_select_db($link,"medicheck") or die ("Veritabanı Seçilemedi");
 $db_name = "medicheck";
 $mysql_username="username";
 $mysql_password="password";
 $server_name="localhost";
 $conn=mysqli_connect($server_name,$mysql_username,$mysql_password,$db_name);
?>
