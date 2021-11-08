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
                  type:'GET',
                  url: urlRequest,
                  success: function (data) {
                      if(data.code == 200){
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


$(function () {

  $(document).on('click','.action_delete', actionDelete)
    
});
    
    
    // function deleteCate(id){
        
    
    //     $.post("{{ route('categories.delete') }}",
    //     {
    //         '_token': $('[name=_token]').val(),
    //         id:id
    //     }, function(data, status){
    //         location.reload();
    //         Toastify({
    //              text: "Xoá Thành Công",
    //              duration: 10000,
    //              backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
    //              }).showToast();
    //         });
       
       
    // }

