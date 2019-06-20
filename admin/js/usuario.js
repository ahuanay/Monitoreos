$('#Registrar').click(function (e) { 
    e.preventDefault();

    var IdMunicipalidad = $('#IdMunicipalidad').val();
    var Nombre = $('#Nombre').val();
    var Apellido = $('#Apellido').val();
    var Email = $('#Email').val();
    var Password = $('#Password').val();
    var Departamento = $('#Departamento').val();
    var Provincia = $('#Provincia').val();
    var Distrito = $('#Distrito').val();
    var RazonSocial = $('#RazonSocial').val();
    var Direccion = $('#Direccion').val();
    var Telefono = $('#Telefono').val();
    var Cargo = $('#Cargo').val();
    var error = false;

    var InputValidar = [
        ['IdMunicipalidad', IdMunicipalidad],
        ['Nombre', Nombre],
        ['Apellido', Apellido],
        ['Email', Email],
        ['Password', Password],
        ['Departamento', Departamento],
        ['Provincia', Provincia],
        ['Distrito', Distrito],
        ['RazonSocial', RazonSocial],
        ['Direccion', Direccion],
        ['Telefono', Telefono],
        ['Cargo', Cargo],
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

    $('select').each(function () {
        if($(this).hasClass('is-invalid')) {
            error = true;
        }
    });

    if(!error) {
        $.ajax({
            type: "POST",
            url: "php/reg-muni.php",
            data: {
                IdMunicipalidad: IdMunicipalidad,
                Nombre: Nombre,
                Apellido: Apellido,
                Email: Email,
                Password: Password,
                Departamento: Departamento,
                Provincia: Provincia,
                Distrito: Distrito,
                RazonSocial: RazonSocial,
                Direccion: Direccion,
                Telefono: Telefono,
                Cargo: Cargo
            },
            success: function (response) {
                if(response) {
                    alertify.alert("Se registro con exito", function(){
                        location.href = 'index.php';
                    });
                } else {
                    alertify.alert("Error al registrarse", function(){
                        location.href = 'register.php';
                    });
                }
                
            }
        });
    }
});

$('#Departamento').change(function (e) {
    e.preventDefault();
    IdDepartamento = $(this).val();
    // console.log(IdDepartamento);
    $('#Distrito').find('option').remove().end().append('<option value="" disabled selected>Distrito</option>');
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

$('#RepeatPassword').keyup(function (e) { 
    if($('#Password').val() == $('#RepeatPassword').val()) {
        $('#RepeatPassword').removeClass('is-invalid');
        $('#RepeatPassword').addClass('is-valid');
    } else {
        $('#RepeatPassword').addClass('is-invalid');
    }
});

$('#IdMunicipalidad').blur(function (e) { 
    e.preventDefault();
    var id = $(this).attr('id');
    validar(id);
});

$('#Nombre').blur(function (e) { 
    e.preventDefault();
    var id = $(this).attr('id');
    validar(id);
});

$('#Apellido').blur(function (e) { 
    e.preventDefault();
    var id = $(this).attr('id');
    validar(id);
});

$('#Email').blur(function (e) { 
    e.preventDefault();
    var id = $(this).attr('id');
    validar(id);
});

$('#Password').blur(function (e) { 
    e.preventDefault();
    var id = $(this).attr('id');
    validar(id);
});

$('#Departamento').blur(function (e) { 
    e.preventDefault();
    var id = $(this).attr('id');
    validar(id);
});

$('#Provincia').blur(function (e) { 
    e.preventDefault();
    var id = $(this).attr('id');
    validar(id);
});

$('#Distrito').blur(function (e) { 
    e.preventDefault();
    var id = $(this).attr('id');
    validar(id);
});

$('#RazonSocial').blur(function (e) { 
    e.preventDefault();
    var id = $(this).attr('id');
    validar(id);
});

$('#Direccion').blur(function (e) { 
    e.preventDefault();
    var id = $(this).attr('id');
    validar(id);
});

$('#Telefono').blur(function (e) { 
    e.preventDefault();
    var id = $(this).attr('id');
    validar(id);
});

$('#Cargo').blur(function (e) { 
    e.preventDefault();
    var id = $(this).attr('id');
    validar(id);
});

function validar (id) {
    var valor = $('#' + id).val();
    if(valor == '' || valor == null) {
        $('#' + id).addClass('is-invalid');
    } else {
        $('#' + id).removeClass('is-invalid');
        $('#' + id).addClass('is-valid');
    }
}

$('.Cambiar').click(function (e) { 
    e.preventDefault();
    var IdUsuario = $(this).data('id');
    if($(this).hasClass('btn-success')) {
        $.ajax({
            type: "POST",
            url: "php/Hab-usuario.php",
            data: {IdUsuario: IdUsuario, Tipo: 1},
            success: function (response) {
                location.reload();
            }
        });
    }
    if($(this).hasClass('btn-danger')) {
        $.ajax({
            type: "POST",
            url: "php/Hab-usuario.php",
            data: {IdUsuario: IdUsuario, Tipo: 2},
            success: function (response) {
                location.reload();
            }
        });
    }
});