$('#password, #confirm_password').on('keyup', function () {
    if ($('#password').val() == $('#confirm_password').val()) {
      $('#message').html('Matching Passwords').css('color', 'green');
      $(':input[type="submit"]').prop('disabled', false);
    } else {
      $('#message').html('Not Matching Passwords').css('color', 'red');
      $(':input[type="submit"]').prop('disabled', true);
    }
  });

