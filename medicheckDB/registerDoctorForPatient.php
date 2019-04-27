<?php
	require "connection.php";

	$hasta_id=$_POST["hasta_id"];
	$doktorId=$_POST["doktorId"];

	$mysql_qry="insert into hasta_doktor (hasta_id,doktor_id) values ('$hasta_id','$doktorId')";
	if($conn->query($mysql_qry)=== TRUE){
		echo "insert successful";
	}else{
		echo "Error: ".$mysql_qry."<br>".$conn->error;
	}
	$conn->close();
 ?>
