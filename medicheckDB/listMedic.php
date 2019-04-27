<?php
	require "connection.php";
	$hasta_id=$_POST['hasta_id'];
	$mysql_qry="select * from hastalarin_ilaclari where hasta_id=".$hasta_id;
	$result=mysqli_query($conn,$mysql_qry);
	$array = "";
	while ($row=mysqli_fetch_array($result)) {
				
		$array.=trim($row['ilac_adi'])."--".trim($row['ilac_aciklama'])."--".trim($row["ilac_actok"])."--".trim($row["ilac_kacdefa"])."--".trim($row["ilac_sure"])."--".trim($row["ilac_foto"])."--".trim($row["id"])."_";
	}
	$array.="listMedic";
	echo trim($array);
	
 ?> 