$('#FechaViable').blur(function (e) { 
    e.preventDefault();
    var FechaViable = moment($('#FechaViable').val());
    var FechaInicio = moment($('#FechaInicio').val());
    var Dias = FechaViable.diff(FechaInicio, 'days');
    $('#Duracion').val(Dias)
});