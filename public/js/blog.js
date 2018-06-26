$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready(function() {
  $('#blog-content').summernote({
    height: 450,
    callbacks: {
        onImageUpload: function(image) {
            uploadImage(image[0]);
        },
        onChange: function() {
          var description = $($("#blog-content").summernote("code")).text();
          console.log($('#blog-description').val());
        },
        onPaste: function (e) {
          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
          e.preventDefault();
          setTimeout(function () {
            document.execCommand('insertText', false, bufferText);
          }, 10);
        }
    }
  });
});

function deleteBlog(id) {
  console.log(id);
  $('#deleteModal').modal('show');
  document.getElementById('delete-blog-btn').href = "/admin-deleteBlog/" + id.toString();
}

function uploadImage(file) {
    data = new FormData();
    data.append("file", file);
    $.ajax({
        data: data,
        type: 'POST',
        url: '/api/image',
        cache: false,
        contentType: false,
        processData: false,
        success: function (url) {
          console.log(url);
          $('#blog-content').summernote('insertImage', url);
        }
    });
}
