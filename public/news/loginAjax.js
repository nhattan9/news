$(function () {
    $("#main_form").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('div.error-text').text('');
            },
            success: function (data) {
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $('div.' + prefix + '_error').text(val[0]);
                    });
                }
                else {
                    if (data.to == 1) {
                        $('#main_form')[0].reset();
                        location.reload();
                    } else {
                        $('#msg').text('Tài khoản hoặc mật khẩu không chính xác');
                    }
                }
            }
        });
    });

    $("#form_register").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('div.error-register-text').text('');
            },
            success: function (data) {
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $('div.' + prefix + '_error').text(val[0]);
                    });
                }
                else {
                    $('#main_form')[0].reset();
                    // $('#msg_register').text(data.msg);
                    location.reload();
                }
            }
        });
    });
});