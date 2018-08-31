// Show hotels follow Hotel
function displayRoomsFollowHotel() {
    $(document).on('click', '.hotel-entry', function (e) {
    	var hotelId = $(this).attr("id").slice(9);
        sessionStorage.setItem('hotel_id', hotelId);
        if ($('input[name="date_checkin"]').val() == "" || $('input[name="date_checkout"]').val() == "") {
            var d = new Date();
            var month = d.getMonth() + 1;
            var day = d.getDate();
            var today = d.getFullYear() + '/' + (month<10 ? '0' : '') + month + '/' + (day < 10 ? '0' : '') + day;
            var date_checkin = today;
            var date_checkout = today;
        } else {
            var date_checkin = $('input[name="date_checkin"]').val();
            var date_checkout = $('input[name="date_checkout"]').val();
        }
        e.preventDefault();
        $.ajax({
            headers: {
                'Accept': 'application/json',
            },
            url: '/api/rooms',
            type: "POST",

            data: {
                id: hotelId,
                date_checkin: date_checkin,
                date_checkout: date_checkout,
            },

            success: function (response) {
                showRooms(response.result.data);
                showPaginationRooms(response.result.paginator, 1);
            },
            error: function (response) {
                // Display invalid
                console.log(response);
            }
        });
    }); 
}
// Display pagination follow data
function displayPaginateRooms() {
    $(document).on('click', '.js-pagination-item-rooms', function (e) {
        var hotelId = sessionStorage.getItem('hotel_id');
        if ($('input[name="date_checkin"]').val() == "" || $('input[name="date_checkout"]').val() == "") {
            var d = new Date();
            var month = d.getMonth() + 1;
            var day = d.getDate();
            var today = d.getFullYear() + '/' + (month<10 ? '0' : '') + month + '/' + (day < 10 ? '0' : '') + day;
            var date_checkin = today;
            var date_checkout = today;
        } else {
            var date_checkin = $('input[name="date_checkin"]').val();
            var date_checkout = $('input[name="date_checkout"]').val();
        }
        var current_page = $(this).text();
        e.preventDefault();
        $.ajax({
            url: "/api/rooms?perpage=6&page=" + current_page,
            type: 'POST',
            data: {
                id: hotelId,
                date_checkin: date_checkin,
                date_checkout: date_checkout,
            },
        })
        .done(function (response) {
            showRooms(response.result.data);
            showPaginationRooms(response.result.paginator, current_page);
        });
    }); 
}
// Show Pagination
function showPaginationRooms(paginator, current_page) {
    $('.js-pagination').empty();
    var pagination = '<li class="disabled"><a href="#">&laquo;</a></li>';
    var page = Math.ceil(paginator.total/paginator.per_page);
    for (var i = 1; i <= page; i++) {
        if (current_page == i) {
            pagination += '<li class="active js-pagination-item-rooms"><a href="#" id="js-pagination-rooms-' + i + '">' + i + '</a></li>';
        } else {
            pagination += '<li class="js-pagination-item-rooms"><a href="#" id="js-pagination-rooms-' + i + '">' + i + '</a></li>';
        }
    }
    pagination += '<li><a href="#">&raquo;</a></li>';
    $('.js-pagination').append(pagination);
}
// Show Rooms and comment of hotel
function showRooms(data) {
    $('#js-item-list').empty();
    var html = '<div class="col-md-12 col-md-offset-0 heading3 animate-box fadeInUp animated-fast">'
    if(typeof(data) == 'undefined') {
        html += '<h2>Rooms not found</h2>';
        $('#js-item-list').append(html);
    } else {
        html += '<h2 id="js-hotel-' + data[0].hotel.id + '" class="js-hotel">' + data[0].hotel.name + '</h2>';
        html += '</div>';
        html += '<div class="row">';
        $('#js-item-list').append(html);
        data.forEach(function(type) {
            var room = '<div class="col-md-12 animate-box fadeInUp animated-fast">';
            room += '<div class="room-wrap">';
            room += '<div class="row">';
            room += '<div class="col-md-6 col-sm-6 fadeInUp animated-fast">';
            if(type.room_image != "") {
            	room += '<div class="room-img" style="background-image: url(upload/room/' + type.room_image[0].image + ');"></div>';
            } else {
            	room += '<div class="room-img" style="background-image: url(user/images/room-1.jpg);"></div>';
            }
            room += '</div>';
            room += '<div class="col-md-6 col-sm-6 fadeInUp animated-fast">';
            room += '<div class="desc">';
            room += '<h2>'+ type.name +'</h2>';
            room += '<p class="price"><span>'+ type.price +'VND</span> <small>/ day</small></p>';
            room += '<p class="discount"><span style="color: green;">Discount: '+ type.discount +'</span> <small>%</small></p>';
            room += '<p style="height: 50px; overflow: hidden; text-overflow: ellipsis;">' + type.descript + '</p>';
            if (type.hotel.services != "") {
                room += '<p class="discount"><span>';
                type.hotel.services.forEach(function(services) {
                    room += services.name;
                    room += "|";
                });
                room += '</span></p>';
            }
            if (localStorage.getItem('user')){
                room += '<p><a href="#" class="btn btn-primary js-booked-room" id="js-booked-room-' + type.id + '">Booking Now!</a></p>';
            } else {
                room += '<p><a href="#" class="btn btn-info js-booked-room" id="js-booked-room-' + type.id + '">Login to Book Room</a></p>';
            }
            room += '</div>';
            room += '</div>';
            room += '</div>';
            room += '</div>';
            room += '</div>';
            $('#js-item-list').append(room);
        });
    }
    var comment = '<div class="col-md-12 animate-box fadeInUp animated-fast">';
	comment += '<div class="room-wrap">';
	comment += '<div class="row">';
    // Comment form
	comment += '<form>';
    comment += '<div class="slidecontainer" style="width: 20%;">';
    comment += '<p>Rating Point</p>';
    comment += '<input type="range" min="1" max="100" value="70" name="rating_point">';
    comment += '</div>';
	comment += '<div class="form-group">';
	comment += '<label for="comment">Comment:</label>';
	comment += '<textarea class="form-control" rows="5" id="comment" name="content"></textarea>';
	comment += '</div>';
	comment += '<button type="submit" class="btn btn-info" id="js-comment">Send</button>';
	comment += '</form>';
    // Comment post
    comment += '<div class="form-group" id="js-commented-list">';
    data[0].hotel.comments.forEach(function(type) {
        if(typeof(type) != 'undefined') {
            comment += '<label for="comment">' + type.user.username + '</label>';
            comment += '<textarea class="form-control" rows="2" id="comment" name="text">' + type.content + '</textarea>';
        }
    });
    comment += '</div>';
    // End Comment
	comment += '</div>';
	comment += '</div>';
	comment += '</div>';
	$('#js-item-list').append(comment);
    html = '</div>';
    $('#js-item-list').append(html);
}
// Comment Hotel
function commentHotel() {
    $(document).on('click', '#js-comment', function (e) {
        var content = $('textarea[name="content"]').val();
        var ratingPoint = $('input[name="rating_point"]').val();
        user = localStorage.getItem('user');
        var user = JSON.parse(user);
        if(user) {
            var token = user.token;
            var username = user.username;
        }
        var hotelId = $(".js-hotel").attr("id").slice(9);
        e.preventDefault();
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
            },
            url: '/api/comments/create',
            type: "POST",

            data: {
                content: content,
                username: username,
                hotel_id: hotelId,
                rating_point: ratingPoint,
            },

            success: function (response) {
                var comment = '<div class="form-group">';
                comment += '<label for="comment">' + response.result.username + '</label>';
                comment += '<textarea class="form-control" rows="2" id="comment" name="text">' + response.result.content + '</textarea>';
                comment += '</div>';
                $('#js-commented-list').append(comment);
            },
            error: function (response) {
                alert('Please Login to comment!');
            }
        });
    }); 
}

$(document).ready(function() {
    displayRoomsFollowHotel();
    displayPaginateRooms();
    commentHotel();
});
