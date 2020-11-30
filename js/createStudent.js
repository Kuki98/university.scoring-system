$(function (){
    $('.generatePassword').click(function(e){
        e.preventDefault();
        var lenght = 15;
        var char_pool = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' + '0123456789!@#$%?:[{|';
        var password = '';
        for(var i=0, n=char_pool.length ; i<=lenght ; i++){
            password += char_pool.charAt(Math.floor(Math.random() * n));
        }
        console.log(password);
        $('.form-control.password').val(password);
        console.log($('.form-control.password').val())
    })
    $('.showPassword').click(function(e){
        e.preventDefault();
        $('.form-control.password').attr('type', 'text');
    })
    $('.createStudent').click(function(e){
        e.preventDefault();
        var data = $('form').serialize();
        $.ajax({
            type: "POST",
            url: "act.php?do=newStudent",
            data: data,
            async: true,
            cache: "false",
            dataType: "json",
            success: function(ajaxResponse){
                if(ajaxResponse.res == '6'){
                    $('.createStudent').closest('form').html(ajaxResponse.msg).attr("class", "h3 text-center pt-5");
                    setTimeout(function(){
                        window.location.href= '/';
                    }, 2500);
                } else $('#error').html(ajaxResponse.msg);
            }
        })
    })
})