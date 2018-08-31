$(document).ready(function () {
    user = localStorage.getItem('user');
    var user = JSON.parse(user);
    if(user) {
        var token = user.token;
        var username = user.username;
    }
    $(document).on('click', '.js-home', function (event) {
        window.location.href = 'http://' + window.location.hostname;
    });
    if (token && username) {
        $('.js-user-login').show();
        $('.js-user-not-login').hide();
        $('.js-user-logined').html("<strong>" + username + "</strong>");
    } else {
        $('.js-user-login').hide();
        $('.js-user-not-login').show();
    }

    $(document).on('click', '#js-logout', function (event) {
        event.preventDefault();
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token
            },
            url: '/api/logout',
            type: "post",

            success: function (response) {
                localStorage.removeItem('user');
                window.location.href = 'http://' + window.location.hostname;
            },

            error: function (response) {
                localStorage.removeItem('user');
                window.location.href = 'http://' + window.location.hostname + '/user/login';
            }
        });
	});
});
