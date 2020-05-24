<?php include 'php/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Contratos SW</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Contratos Software</h2>
					</div>
					<div class="col-sm-6">
						<a href="#addModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Adicionar Contrato</span></a>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="table">
                <thead>
                    <tr>
						<th>ID</th>
                        <th>Cliente</th>
                        <th>Valor</th>
						<th>Data</th>
                        <th>Modulos</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($conn,"SELECT * FROM crud");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["id"]; ?>">
					<td><?php echo $i; ?></td>
					<td><?php echo $row["cliente"]; ?></td>
					<td><?php echo $row["valor"];?> €</td>
					<td><?php echo $row["data"]; ?></td>
					<td><?php echo $row["modulos"]; ?></td>
					<td>
						<a href="#editModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row["id"]; ?>"
							data-cliente="<?php echo $row["cliente"]; ?>"
							data-valor="<?php echo $row["valor"]; ?>"
							data-data="<?php echo $row["data"]; ?>"
							data-modulos="<?php echo $row["modulos"]; ?>"
							title="Edit">&#xE254;</i>
						</a>
						<a href="#deleteModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                                                                                                         title="Delete">&#xE872;</i></a>
                    </td>
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
    </div>
	<!-- Add Modal HTML -->
	<div id="addModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form">
					<div class="modal-header">						
						<h4 class="modal-title">Adicionar Contrato</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Cliente</label>
							<input type="text" id="cliente" name="cliente" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Valor</label>
							<input type="text" id="valor" name="valor" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Módulos</label>
							<input type="text" id="modulos" name="modulos" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Data</label>
							<input type="text" id="data" name="data" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-success" id="btn-add">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Editar Contrato</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>					
						<div class="form-group">
							<label>Cliente</label>
							<input type="text" id="cliente_u" name="cliente" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Valor</label>
							<input type="email" id="valor_u" name="valor" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Data</label>
							<input type="text" id="data_u" name="data" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Módulos</label>
							<input type="text" id="modulos_u" name="modulos" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title">Delete User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>Are you sure you want to delete this Record?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>                                		                            