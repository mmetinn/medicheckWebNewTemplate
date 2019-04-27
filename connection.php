<?php
$link=@mysqli_connect("localhost","username","password") or die ("Sunucuya Bağlanamadık");
$sec=@mysqli_select_db($link,"medicheck") or die ("Veritabanı Seçilemedi");
?>
