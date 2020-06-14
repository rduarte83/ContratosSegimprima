<?php include 'php/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Contratos Segimprima</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js"></script>

    <script type="text/javascript" src="script.js"></script>
</head>
<body>
<div class="container">




    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-md-5">
                    <h2>Contratos de Software</h2>
                </div>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="pix" autocomplete="off">Pix
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="zs" autocomplete="off">ZoneSoft
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="sage" autocomplete="off">Sage
                    </label>
                    <label class="btn btn-info active">
                        <input type="radio" name="options" id="def" autocomplete="off" checked>Limpar
                    </label>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-info" id="filtro" data-toggle="button">A expirar</button>
                </div>
            <div class="col-md-2">
                <a href="#addModal" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus-circle"></i>
                <span>Novo</span></a>
            </div>
        </div>
    </div>
    <table class="table table-striped table-hover" id="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Cliente</th>
            <th>Software</th>
            <th>Contrato</th>
            <th>Valor</th>
            <th>Periodicidade</th>
            <th>Data</th>
            <th>Módulos</th>
            <th>Extras</th>
            <th>Estado</th>
            <th>Operações</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>

<!-- Add Modal HTML -->
<div id="addModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="user_form" enctype="multipart/form-data">
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
                    <div class="form-group">
                        <label>Estado</label>
                        <br>
                        <select name="estado" id="estado">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" value="1" name="type">
                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                    <button type="submit" class="btn btn-success" id="btn-add">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<div id="editModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="update_form" enctype="multipart/form-data">
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
                    <div class="form-group">
                        <label>Contrato</label>
                        <br>
                        <select name="estado" id="estado_u">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="2" name="type">
                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                    <button type="submit" class="btn btn-info" id="update">Update</button>
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
                    <h4 class="modal-title">Eliminar Registo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_d" name="id" class="form-control">
                    <p>Tem a certeza que deseja eliminar este registo?</p>
                    <p class="text-warning"><small>Esta operação não pode ser revertida.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn" data-dismiss="modal" value="Cancel">
                    <button type="button" class="btn btn-danger" id="delete">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<footer class="page-footer">
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <img src="images/logo.png" alt="" id="logo">
    </div>

</footer>
</body>
</html>