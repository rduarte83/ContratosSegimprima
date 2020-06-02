<!--TODO Inserir postos adicionais-->

<?php include 'php/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Contratos SW</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js"></script>

    <script type="text/javascript" src="script.js"></script>
</head>
<body>
    <img src="images/logo.png" alt="logo" id="logo" class="img-fluid mx-auto d-block mt-3">
<div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Contratos de Software</h2>
					</div>
                    <div class="col-sm-3">
                        <a href="#filterModal" class="btn btn-info" data-toggle="modal"></i> <span>Renovações</span></a>
                    </div>
                    <div class="col-sm-3">
                        <a href="#addModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Adicionar Contrato</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="table">
                <thead>
                    <tr>
						<th>ID</th>
                        <th>Cliente</th>
                        <th>Software</th>
                        <th>Contrato</th>
                        <th>Valor</th>
                        <th>Periodicidade</th>
						<th>Data</th>
                        <th>Modulos</th>
                        <th>Extras</th>
                        <th>Operações</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($conn,"SELECT * FROM crud");
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["id"]; ?>">
					<td><?php echo $row["id"]; ?></td>
					<td><?php echo $row["cliente"]; ?></td>
                    <td><?php echo $row["sw"]; ?></td>
                    <td><?php echo $row["contrato"]; ?></td>
					<td><?php echo $row["valor"];?> €</td>
                    <td><?php echo $row["period"];?></td>
					<td><?php echo $row["data"]; ?></td>
					<td><?php echo $row["modulos"]; ?></td>
                    <td><?php echo $row["postos"]; ?></td>
					<td>
						<a href="#editModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip"
                               data-id="<?php echo $row["id"]; ?>"
                               data-cliente="<?php echo $row["cliente"]; ?>"
                               data-sw="<?php echo $row["sw"]; ?>"
                               data-contrato="<?php echo $row["contrato"]; ?>"
                               data-valor="<?php echo $row["valor"]; ?>"
                               data-period="<?php echo $row["period"]; ?>"
                               data-data="<?php echo $row["data"]; ?>"
                               data-modulos="<?php echo $row["modulos"]; ?>"
                               data-postos="<?php echo $row["postos"]; ?>"
                               title="Edit">&#xE254;</i>
						</a>
						<a href="#deleteModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
				</tr>
				<?php
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
                            <label>Software</label>
                            <br>
                            <select name="sw" id="sw">
                                <option value="Pix">Pix</option>
                                <option value="ZoneSoft">ZoneSoft</option>
                                <option value="Sage">Sage</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Contrato</label>
                            <br>
                            <select name="contrato" id="contrato">
                                <option value="Compra">Compra</option>
                                <option value="Aluguer">Aluguer</option>
                            </select>
                        </div>
						<div class="form-group">
							<label>Valor</label>
							<input type="number" id="valor" name="valor" class="form-control" required>
						</div>
                        <div class="form-group">
                            <label>Periodicidade</label>
                            <br>
                            <select name="period" id="period">
                                <option value="Mensal">Mensal</option>
                                <option value="Trimestral">Trimestral</option>
                                <option value="Anual">Anual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Data</label>
                            <input type="date" id="data" name="data" class="form-control" required>
                        </div>
                        <div class="form-group">
							<label>Módulos</label>
							<input type="text" id="modulos" name="modulos" class="form-control" required>
						</div>
                        <div class="form-group">
                            <label>Postos Extra</label>
                            <input type="text" id="postos" name="postos" class="form-control" required>
                        </div>
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
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
                            <label>Software</label>
                            <br>
                            <select name="sw" id="sw_u">
                                <option value="Pix">Pix</option>
                                <option value="ZoneSoft">ZoneSoft</option>
                                <option value="Sage">Sage</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Contrato</label>
                            <br>
                            <select name="contrato" id="contrato_u">
                                <option value="Compra">Compra</option>
                                <option value="Aluguer">Aluguer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="number" id="valor_u" name="valor" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Periodicidade</label>
                            <br>
                            <select name="period" id="period_u">
                                <option value="Mensal">Mensal</option>
                                <option value="Trimestral">Trimestral</option>
                                <option value="Anual">Anual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Data</label>
                            <input type="date" id="data_u" name="data" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Módulos</label>
                            <input type="text" id="modulos_u" name="modulos" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Postos Extra</label>
                            <input type="number" id="postos_u" name="postos" class="form-control" required>
                        </div>
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
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
						<input type="button" class="btn" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    <!-- Filter Modal HTML -->
    <div id="filterModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Renovações</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-hover" id="table_filtered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Software</th>
                                <th>Contrato</th>
                                <th>Valor</th>
                                <th>Periodicidade</th>
                                <th>Data</th>
                                <th>Modulos</th>
                                <th>Extras</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $result = mysqli_query($conn,"SELECT * FROM crud WHERE DATA < (SELECT DATE_ADD(NOW(), INTERVAL 1 MONTH))");
                            while($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr id="<?php echo $row["id"]; ?>">
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["cliente"]; ?></td>
                                    <td><?php echo $row["sw"]; ?></td>
                                    <td><?php echo $row["contrato"]; ?></td>
                                    <td><?php echo $row["valor"];?> €</td>
                                    <td><?php echo $row["period"];?></td>
                                    <td><?php echo $row["data"]; ?></td>
                                    <td><?php echo $row["modulos"]; ?></td>
                                    <td><?php echo $row["postos"]; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>