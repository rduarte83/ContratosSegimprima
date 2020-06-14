<?php
include('db.php');

$query = "
			INSERT INTO cs ( `cliente`,`sw`,`contrato`, `valor`,`period`,`data`,`modulos`,`postos`,`estado`) 
			VALUES (:cliente, :sw, :contrato, :valor, :period, :data, :modulos, :postos, :estado)
		";

$statement = $conn->prepare($query);
$result = $statement->execute(
    array(
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
    echo 'Data Inserted';
}