$(document).ready(function () {
	var token = localStorage.getItem('token-login');
    if (token) {
        $('.js-user-login').show();
        $('.js-user-not-login').hide();
        $('.js-user-logined').html("<strong>admin</strong>");
    } else {
        $('.js-user-login').hide();
        $('.js-user-not-login').show();
    }
    $(document).ready(function () {
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
	                localStorage.removeItem('token-login');
	                localStorage.removeItem('username');
	                window.location.href = 'http://' + window.location.hostname;
	            },

	            error: function (response) {
	                alert(response.responseJSON.error);
	            }
	        });
	    });
	});
});
