<?php
	require "connection.php";

	$hasta_id=$_POST["hasta_id"];
	$doktor_id=$_POST["doktorId"];
	$mysql_qryCntrl="select * from hasta_doktor where doktor_id='".$doktor_id."' AND hasta_id='".$hasta_id."'";
	$res_cntrl=mysqli_query($link,$mysql_qryCntrl);
	//$row_cntrl=mysqli_fetch_array($res_cntrl);
	if(!mysqli_num_rows($res_cntrl)!=0){
		$mysql_qry="insert into  hasta_doktor (hasta_id,doktor_id) values ('$hasta_id','$doktor_id')";
		if($conn->query($mysql_qry)=== TRUE){
			echo "insert successful";
		}else{
			echo "Error: ".$mysql_qry."<br>".$conn->error;
		}
		$conn->close();
	}
 ?>
