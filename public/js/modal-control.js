$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$('#btn-contact').click(function() {
  $('#contact-modal').modal('show');
})

function checkInfo() {
  var name = $('#client-name').val();
  var email = $('#client-email').val();
  var phonenumber = $('#client-phonenumber').val();
  var number = $('#client-number').val();
  if (!name || !(phonenumber || email)) return false;
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
      $('#contact-modal').modal('hide');
      $('#thanks-modal').modal('show');
      // send ajax to server
      $.ajax({
        url: "/order",
        type: 'POST',
        data: {
          name: $('#client-name').val() ? $('#client-name').val() : "#",
          email: $('#client-email').val() ? $('#client-email').val() : "#",
          phonenumber: $('#client-phonenumber').val() ? $('#client-phonenumber').val() : "#",
          number: $('#client-number').val() ? $('#client-number').val() : "#"
        },
        success: function(data) {
          console.log(data);
        },
        error: function(data) {
          console.log(data.responseText);
        }
      });

    }
  });
  $('#btn-keep-buy').click(function() {
    $('#thanks-modal').modal('hide');
  })
})
