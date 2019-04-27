<?php
	require "connection.php";

	$hasta_id=$_POST["hasta_id"];
	$ilac_adi=$_POST["ilac_adi"];
	$ilac_aciklama=$_POST["ilac_aciklama"];
	$ilac_actok=$_POST["ilac_actok"];
	$ilac_kacdefa=$_POST["ilac_kacdefa"];
	$ilac_sure=$_POST["ilac_sure"];
	$dataStr=$_POST["dataStr"];		


	$mysql_qry="insert into hastalarin_ilaclari (hasta_id,ilac_adi,ilac_aciklama,ilac_actok,ilac_kacdefa,ilac_sure,ilac_foto) values ('$hasta_id','$ilac_adi','$ilac_aciklama','$ilac_actok','$ilac_kacdefa','$ilac_sure','$dataStr')";
	if($conn->query($mysql_qry)=== TRUE){
		echo "insert successful";
	}else{
		echo "Error: ".$mysql_qry."<br>".$conn->error;
	}
	$conn->close();
 ?>                                            