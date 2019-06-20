$('#Buscar').click(function (e) { 
    e.preventDefault();
    var Proyecto = $('#Proyecto').val();
    var Estado = $('#Estado').val();
    var Modalidad = $('#Modalidad').val();
    var Periodo = $('#Periodo').val();
    var Departamento = $('#Departamento').val();
    var Provincia = $('#Provincia').val();
    var Distrito = $('#Distrito').val();

    if(Proyecto == '') {
        Proyecto = null;
    }
    $.ajax({
        type: "POST",
        url: "php/filtrar-proy.php",
        data: {Proyecto: Proyecto, Estado: Estado, Modalidad: Modalidad, Periodo: Periodo, Departamento: Departamento, Provincia: Provincia, Distrito: Distrito},
        success: function (response) {
            $('#Contenido').html(response);
            addAEvent();
        }
    });
});

$('#Todo').click(function (e) { 
    e.preventDefault();
    location.reload();
});

$('.ver').click(function (e) { 
    e.preventDefault();
    IdProyecto = $(this).data('id');
    // console.log(IdPrecioVenta);
    $.ajax({
        type: "POST",
        url: "detalle-proy.php",
        data: { IdProyecto: IdProyecto },
        success: function (response) {
            $(location).attr('href', 'detalle-proy.php');
        }
    });
});

function addAEvent() {
    $('.ver').unbind();

    $('.ver').on('click', function () {
        IdProyecto = $(this).data('id');
        // console.log(IdPrecioVenta);
        $.ajax({
            type: "POST",
            url: "detalle-proy.php",
            data: { IdProyecto: IdProyecto },
            success: function (response) {
                $(location).attr('href', 'detalle-proy.php');
            }
        });
    });
}