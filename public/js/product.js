$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready(function() {
  $('#product-content').summernote({
    height: 450,
    callbacks: {
        onImageUpload: function(image) {
            uploadImage(image[0]);
        },
        onChange: function() {
          var description = $($("#product-content").summernote("code")).text();
          console.log($('#product-description').val());
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

function deleteProduct(id) {
  console.log(id);
  $('#deleteModal').modal('show');
  document.getElementById('delete-product-btn').href = "/admin-product/delete/" + id.toString();
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
          $('#product-content').summernote('insertImage', url);
        }
    });
}
