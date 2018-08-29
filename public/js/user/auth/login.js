$(document).ready(function () {
    $(document).on('click', '#btn-submit', function (event) {
        event.preventDefault();
        $.ajax({
            headers: {
                'Accept': 'application/json',
            },
            url: '/api/login',
            type: "post",
            data: {
                email: $('input[name="email"]').val(),
                password: $('input[type="password"]').val(),
            },

            success: function (response) {
                localStorage.setItem('token-login', response.result.token);
                localStorage.setItem('username', response.result.username);
                localStorage.setItem('phone', response.result.phone);
                window.location.href = 'http://' + window.location.hostname;
            },

            error: function (response) {
                alert(response.responseJSON.error);
            }
        });
    });
});
