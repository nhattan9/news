$(function () {
  $(".tags_select_choose").select2({
    tags: true,
    tokenSeparators: [',', ' ']
  });
  var editor_config = {
    path_absolute : "/",
    selector: 'textarea.my-editor',
    relative_urls: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };

  tinymce.init(editor_config);

});

$("#image").on('change', function() {
  if (this.files && this.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $("#preview_image").attr("src", e.target.result );
    };
    reader.readAsDataURL(this.files[0]); 
  }
});

$("#title").on('keyup', function() {
  let value = $(this).val()!=""? $(this).val():"Không có tiêu đề";
  $("#preview_title").html(value);
});

$("#summary").on('change', function() {
  let value = $(this).val()!=""? $(this).val():"Không có tóm tắt";
  $("#preview_summary").html(value);
});

$("#category").on('change', function() {
  let value = $(this).val()!=""? $(this).children('option:selected').text():"Không";
  $("#preview_category").html(value);
});



