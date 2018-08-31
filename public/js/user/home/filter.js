// Show hotels follow filter
function displayHotelsFollowFilter() {
    $(document).on('change', '.js-filter-item', function (e) {
		if ($('input[name="date_checkin"]').val() == "" || $('input[name="date_checkout"]').val() == "") {
            var d = new Date();
            var month = d.getMonth()+1;
            var day = d.getDate();
            var today = d.getFullYear() + '/' + (month<10 ? '0' : '') + month + '/' + (day<10 ? '0' : '') + day;
            var date_checkin = today;
            var date_checkout = today;
        } else {
            var date_checkin = $('input[name="date_checkin"]').val();
            var date_checkout = $('input[name="date_checkout"]').val();
        }
		var people = $('select[name="people"]').val();
    	var price_from = $('select[name="price_from"]').val();
    	var price_to = $('select[name="price_to"]').val();
    	var price = [];
    	if (parseInt(price_to) >= parseInt(price_from) & parseInt(price_to) != 0 & parseInt(price_from) != 0) {
    		var price = [price_from, price_to];
    	} else {
    		var price = [0, 1000000000];
    	}
    	var star = [];
    	$('input[name="star[]"]:checked').each(function() {
   			star.push(this.value);
		});
		var atLeastOneIsChecked = $('input[name="star[]"]:checked').length > 0;
		if (atLeastOneIsChecked == false) {
			star = [1, 2, 3, 4, 5];
		}
        e.preventDefault();
        $.ajax({
            headers: {
                'Accept': 'application/json',
            },
            url: '/api/hotels-filter',
            type: "POST",

            data: {
                date_checkin: date_checkin,
                date_checkout: date_checkout,
                people: people,
                price: price,
                star: star,
            },

            success: function (response) {
                showHotels(response.result.data);
                showPaginationFilters(response.result.paginator, 1);
            },
        });
    }); 
}
// Display pagination follow data
function displayPaginateFilters() {
    $(document).on('click', '.js-pagination-item-filter', function (e) {
        if ($('input[name="date_checkin"]').val() == "" || $('input[name="date_checkout"]').val() == "") {
            var d = new Date();
            var month = d.getMonth()+1;
            var day = d.getDate();
            var today = d.getFullYear() + '/' + (month<10 ? '0' : '') + month + '/' + (day<10 ? '0' : '') + day;
            var date_checkin = today;
            var date_checkout = today;
        } else {
            var date_checkin = $('input[name="date_checkin"]').val();
            var date_checkout = $('input[name="date_checkout"]').val();
        }
        var people = $('select[name="people"]').val();
        var price_from = $('select[name="price_from"]').val();
        var price_to = $('select[name="price_to"]').val();
        var price = [];
        if (parseInt(price_to) >= parseInt(price_from) & parseInt(price_to) != 0 & parseInt(price_from) != 0) {
            var price = [price_from, price_to];
        } else {
            var price = [0, 1000000000];
        }
        var star = [];
        $('input[name="star[]"]:checked').each(function() {
            star.push(this.value);
        });
        var atLeastOneIsChecked = $('input[name="star[]"]:checked').length > 0;
        if (atLeastOneIsChecked == false) {
            star = [1, 2, 3, 4, 5];
        }
        var current_page = $(this).text();
        e.preventDefault();
        $.ajax({
            url: "/api/hotels-filter?perpage=6&page=" + current_page,
            type: 'POST',
        
            data: {
                date_checkin: date_checkin,
                date_checkout: date_checkout,
                people: people,
                price: price,
                star: star,
            },
            success: function (response) {
                showHotels(response.result.data);
                showPaginationFilters(response.result.paginator, current_page);
            },
        });
    }); 
}
// Show Pagination
function showPaginationFilters(paginator, current_page) {
    $('.js-pagination').empty();
    var pagination = '<li class="disabled"><a href="#">&laquo;</a></li>';
    var page = Math.ceil(paginator.total/paginator.per_page);
    for (var i = 1; i <= page; i++) {
        if (current_page == i) {
            pagination += '<li class="active js-pagination-item-filter"><a href="#" id="js-pagination-' + i + '">' + i + '</a></li>';
        } else {
            pagination += '<li class="js-pagination-item-filter"><a href="#" id="js-pagination-' + i + '">' + i + '</a></li>';
        }
    }
    pagination += '<li><a href="#">&raquo;</a></li>';
    $('.js-pagination').append(pagination);
}

$(document).ready(function() {
    // Display Hotels
    displayHotelsFollowFilter();
    displayPaginateFilters();
});
