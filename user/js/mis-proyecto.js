$(document).ready(function () {
  // Configuracion del DataTable 
  $('#dataTable').DataTable({
		"language": {
				"sProcessing":     "Procesando...",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla",
				"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix":    "",
				"sSearch":         "Buscar:",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
		}
  });
});

$('.ver').click(function (e) { 
    e.preventDefault();
    IdProyecto = $(this).data('id');
    // console.log(IdPrecioVenta);
    $.ajax({
        type: "POST",
        url: "detalle-proyecto.php",
        data: { IdProyecto: IdProyecto },
        success: function (response) {
            $(location).attr('href', 'detalle-proyecto.php');
        }
    });
});