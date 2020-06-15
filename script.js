var status = 1;
var datatable;

$(document).ready(function () {
    datatable = $("#table").DataTable({
        "processing": true,
        "ajax": {
            url: "php/fetch.php",
            type: "POST"
        },
        dom: 'Bfrtip',
        "columnDefs": [
            {"visible": false, "targets": 0}
        ],
        buttons: {
            buttons: [
                {
                    extend: 'print',
                    'text': '<i class="fa fa-print" aria-hidden="true"></i>',
                    "className": 'btn btn-default btn-xs'
                },
                {
                    extend: 'pdf',
                    'text': '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                    "className": 'btn btn-default btn-xs'
                },
                {
                    extend: 'excel',
                    'text': '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                    "className": 'btn btn-default btn-xs'
                }
            ],
        },
        responsive: true,
        language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
    });
});

$(document).on('click', '.btn-group-toggle input', function () {
    var id = $(this).attr("id");
    if (id == "def") datatable.ajax.url("php/fetch.php").load();
    else datatable.ajax.url("php/filters/" + id + ".php").load();
});


//<!-- Add user -->
$(document).on('submit', '#add_form', function () {
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "php/insert.php",
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});

$(document).on('click', '.edit', function () {
    var id = $(this).attr("data-id");
    var cliente = $(this).closest("tr").find("td:nth-child(1)").text();
    var sw = $(this).closest("tr").find("td:nth-child(2)").text();
    var contrato = $(this).closest("tr").find("td:nth-child(3)").text();
    var valor = $(this).closest("tr").find("td:nth-child(4)").text();
    var period = $(this).closest("tr").find("td:nth-child(5)").text();
    var data = $(this).attr("data-data");
    var modulos = $(this).closest("tr").find("td:nth-child(7)").text();
    var postos = $(this).closest("tr").find("td:nth-child(8)").text();
    var estado = $(this).closest("tr").find("td:nth-child(9)").text();

    $('#id_u').val(id);
    $('#cliente_u').val(cliente);
    $('#sw_u').val(sw);
    $('#contrato_u').val(contrato);
    $('#valor_u').val(valor);
    $('#period_u').val(period);
    $('#data_u').val(data);
    $('#modulos_u').val(modulos);
    $('#postos_u').val(postos);
    $('#estado_u').val(estado);
});

$(document).on('submit', '#edit_form', function () {
    $.ajax({
        type: "post",
        url: "php/update.php",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});

$(document).on("click", ".delete", function () {
    var id = $(this).attr("data-id");
    $('#id_d').val(id);
});

$(document).on("click", "#delete", function () {
    $.ajax({
        url: "php/queries.php",
        type: "POST",
        data: {
            type: "delete",
            id: $("#id_d").val()
        },
        success: function (dataResult) {
            $("#deleteModal").modal('hide');
            datatable.ajax.reload();
        }
    });
});

$(document).on('click', '#filtro', function () {
    if (status == 1) {
        status = 0;
        datatable.ajax.url("php/filters/filter.php").load();
        $(this).text("Todos");
    } else {
        status = 1;
        datatable.ajax.url("php/fetch.php").load();
        $("#filtro").text("A expirar");
    }
    ;
});

$(document).on("click", "#renew", function () {
    $.ajax({
        url: "php/queries.php",
        type: "POST",
        cache: false,
        data: {
            type: "renew",
            id: $(this).attr("data-id"),
            data: $(this).attr("data-data")
        },
        success: function (dataResult) {
            alert("Contrato Renovado!");
            location.reload();
        }
    });
});

$(document).on('click', '#cancel', function () {
    $.ajax({
        url: "php/queries.php",
        type: "POST",
        cache: false,
        data: {
            type: "cancel",
            id: $(this).attr("data-id"),
        },
        success: function (dataResult) {
            alert("Contrato Cancelado!");
            location.reload();
        }
    });
});