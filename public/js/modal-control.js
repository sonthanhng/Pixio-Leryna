$('#btn-contact').click(function() {
  $('#contact-modal').modal('show');
})

function checkInfo() {
  var name = $('#client-name').val();
  var email = $('#client-email').val();
  var phonenumber = $('#client-phonenumber').val();
  var number = $('#client-number').val();
  if (!name || !(phonenumber && email)) return false;
  return true;
}

$(document).ready(function() {
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  if (span) {
    span.onclick = function() {
      $('#contact-modal').modal('hide');
      $('#thanks-modal').modal('hide');
    }
  }

  $('#btn-send-request').click(function() {
    if (checkInfo()) {
      // send ajax to server.
      // thanks box show
      $('#contact-modal').modal('hide');
      $('#thanks-modal').modal('show');
    }
  });
})
