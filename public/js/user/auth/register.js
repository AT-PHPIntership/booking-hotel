$(document).ready(function () {
    $(document).on('click', '#btn-submit', function (event) {
        event.preventDefault();
        $.ajax({
            headers: {
                'Accept': 'application/json',
            },
            url: '/api/register',
            type: "post",

            data: {
                username: $('input[name="username"]').val(),
                email: $('input[name="email"]').val(),
                phone: $('input[name="phone"]').val(),
                address: $('input[name="address"]').val(),
                password: $('input[type="password"]').val(),
                password_confirmation: $('input[name="password_confirmation"]').val(),
            },

            success: function (response) {
                myJSON = JSON.stringify(response.result);
                localStorage.setItem('user', myJSON);
                window.location.href = 'http://' + window.location.hostname;
            },

            error: function (response) {
                // Clear last Invalid
                $('.invalid-feedback').hide();
                $('.invalid-feedback span').html('');
                // Display invalid
                errors = Object.keys(response.responseJSON.error);
                errors.forEach(item => {
                    $('#js-error-' + item).html(response.responseJSON.error[item]);
                    $('#js-error-' + item).css('color', 'red');
                    $('#js-feedback-' + item).show();
                });
            }
        });
    });
});
