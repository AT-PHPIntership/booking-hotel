function getBookedRooms() {
    $(document).on('click', '.js-booked-manager', function (event) {
        user = localStorage.getItem('user');
        var user = JSON.parse(user);
        if(user) {
            var token = user.token;
            var username = user.username;
        }
        event.preventDefault();
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
            },
            url: '/api/list-booking',
            type: "post",

            data: {
                username: username,
            },

            success: function (response) {
                showListBooking(response.result.data);
                showPaginationBookedRooms(response.result.paginator, 1);
            },

            error: function (response) {
                alert(response.responseJSON.error);
            }
        });
	});
}
// Display pagination follow data
function displayPaginateBookedRoom() {
    $(document).on('click', '.js-pagination-item-booked', function (e) {
        var current_page = $(this).text();
        user = localStorage.getItem('user');
        var user = JSON.parse(user);
        if(user) {
            var token = user.token;
            var username = user.username;
        }
        e.preventDefault();
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
            },
            url: "/api/list-booking?perpage=6&page=" + current_page,
            type: 'post',
            data: {
                username: username,
            },
        })
        .done(function (response) {
            showListBooking(response.result.data);
            showPaginationBookedRooms(response.result.paginator, current_page);
        });
    }); 
}
// Show List booking
function showListBooking (data) {
    // Hide element display Hotels, Side bar
    $('#js-side-bar').hide();
    $('#colorlib-hotel').hide();
    $('#js-item-list').empty();
    $('.js-home-information').show();
    $('.js-user-information').hide();
    // Format Booking
    var html = '<div class="col-md-12 col-md-offset-0 heading3 animate-box fadeInUp animated-fast">'
    if(typeof(data) == 'undefined') {
        html += '<h2>BookedRooms not found</h2>';
        $('#js-item-list').append(html);
    } else {
        html += '<div class="row">';
        $('#js-item-list').append(html);
        data.forEach(function(item) {
            var type = item.room;
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
            room += '<h2>'+ type.hotel.name +'</h2>';
            room += '<span>'+ type.room_types.name +'</span>';
            room += '<p><strong>Date in: '+ convertFormat(item.date_in) +'</strong></p>';
            room += '<p><strong>Date out: '+ convertFormat(item.date_out) +'</strong></p>';
            room += '<p class="price"><span>'+ type.price +'VND</span> <small>/ day</small></p>';
            room += '<span class="place">' + type.hotel.address + '</span>';
            for (var i = 0; i < type.hotel.number_star; i++) { 
                room +='<i class="icon-star-full"></i>';
            }
            if (item.status){
                room += '<p><a href="#" class="btn btn-primary">Approve</a></p>';
            } else {
                room += '<p><a href="#" class="btn btn-info js-booked-room-cancel" id="js-booked-room-cancel-' + item.id + '">Cancel</a></p>';
            }
            room += '</div>';
            room += '</div>';
            room += '</div>';
            room += '</div>';
            room += '</div>';
            $('#js-item-list').append(room);
        });
    }
    $('#js-item-list').append(html);
}
// Show Pagination
function showPaginationBookedRooms(paginator, current_page) {
    $('.js-pagination').empty();
    var pagination = '<li class="disabled"><a href="#">&laquo;</a></li>';
    var page = Math.ceil(paginator.total/paginator.per_page);
    for (var i = 1; i <= page; i++) {
        if (current_page == i) {
            pagination += '<li class="active js-pagination-item-booked"><a href="#" id="js-pagination-booked-' + i + '">' + i + '</a></li>';
        } else {
            pagination += '<li class="js-pagination-item-booked"><a href="#" id="js-pagination-booked-' + i + '">' + i + '</a></li>';
        }
    }
    pagination += '<li><a href="#">&raquo;</a></li>';
    $('.js-pagination').append(pagination);
}
// Delete Booking Room
function deleteBookedRoom() {
    $(document).on('click', '.js-booked-room-cancel', function (e) {
        if (confirm("Are you delete booking?")) {
            user = localStorage.getItem('user');
            var user = JSON.parse(user);
            if(user) {
                var token = user.token;
                var username = user.username;
            }
            var idBookedRoom = $(this).attr("id").slice(22);
            e.preventDefault();
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + token,
                },
                url: '/api/delete-booking',
                type: "post",

                data: {
                    bookedroom_id: idBookedRoom,
                    username: username,
                },

                success: function (response) {
                    showListBooking(response.result.data);
                    showPaginationBookedRooms(response.result.paginator, 1);
                },

                error: function (response) {
                    alert(response.responseJSON.error);
                }
            });
        }
    }); 
}
// Convert format day
function convertFormat(userDate) {
    var date = new Date(userDate),
    yr      = date.getFullYear(),
    month   = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth(),
    day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),
    newDate = yr + '-' + month + '-' + day;
    return newDate;
}
$(document).ready(function() {
    getBookedRooms();
    displayPaginateBookedRoom();
    deleteBookedRoom();
});
