$('#Cerrar').click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "php/cerrar-sesion.php",
        success: function (response) {
            location.href = 'index.php';
        }
    });
});

$('#Departamento').change(function (e) {
    e.preventDefault();
    IdDepartamento = $(this).val();
    $('#Distrito').find('option').remove().end().append('<option value="" selected>Seleccione</option>');
    $('#Departamento').each(function () {
        $.post("php/provincias.php", {
                IdDepartamento: IdDepartamento
            },
            function (data) {
                $('#Provincia').html(data);
            });
    });
});

$('#Provincia').change(function (e) {
    e.preventDefault();
    $("#Provincia").each(function () {
        IdProvincia = $(this).val();
        $.post("php/distritos.php", {
            IdProvincia: IdProvincia
        }, function (data) {
            $("#Distrito").html(data);
        });
    });
});