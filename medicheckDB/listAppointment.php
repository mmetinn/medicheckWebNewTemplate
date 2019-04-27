<?php
	require "connection.php";
	$hasta_id=$_POST['hasta_id'];
	$mysql_qry="select * from randevular where hasta_id=".$hasta_id;
	$result=mysqli_query($conn,$mysql_qry);
	$array = "";
	while ($row=mysqli_fetch_array($result)) {
		$mysql_qry2="select * from doktorlar where id=".$row['doktor_id'];
		$result2=mysqli_query($conn,$mysql_qry2);
		$row2=mysqli_fetch_array($result2);
		$array.=trim($row2['doktor_adi'])."--".trim($row2['doktor_soyadi'])."--".trim($row["tarih"]."_");
	}
	$array.="listAppointment";
	echo trim($array);
	
 ?> 