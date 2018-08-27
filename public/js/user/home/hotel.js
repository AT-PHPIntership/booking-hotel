// Get Hotels follow Id
function getHotels() {
    $.ajax({
        url: "/api/hotels",
        type: 'GET',
    })
    .done(function (response) {
        showHotels(response.result.data);
    });
}
// Show hotels follow city
function displayHotelsFollowForm() {
    $(document).on('click', '#js-city-search', function (e) {
        e.preventDefault();
        $.ajax({
            headers: {
                'Accept': 'application/json',
            },
            url: '/api/hotels-search',
            type: "POST",

            data: {
                city_id: $('input[name="city_id"]').val(),
                date_checkin: $('input[name="date_checkin"]').val(),
                date_checkout: $('input[name="date_checkout"]').val(),
                people: $('select[name="people"]').val(),
            },

            success: function (response) {
                showHotels(response.result.data);
            },
            error: function (response) {
                alert(response.responseJSON.error);
            }
        });
    }); 
}
// Show Hotels
function showHotels(data) {
    $('#js-hotel-list').empty();
    data.forEach(function(type) {
        var html = '';
        html += '<div class="col-md-6 col-sm-6 animate-box fadeInUp animated-fast">';
        html += '<div class="hotel-entry">';
        html += '<a href="#" class="hotel-img" style="background-image: url(upload/hotel/' + type.image + ');">';
        html += '<p class="price"><span>'+ type.total_room + '</span><small> Rooms</small></p>';
        html += '</a>';
        html += '<div class="desc">';
        html += '<p class="star"><span>';
        for (var i = 0; i < type.number_star; i++) { 
            html +='<i class="icon-star-full"></i>';
        }
        html += '</span> 545 Reviews</p>';
        html += '<h3><a href="#">' + type.name + '</a></h3>';
        html += '<span class="place">' + type.city.city + ' ' + type.city.country + '</span>';
        html += '<p style="height: 50px; overflow: hidden; text-overflow: ellipsis;">' + type.descript + '</p>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        $('#js-hotel-list').append(html);
    });  
}

$(document).ready(function() {
    getHotels();
    displayHotelsFollowForm();
});
