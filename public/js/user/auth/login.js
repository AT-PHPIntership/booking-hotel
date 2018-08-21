$(document).ready(function () {
    // if (localStorage.getItem('login-token')) {
    //     window.location.href = 'http://' + window.location.hostname;
    // }

    $(document).on('click', '#btn-submit', function (event) {
        event.preventDefault();
        $.ajax({
        
            headers: {
                'Accept': 'application/json',
            },

            url: route('api.login'),
            type: "post",

            data: {
                email: $('.login-form input[name="email"]').val(),
                password: $('.login-form input[type="password"]').val(),
            },

            // success: function (response) {
            //     localStorage.setItem('token-login', response.result.remenber_token);
            //     localStorage.setItem('username', response.result.user.username);

            //     window.location.href = 'http://' + window.location.hostname;
            // },

            error: function (response) {
                alert(response.responseJSON.error + $('input[name="email"]').val());
                $('input[name="email"]').val();
            }
        });
    });
});
