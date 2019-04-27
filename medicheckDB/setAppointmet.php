<?php
	require "connection.php";

	$hasta_id=$_POST["hasta_id"];
	$doktor_id=$_POST["doktor_id"];
	$appo_date=$_POST["appo_date"];
	

	$mysql_qry="insert into randevular (hasta_id,doktor_id,tarih) values ('$hasta_id','$doktor_id','$appo_date')";
	if($conn->query($mysql_qry)=== TRUE){
		echo "insert successful";
	}else{
		echo "Error: ".$mysql_qry."<br>".$conn->error;
	}
	$conn->close();
 ?> 