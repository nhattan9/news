function actionDelete(event) {
    // huy chuc năng load lai trang the <a>
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);// lay cai  button khi click vao 

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function (data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                },
                error: function () {

                }
            });

        }
    })
}

function addPermission(e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr('action'),
        method: $(this).attr('method'),
        data: new FormData(this),
        processData: false,
        // dataType: 'json',
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
                $('#form_addPermission')[0].reset();
                // $('tbody').append('hahah');
                // $('#addper').attr('data-bs-dismiss', 'modal');
                location.reload();
            }
        }
    });
}
$(function () {

    $(document).on('click', '.action_delete', actionDelete)
    $(document).on('submit', '#form_addPermission', addPermission)


});

