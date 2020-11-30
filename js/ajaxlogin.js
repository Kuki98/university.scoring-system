$(function () {
    $('.btn.login').click(function (e) {
        e.preventDefault();
        var email = $('input[type=text]').val();
        var password = $('input[type=password]').val();
        var error = false;
        if (email.length == 0) {
            $('#error').html('Please enter email.');
            error = true;
        }
        else if (password.length == 0) {
            $('#error').html('Please enter password.');
            error = true;
        }
        else {
            $('#error').html('');
        }
        if (!error) {
            data = $('form').serialize();
            $.ajax({
                type: "POST",
                data: data,
                url: "act.php?do=login",
                async: true,
                cache: "false",
                dataType: "json",
                success: function (ajaxResponse) {
                    if (ajaxResponse.res == '2') {
                        $('#error').html(ajaxResponse.msg);
                    }
                    else {
                        window.location.href = "/";
                    }
                }

            })
        }
    })
    
})