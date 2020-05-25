<?php
include 'database.php';

if(count($_POST)>0){
	if($_POST['type']==1){
		$cliente=$_POST['cliente'];
        $sw=$_POST['sw'];
        $contrato=$_POST['contrato'];
		$valor=$_POST['valor'];
        $period=$_POST['period'];
        $data=$_POST['data'];
		$modulos=$_POST['modulos'];
        $sql = "INSERT INTO crud ( `cliente`,`sw`,`contrato`, `valor`,`period`,`modulos`,`data`) 
		VALUES ('$cliente','$sw','$contrato','$valor','$period','$modulos','$data')";
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
        $sw=$_POST['sw'];
        $contrato=$_POST['contrato'];
		$valor=$_POST['valor'];
        $period=$_POST['period'];
		$data=$_POST['data'];
		$modulos=$_POST['modulos'];
		$sql = "UPDATE crud SET cliente='$cliente', sw='$sw', contrato='$contrato', valor='$valor', period='$period', modulos='$modulos', data='$data' WHERE id='$id'";
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