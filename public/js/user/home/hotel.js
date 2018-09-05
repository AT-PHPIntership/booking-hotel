// Get Hotels follow Id
function getHotels() {
    $.ajax({
        url: "/api/hotels",
        type: 'GET',
    })
    .done(function (response) {
        showHotels(response.result.data);
        showPaginationHotels(response.result.paginator, 1);
    });
}
// Display pagination follow data
function displayPaginateHotels() {
    $(document).on('click', '.js-pagination-item', function (e) {
        var current_page = $(this).text();
        e.preventDefault();
        $.ajax({
            url: "/api/hotels?perpage=6&page=" + current_page,
            type: 'GET',
        })
        .done(function (response) {
            showHotels(response.result.data);
            showPaginationHotels(response.result.paginator, current_page);
        });
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
                // Clear last Invalid
                $('.invalid-feedback').hide();
                $('.invalid-feedback span').html('');
                // If response code equal 200
                if (response.code == 200) {
                    showHotels(response.result.data);
                } else {
                    console.log("server error");
                }
            },
            error: function (response) {
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
// Show Hotels
function showHotels(data) {
    $('#js-item-list').empty();
    data.forEach(function(type) {
        var html = '';
        html += '<div class="col-md-6 col-sm-6 animate-box fadeInUp animated-fast">';
        html += '<div class="hotel-entry" id="js-hotel-' + type.id + '"">';
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
        html += '<span class="place">' + type.city + ' ' + type.country + '</span>';
        html += '<p style="height: 50px; overflow: hidden; text-overflow: ellipsis;">' + type.descript + '</p>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        $('#js-item-list').append(html);
    });
}
// Show Pagination
function showPaginationHotels(paginator, current_page) {
    $('.js-pagination').empty();
    var pagination = '<li class="disabled"><a href="#">&laquo;</a></li>';
    var page = Math.ceil(paginator.total/paginator.per_page);
    for (var i = 1; i <= page; i++) {
        if (current_page == i) {
            pagination += '<li class="active js-pagination-item"><a href="#" id="js-pagination-' + i + '">' + i + '</a></li>';
        } else {
            pagination += '<li class="js-pagination-item"><a href="#" id="js-pagination-' + i + '">' + i + '</a></li>';
        }
    }
    pagination += '<li><a href="#">&raquo;</a></li>';
    $('.js-pagination').append(pagination);
}

$(document).ready(function() {
    getHotels();
    displayHotelsFollowForm();
    displayPaginateHotels();
});
