$('.btn-contact').click(function() {
  $('#contact-modal').modal('show');
})

$(document).ready(function() {
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  span.onclick = function() {
    $('#contact-modal').modal('hide');
  }
})
