function register(name, email, password, passwordConfirmation) {
  $.ajax({
      headers: {
        'Accept': 'application/json',
      },
      url: route('api.register'),
      type: 'POST',
      data: {
        username: username,
        email: email,
        address: address,
        phone: phone,
        password: password,
        password_confirmation: passwordConfirmation,
      },
      beforeSend: removeOldErrors
  })
  .done(registerSuccess)
  .fail(registerFail);
};

function registerSuccess(res) {
    window.localStorage.setItem('access_token', res.result.access_token);
    window.location.replace('/');
}

function registerFail(res) {
    let errors = res.responseJSON.errors;
    $.each(errors, function(field, message) {
      let currentInput = $(`input[name=${field}]`);
      if (field == 'password') $(`input[name=password_confirmation`).addClass('is-invalid');
      currentInput.addClass('is-invalid');
      currentInput.next(".invalid-feedback").text(message);
    });
}

function removeOldErrors() {
    $('.invalid-feedback').text("");
    $('.is-invalid').removeClass('is-invalid');
}
$(document).ready(function () {
    $('input[type=submit]').click(function(e) {
        e.preventDefault();
        var username = $('input[name="username"]').val();
        var email = $('input[name="email"]').val();
        var address = $('input[name="address"]').val();
        var phone = $('input[name="phone"]').val();
        var password = $('input[type="password"]').val();
        var password_confirmation = $('input[name="password_confirmation"]').val();
        register(name, email, phone, address, password, passwordConfirmation);
    });
});