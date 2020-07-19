$('#toggle1,#toggle2,#toggle3,#toggle4').change(function() {
    var id = $(this).attr('id');
    var mode = $(this).prop('checked');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'JSON',
        url: '/ajaxRequestBtn/' + id,
        data: 'mode=' + mode,
        success: function(data) {
            if (mode == true) {
                var data = eval(data);
                message = data.message;
                toastr.success(data.success, data.message);
            } else {
                var data = eval(data);
                message = data.message;
                toastr.error(data.success, data.message);
            }
        }
    });
});

$('#showprog').click(function() {
    var div = $('#alert').html();
    $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/showhour',
            type: 'POST',
            dataType: 'json',
            data: {
                param1: 'value1'
            },
        })
        .done(function(data) {
            $('#alert').show();
            setTimeout(function() {
                $("#alert").fadeOut(5500);
            }, 7000);
            $('#alert').html(data.success);
        })
});

$('#encendido').timepicki({
    show_meridian: false,
    min_hour_value: 0,
    max_hour_value: 23,
    step_size_minutes: 1,
    overflow_minutes: true,
    increase_direction: 'up',
    reset: false,
    disable_keyboard_mobile: false
});
$('#apagado').timepicki({
    show_meridian: false,
    min_hour_value: 0,
    max_hour_value: 23,
    step_size_minutes: 1,
    overflow_minutes: true,
    increase_direction: 'up',
    reset: false,
    disable_keyboard_mobile: false
});

$(document).ready(function() {
    $("#form input").change(function() {
        var form = $(this).parents("#form");
        var check = checkCampos(form);
        console.log(check);
        if (check) {
            $("#programareloj").prop("disabled", false);
        } else {
            $("#programareloj").prop("disabled", true);
        }
    });
});

function checkCampos(obj) {
    var camposRellenados = true;;
    obj.find("input").each(function() {
        var $this = $(this);
        if ($this.val().length <= 0) {
            camposRellenados = false;
            return false;
        } else if (($("input[name*='zone']:checked").length) <= 0) {
            toastr.error("Seleccionar almenos un sector");
            camposRellenados = false;
            return false;
        };
    });
    if (camposRellenados == false) {
        return false;
    } else {
        return true;
    }
};


$(document).ready(function() {
    $('.btn-submit').click(function(e) {
        e.preventDefault();
        var form = $(this).parents('#form');
        var x = document.forms["form"]["retardo"].value;
        if (x == null || x == "" || !/^[0-9]+$/.test(x) || x > 15 || x.length > 2) {
            toastr.error("El retardo tiene que tener un valor numérico entre 0 y 15");
            return false;
        };

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'JSON',
            url: '/programareloj',
            data: $('form').serialize(),
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

$('.btn-outline-primary').click(function() {
    var _token = $("input[name='_token']").val();
    var cmode = document.getElementById("changemode").value;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/changemode',
        type: 'POST',
        dataType: 'json',
        data: {
            _token: _token,
            cmode: cmode
        },
        success: function(data) {
            if (data.success == true) {
                setTimeout(function() {
                    location.reload();
                }, 500);
            } else
                location.reload();
        }
    })
});

$(document).ready(function() {
    $("#defaultInline0").click(function() {
        $(".checkChild").prop("checked", this.checked);
    });

    $('.checkChild').click(function() {
        if ($('.checkChild:checked').length == $('.checkChild').length) {
            $('#defaultInline0').prop('checked', true);
        } else {
            $('#defaultInline0').prop('checked', false);
        }
    });
});
