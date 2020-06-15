<?php
include('db.php');

$statement = $conn->prepare("
			UPDATE cs SET cliente=:cliente, sw=:sw, contrato=:contrato, valor=:valor, 
			period=:period, data=:data, modulos=:modulos, postos=:postos, estado=:estado
			WHERE id=:id		
					");
$result = $statement->execute(
    array(
        ':id'	    =>	$_POST["id"],
        ':cliente'	=>	$_POST["cliente"],
        ':sw'	    =>	$_POST["sw"],
        ':contrato'	=>	$_POST["contrato"],
        ':valor'	=>	$_POST["valor"],
        ':period'	=>	$_POST["period"],
        ':data'	    =>	$_POST["data"],
        ':modulos'	=>	$_POST["modulos"],
        ':postos'	=>	$_POST["postos"],
        ':estado'	=>	$_POST["estado"]
    )
);
if(!empty($result))
{
    echo 'Data Updated';
}