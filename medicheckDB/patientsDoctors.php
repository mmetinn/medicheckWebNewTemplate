<?php
	require "connection.php";
	$hasta_id=$_POST['hastaId'];
	$mysql_qry="select * from hasta_doktor where hasta_id=".$hasta_id;
	$result=mysqli_query($conn,$mysql_qry);
	$array = "";
	while ($row=mysqli_fetch_array($result)) {
		$id=(int)$row['doktor_id'];
		$mysql_qry2="select * from doktorlar where id=".$id;
		$result2=mysqli_query($conn,$mysql_qry2);
		$row2=mysqli_fetch_array($result2);
		$array.=trim($row2['id'])."--".trim($row2['doktor_adi'])."--".trim($row2["doktor_soyadi"]."_");
	}
	$array.="patientsDoctors";
	echo trim($array);
	
 ?> 