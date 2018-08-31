function getUserInformation() {
    $(document).on('click', '.js-user-change-infor', function (event) {
        user = localStorage.getItem('user');
        var user = JSON.parse(user);
        if(user) {
            var token = user.token;
            var username = user.username;
        }
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
            },
            url: '/api/change-user',
            type: "post",

            data: {
                username: username,
            },
            success: function (response) {
                if (response.code == 200) {
                    changeUserForm(response);
                } else {
                    alert("Server Error");
                }
            },

            error: function (response) {
                alert("Error");
            }

        });
	});
}
function changeUserForm(response) {
    $('.js-home-information').hide();
    $('.js-user-information').show();
    // Display user information
    $('#js-username').val(response.result.username);
    $('#js-email').val(response.result.email);
    $('#js-address').val(response.result.address);
    $('#js-phone').val(response.result.phone);
}
function editUserInformation() {
    $(document).on('click', '#js-btn-change-user', function (event) {
        user = localStorage.getItem('user');
        var user = JSON.parse(user);
        if(user) {
            var token = user.token;
            var username = user.username;
        }
        var usernameNew = $('#js-username').val();
        var email = $('#js-email').val();
        var address = $('#js-address').val();
        var phone = $('#js-phone').val();
        var password = $('#js-password').val();
        var password_confirmation = $('#js-password-confirm').val();
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
            },
            url: '/api/edit-user',
            type: "post",

            data: {
                username_old: username, 
                username: usernameNew,
                email: email,
                address: address,
                phone: phone,
                password: password,
                password_confirmation: password_confirmation,
            },
            success: function (response) {
                localStorage.removeItem('user');
                window.location.href = 'http://' + window.location.hostname + '/user/login';
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
}
$(document).ready(function() {
    getUserInformation();
    editUserInformation();
});
