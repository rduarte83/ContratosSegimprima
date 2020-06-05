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
        $postos=$_POST['postos'];
        $estado=$_POST['estado'];

        $sql = "INSERT INTO cs ( `cliente`,`sw`,`contrato`, `valor`,`period`,`data`,`modulos`,`postos`,`estado`) 
		VALUES ('$cliente','$sw','$contrato','$valor','$period','$data','$modulos','$postos','$estado')";
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
        $cliente=$_POST['cliente'];
        $sw=$_POST['sw'];
        $contrato=$_POST['contrato'];
        $valor=$_POST['valor'];
        $period=$_POST['period'];
        $data=$_POST['data'];
        $modulos=$_POST['modulos'];
        $postos=$_POST['postos'];
        $estado=$_POST['estado'];

        $sql = "UPDATE cs SET cliente='$cliente', sw='$sw', contrato='$contrato', valor='$valor', period='$period', data='$data', modulos='$modulos', postos='$postos', estado='$estado' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("statusCode" => 200));
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    if($_POST['type']==3) {
        $id=$_POST['id'];
        $sql = "DELETE FROM `cs` WHERE id=$id ";
        if (mysqli_query($conn, $sql)) {
            echo $id;
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    if($_POST['type']==4) {
        $id=$_POST['id'];
        $data=$_POST['data'];
        $sql = "UPDATE `cs` SET `data`= DATE_ADD('$data',INTERVAL 1 YEAR) WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo $id;
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    if($_POST['type']==5) {
        $id=$_POST['id'];
        $sql = "UPDATE `cs` SET `estado`= 'Inactivo' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo $id;
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}