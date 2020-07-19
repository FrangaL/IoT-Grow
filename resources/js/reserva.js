$(document).ready(function() {
    $('.btn-submit').click(function(e) {
        e.preventDefault();
        var x = document.forms["form"]["retardo"].value;
        if (x == null || x == "" || !/^[0-9]+$/.test(x) || x > 15 || x.length > 2) {
            toastr.error("El retardo tiene que tener un valor numérico entre 0 y 15");
            return false;
        };
        var _token = $("input[name='_token']").val();
        var encendido = $("input[name='encendido']").val();
        var apagado = $("input[name='apagado']").val();
        var retardo = $("input[name='retardo']").val();
        var selector= $("select[name='selector']").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'JSON',
            url: '/programareloj',
            data: {_token:_token, encendido:encendido, apagado:apagado, retardo:retardo, selector:selector},
            dataType: 'JSON',
            success: function(data) {
                var data = eval(data);
                message = data.message;
                toastr.success(data.message);
                $("#alert").html(data.success);
            }
        });
        $('#alert').show();
        setTimeout(function() {
            $("#alert").fadeOut(3500);
        }, 5000);
    });
});