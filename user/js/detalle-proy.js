$('#Comentar').click(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "php/comentar.php",
        data: {Comentario: $('#CampComentario').val()},
        success: function (response) {
            if(response)
                alertify.alert('Se registro con exito', function(){ location.reload(); });
            else
                alertify.alert('Error al registrarse', function(){ location.reload(); });
        }
    });
});

$('.Responder').click(function (e) { 
    e.preventDefault();
    var IdComentario = $(this).data('id');
    var Respuesta = $(this).closest('.Respuesta').find('.CampResponder').val();
    $.ajax({
        type: "POST",
        url: "php/responder.php",
        data: {IdComentario: IdComentario, Respuesta: Respuesta},
        success: function (response) {
            if(response)
                alertify.alert('Se registro con exito', function(){ location.reload(); });
            else
                alertify.alert('Error al registrarse', function(){ location.reload(); });
        }
    });
});

$('.habRes').click(function (e) { 
    e.preventDefault();
    $(this).closest('.comen').find('.Respuesta').removeAttr('hidden');
    $(this).closest('.comen').find('.Respuesta').show();
    $(this).hide();
});

$('.Cerrar').click(function (e) { 
    e.preventDefault();
    $(this).closest('.comen').find('.Respuesta').hide();
    $(this).closest('.comen').find('.habRes').show();
});

$('.EditarComen').click(function (e) { 
    e.preventDefault();
    var Comen = $(this).closest('.comen');
    if(Comen.find('.contComen').hasClass('form-control-plaintext')) {
        Comen.find('.contComen').removeClass('form-control-plaintext');
        Comen.find('.contComen').addClass('form-control');
        Comen.find('.contComen').removeAttr('readonly');
        Comen.find('.habRes').hide();
        Comen.find('.EditarComen').hide();
        Comen.find('.ModComen').removeAttr('hidden');
        Comen.find('.ModComen').show();
        Comen.find('.CerModComen').removeAttr('hidden');
        Comen.find('.CerModComen').show();
    }
});

$('.CerModComen').click(function (e) { 
    e.preventDefault();
    var Comen = $(this).closest('.comen');
    Comen.find('.ModComen').hide();
    Comen.find('.CerModComen').hide();
    Comen.find('.habRes').show();
    Comen.find('.EditarComen').show();
    Comen.find('.contComen').removeClass('form-control');
    Comen.find('.contComen').addClass('form-control-plaintext');
});

$('.ModComen').click(function (e) { 
    e.preventDefault();
    var IdComentario = $(this).data('id');
    var Comentario = $(this).closest('.comen').find('.contComen').val();
    $.ajax({
        type: "POST",
        url: "php/ModComen.php",
        data: {IdComentario: IdComentario, Comentario: Comentario},
        success: function (response) {
            if(response)
                alertify.alert('Se Modifico con exito', function(){ location.reload(); });
            else
                alertify.alert('Error al Modificar', function(){ location.reload(); });
        }
    });
});

$('.EditarResp').click(function (e) { 
    e.preventDefault();
    var Comen = $(this).closest('.resp');
    if(Comen.find('.contResp').hasClass('form-control-plaintext')) {
        Comen.find('.contResp').removeClass('form-control-plaintext');
        Comen.find('.contResp').addClass('form-control');
        Comen.find('.contResp').removeAttr('readonly');
        Comen.find('.habRes').hide();
        Comen.find('.EditarResp').hide();
        Comen.find('.ModResp').removeAttr('hidden');
        Comen.find('.ModResp').show();
        Comen.find('.CerModResp').removeAttr('hidden');
        Comen.find('.CerModResp').show();
    }
});

$('.CerModResp').click(function (e) { 
    e.preventDefault();
    var Comen = $(this).closest('.resp');
    Comen.find('.ModResp').hide();
    Comen.find('.CerModResp').hide();
    Comen.find('.habRes').show();
    Comen.find('.EditarResp').show();
    Comen.find('.contResp').removeClass('form-control');
    Comen.find('.contResp').addClass('form-control-plaintext');
});

$('.ModResp').click(function (e) { 
    e.preventDefault();
    var IdRespuesta = $(this).data('id');
    var Respuesta = $(this).closest('.resp').find('.contResp').val();
    $.ajax({
        type: "POST",
        url: "php/ModResp.php",
        data: {IdRespuesta: IdRespuesta, Respuesta: Respuesta},
        success: function (response) {
            if(response)
                alertify.alert('Se Modifico con exito', function(){ location.reload(); });
            else
                alertify.alert('Error al Modificar', function(){ location.reload(); });
        }
    });
});