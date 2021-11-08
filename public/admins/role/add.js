
    $('.checkbox_wrapper').on('click',function(){
        // checked = true , false
       $(this).parents('.card').children('.card-body').find('.checkbox_children').prop('checked',$(this).prop('checked'));
    
      
    });

    $('.checkall').on('click',function(){
        //parents(): tim tat ca cac cha cua thiss
        $(this).parents().find('.checkbox_children').prop('checked',$(this).prop('checked'));
        $(this).parents().find('.checkbox_wrapper').prop('checked',$(this).prop('checked'));

    });
    

