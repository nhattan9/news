$(function () {
    $("#form_comment").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            success: function (data) {
                var comment = data.commnent;
                console.log(comment);
                $('#commnent_result').append(`
                
                  <div class="comment-fig-main" style="margin-top: 10px;">
                    <figure>
                        <img src="${comment['avatar']}" alt="">
                    </figure>
                    <div class="comment-fig-info">
                        <h3 style="display: inline-block">${comment['name']} </h3>
                        <span> ${comment['content']} </span>
                        <div class="comment-info-icon">
                            <ul>
                                <li><a href="#"><span><i class="fas fa-thumbs-up"></i></span>Like <span></span></a></li>
                                <li class="reply-action"><a href="#"><span><i class="fas fa-comment-alt"></i></span>Reply</a></li>
                                <li><span>${comment['created_at']} </span></li>

                            </ul>
                        </div>
                    </div>
                </div>
                `);
            }
        });
    });
});