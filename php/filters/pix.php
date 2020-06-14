<?php
include('../db.php');
$output = array();
$query = "SELECT * FROM cs WHERE sw='Pix'";

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["id"];
    $sub_array[] = $row["cliente"];
    $sub_array[] = $row["sw"];
    $sub_array[] = $row["contrato"];
    $sub_array[] = $row["valor"];
    $sub_array[] = $row["period"];
    $sub_array[] = $row["data"];
    $sub_array[] = $row["modulos"];
    $sub_array[] = $row["postos"];
    $sub_array[] = $row["estado"];
    $sub_array[] = '<a href="#editModal" class="edit" data-id="' . $row["id"] . ' "data-data="' .$row["data"].'" data-toggle="modal">
                        <i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" title="Editar"></i>
                    </a>
                    <a href="#deleteModal" class="delete" data-id="' . $row["id"] . '" data-toggle="modal">
                        <i class="fa fa-times" aria-hidden="true" data-toggle="tooltip" title="Eliminar"></i>
                    </a>';
    $data[] = $sub_array;
}
$output = array(
    "data"	=>	$data
);
echo json_encode($output);
