<?php
include 'database.php';

if(count($_POST)>0){
    $cliente=$_POST['cliente'];
    $sw=$_POST['sw'];
    $contrato=$_POST['contrato'];
    $valor=$_POST['valor'];
    $period=$_POST['period'];
    $data=$_POST['data'];
    $modulos=$_POST['modulos'];
    $postos=$_POST['postos'];

    if($_POST['type']==1){
        $sql = "INSERT INTO crud ( `cliente`,`sw`,`contrato`, `valor`,`period`,`data`,`modulos`,`postos`) 
		VALUES ('$cliente','$sw','$contrato','$valor','$period','$data','$modulos','$postos')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}

    if($_POST['type']==2) {
        $id=$_POST['id'];
        $sql = "UPDATE crud SET cliente='$cliente', sw='$sw', contrato='$contrato', valor='$valor', period='$period', modulos='$modulos', data='$data', postos='$postos' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("statusCode" => 200));
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

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