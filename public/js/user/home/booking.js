// Show hotels follow city
function bookingHotelsFollowForm() {
    $(document).on('click', '#js-booking-submit', function (e) {
        user = localStorage.getItem('user');
        var user = JSON.parse(user);
        if(user) {
            var token = user.token;
            var username = user.username;
        }
        var roomId = sessionStorage.getItem('room_booked');
        var phone = $('input[id="phone"]').val();
        if ($('input[name="date_checkin"]').val() == "" || $('input[name="date_checkout"]').val() == "") {
            var d = new Date();
            var month = d.getMonth()+1;
            var day = d.getDate();
            var today = d.getFullYear() + '/' + (month < 10 ? '0' : '') + month + '/' + (day < 10 ? '0' : '') + day;
            var date_checkin = today;
            var date_checkout = today;
        } else {
            var date_checkin = $('input[name="date_checkin"]').val();
            var date_checkout = $('input[name="date_checkout"]').val();
        }       
        if ($('textarea[name="notes"]').val()) {
            var notes = $('textarea[name="notes"]').val();
        } else {
            var notes = "No Message";
        }
        e.preventDefault();
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
            },
            url: '/api/booking-hotel',
            type: "POST",

            data: {
                username: username,
                phone: phone,
                room_id: roomId,
                date_in: date_checkin,
                date_out: date_checkout,
                notes: notes,
            },

            success: function (response) {
                // If response code equal 200
                $('#js-item-list').empty();
                var html = '<div class="row">';
                html += '<div class="col-md-10 col-md-offset-1 animate-box  animate-box fadeInUp animated-fast">';
                html += '<h3>Booking Success</h3>';
                html += '</div>';
                html += '</div>';
                $('#js-item-list').append(html);
            },
            error: function (response) {
                console.log("error");
            }
        });
    }); 
}

// Show hotels follow city
function chooseRoomToBook() {
    var array_id = [];
    $(document).on('click', '.js-booked-room', function (e) {
        var buttonContent = $(this).html();
        var id = $(this).attr("id").slice(15);
        var hotelName = $(".js-hotel").html();
        user = localStorage.getItem('user');
        var user = JSON.parse(user);
        if(user) {
            var email = user.email;
            var phone = user.phone;
        }
        e.preventDefault();
        if (buttonContent == "Booking Now!") {
            $(this).html("Cancel");
            $(this).css("color", "red");
            array_id.push(id);
            sessionStorage.setItem('room_booked', array_id);
            showContract(email, hotelName, id, phone);
        } else if (buttonContent == "Cancel") {
            $(this).html("Booking Now!");
            $(this).css("color", "white");
            sessionStorage.removeItem('room_booked');
        } else {
            alert("Please Login to Booking!");
        }
    }); 
}

function showContract (email, hotelName, roomId, phone) {
    // Hide element display Hotels, Paginate, Side bar
    $('#js-side-bar').hide();
    $('.pagination').hide();
    $('#colorlib-hotel').hide();
    $('#js-item-list').empty();
    // Format Booking
    var html = '<div id="colorlib-contact">';
    html += '<div class="container">';
    html += '<div class="row">';
    html += '<div class="col-md-10 col-md-offset-1 animate-box fadeInUp animated-fast">';
    html += '<h3 id="js-hotel-id-' + roomId + '" class="js-title-booking">Booking '+ hotelName +'</h3>';
    html += '<form action="#">';
    html += '<div class="row form-group">';
    html += '<div class="col-md-12">';
    html += '<label for="email">Email</label>';
    html += '<input type="text" id="email" class="form-control" value="' + email + '" disabled>';
    html += '</div>';
    html += '</div>';
    html += '<div class="row form-group">';
    html += '<div class="col-md-12">';
    html += '<label for="phone">Phone</label>';
    html += '<input type="text" id="phone" class="form-control" value="' + phone + '">';
    html += '</div>';
    html += '</div>';
    html += '<div class="row form-group">';
    html += '<div class="col-md-12">';
    html += '<label for="message">Message</label>';
    html += '<textarea name="notes" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us" value=""></textarea>';
    html += '</div>';
    html += '</div>';
    html += '<div class="form-group text-center">';
    html += '<input type="submit" value="Send Message" class="btn btn-primary" id="js-booking-submit">';
    html += '</div>';
    html += '</form>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    $('#js-item-list').append(html);
}

// When load page
$(document).ready(function() {
    chooseRoomToBook();
    bookingHotelsFollowForm();
});
