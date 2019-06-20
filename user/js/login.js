$('#login').click(function (e) { 
    e.preventDefault();
    var Email = $('#Email').val();
    var Password = $('#Password').val();
    var error = false;

    var InputValidar = [
        ['Email', Email],
        ['Password', Password]
    ];

    for (var i = 0; i < InputValidar.length; i++) {
        if(InputValidar[i][1] == '' || InputValidar[i][1] == null) {
            $('#' + InputValidar[i][0]).addClass('is-invalid');
        } else {
            $('#' + InputValidar[i][0]).removeClass('is-invalid');
            $('#' + InputValidar[i][0]).addClass('is-valid');
        }
    }

    $('input').each(function () {
        if($(this).hasClass('is-invalid')) {
            error = true;
        }
    });

    if(!error) {
        $.ajax({
            type: "POST",
            url: "php/login.php",
            data: {
                Email: Email,
                Password: Password
            },
            success: function (response) {
                if(response) {
                    location.href = 'index.php';
                } else {
                    alertify.alert("Datos invalidos");
                }
            }
        });
    } else {
        alertify.alert("Completa los campos");
    }
});