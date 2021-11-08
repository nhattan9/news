    let currentPage = 1 ;
    function loadMore(event) {
        event.preventDefault();
        currentPage++;
        let urlRequest = $(this).data('url');
        let that = $(this);
        $.ajax({
            type:'GET',
            url: urlRequest+"?page="+currentPage,
            success: function (data) {
                if(data == null || data == ""){
                that.parent().hide();
                }
            $('#result').append(data);
            },
            error: function () {
                
            }
    });
    
    }
    $(function () {

    $(document).on('click','.loadMore', loadMore)
        
    });