<?php
include "connection.php";
  $idim=$_POST['id'];
  echo "string".$idim;
  $sql="UPDATE hasta_doktor
    SET onay_durumu='onaylandi'
    WHERE id=".$idim;
    mysqli_query($link,$sql);
    header('Location: http://localhost/medicheck/patients_confirm_page.php');
?>
