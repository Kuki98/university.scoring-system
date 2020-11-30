$(function () {
    // SUBMIT personal data change
    let personal_data_form = $('#userInfo');
    let send_personal_data = $('#sendUserInfo');
    send_personal_data.on('click', function(e){
        e.preventDefault();
        let url = "act.php?do=editClientData";
        let form_data = personal_data_form.serialize();
        // ajax
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            async: true,
            dataType: "json",
            success: function (ajaxResponse) {
                if(ajaxResponse.res == "6"){
                    $('#error').remove()
                    $('.form-group').closest('form').html(ajaxResponse.msg).attr("class", "h4 text-center"); //button
                    setTimeout(function () {
                        window.location.href = '/';
                    }, 2500);
                } else {
                    $('#error').html(ajaxResponse.msg);
                }
            }
        })
    })
    // end
    $('._redirect').on('click', function(e){
        e.preventDefault();
        let url = "?nav=" + $(this).data('url');
        // ajax
        window.location.href = url;
    })
    $('.btn._delete').click(function (e) {
        alert("You are about to permanently delete Client. Are you sure?")
        e.preventDefault();
        data = "&id=" + $(this).data('id');
        if ($(this).data('url')) {
            var url = 'act.php?do=' + $(this).data('url');
        }
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            async: true,
            dataType: "json",
            success: function (ajaxResponse) {
                if (ajaxResponse.res == '6')
                    setTimeout(function () {
                        location.reload();
                    }, 500);
            }
        })
    })

    $('._logout').on('click', function (e) {
        url = 'act.php?do=' + $(this).data('url');
        $.get(url, null, function () {
            window.location.href = '/';
        });
    })

})