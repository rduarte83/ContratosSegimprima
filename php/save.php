<?php
include 'database.php';

if(count($_POST)>0){
	if($_POST['type']==1){
		$cliente=$_POST['cliente'];
		$valor=$_POST['valor'];
		$modulos=$_POST['modulos'];
		$data=$_POST['data'];
		$sql = "INSERT INTO `crud`( `cliente`, `valor`,`modulos`,`data`) 
		VALUES ('$cliente','$valor','$modulos','$data')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['id'];
		$cliente=$_POST['cliente'];
		$valor=$_POST['valor'];
		$modulos=$_POST['modulos'];
		$data=$_POST['data'];
		$sql = "UPDATE `crud` SET `cliente`='$cliente',`valor`='$valor',`modulos`='$modulos',`data`='$data' WHERE id=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==3){
		$id=$_POST['id'];
		$sql = "DELETE FROM `crud` WHERE id=$id ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==4){
		$id=$_POST['id'];
		$sql = "DELETE FROM crud WHERE id in ($id)";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>