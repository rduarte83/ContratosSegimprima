<?php
include('db.php');

if(isset($_POST["id"]))
{
    if($_POST['type']=='delete') {
        $statement = $conn->prepare(
            "DELETE FROM cs WHERE id = :id"
        );
        $result = $statement->execute(
            array(
                ':id'	=>	$_POST["id"]
            )
        );

        if(!empty($result))
        {
            echo 'Data Deleted';
        }
    }

    if($_POST['type']=='renew') {
        $statement = $conn->prepare(
            "UPDATE cs SET data = DATE_ADD(:data, INTERVAL 1 YEAR) WHERE id=:id"
        );
        $result = $statement->execute(
            array(
                ':id'	=>	$_POST["id"],
                ':data'	=>	$_POST["data"]
            )
        );
    }

    if($_POST['type']=='cancel') {
        $statement = $conn->prepare(
            "UPDATE cs SET estado = 'Inactivo' WHERE id=:id"
        );
        $result = $statement->execute(
            array(
                ':id'	=>	$_POST["id"]
            )
        );
    }
}