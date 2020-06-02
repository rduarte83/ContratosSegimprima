var status = 1;

$(document).ready(function () {
    $("#table").DataTable({
        dom: 'Bfrtip',
        buttons: {
            buttons: [
                {extend: 'print', className: 'btn btn-success'},
                {extend: 'pdf', className: 'btn btn-success'},
                {extend: 'excel', className: 'btn btn-success'}
            ],
        },
        responsive: true,
        language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
    });
});

$(document).on('click', '#filtro', function (e) {
    if (status == 1) {
        status = 0;
        $("#table").hide();
        $("#table-filtered").show();
        alert(status);
    } else {
        status = 1;
        $("#table").show();
        $("#table-filtered").hide();
        alert(status);
    };
});


$(document).on('click', '#renew', function (e) {
    alert("RENOVAR!");
});

$(document).on('click', '#cancel', function (e) {
    alert("CANCELAR!");
});

<!-- Add user -->
$(document).on('click', '#btn-add', function (e) {
    var data = $("#user_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "php/save.php",
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $('#addModal').modal('hide');
                location.reload();
            } else if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});

$(document).on('click', '.update', function (e) {
    var id = $(this).attr("data-id");
    var cliente = $(this).attr("data-cliente");
    var sw = $(this).attr("data-sw");
    var contrato = $(this).attr("data-contrato");
    var valor = $(this).attr("data-valor");
    var period = $(this).attr("data-period");
    var data = $(this).attr("data-data");
    var modulos = $(this).attr("data-modulos");
    var postos = $(this).attr("data-postos");
    $('#id_u').val(id);
    $('#cliente_u').val(cliente);
    $('#sw_u').val(sw);
    $('#contrato_u').val(contrato);
    $('#valor_u').val(valor);
    $('#period_u').val(period);
    $('#data_u').val(data);
    $('#modulos_u').val(modulos);
    $('#postos_u').val(postos);
});

<!-- Update -->
$(document).on('click', '#update', function (e) {
    var data = $("#update_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "php/save.php",
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $('#editModal').modal('hide');
                location.reload();
            } else if (dataResult.statusCode == 201) {
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
        url: "php/save.php",
        type: "POST",
        cache: false,
        data: {
            type: 3,
            id: $("#id_d").val()
        },
        success: function (dataResult) {
            $('#deleteModal').modal('hide');
            $("#" + dataResult).remove();
        }
    });
});