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