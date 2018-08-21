$(document).ready(function () {
    if (localStorage.getItem('login-token')) {
        window.location.href = 'http://' + window.location.hostname;
    }

    $(document).on('click', '#btn-submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: "/api/login",
            type: "post",
            headers: {
                'Accept': 'application/json',
            },

            data: {
                email: $('input[id="email"]').val(),
                password: $('input[id="password"]').val()
            },

            success: function (response) {
                console.log(response.result.remenber_token);
                localStorage.setItem('login-token', response.result.remenber_token);
                window.location.href = 'http://' + window.location.hostname;
            },

            statusCode: {
                401: function (response) {
                    alert(response.responseJSON.error);
                    $('input[id="password"]').val('');
                }
            }
        });
    });
});
