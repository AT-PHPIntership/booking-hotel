function getCities() {
  	$.ajax({
    	url: "/api/cities",
    	type: 'GET',
  	})
  	.done(function (response) {
        response.result.forEach(function(type) {
            var html = "";
            html += "<li class='js-city-list-item' style='display: none; list-style-type: none;' id='" + type.id + "'>" + type.city + ", " + type.country + "</li>";
            $('#js-city-list').append(html);
        });
	});
}

// Display city from database
function displayCity() {
    $("#js-city").on("keyup", function() {
        $("#js-city-list").show();
        var value = $(this).val().toLowerCase();
        $("#js-city-list li").filter(function() {
            if (value != "" & $(this).text().toLowerCase().indexOf(value) > -1){
                $(this).show();
                $("#js-city_id").val($(this).attr(''));
            } else {
                $(this).hide();
            }
        });
    });
}

// Choose city from list
function chooseCity() {
    $(document).on('click', '#js-city-list li', function (e) {
        $("#js-city").val($(this).text());
        $("#js-city_id").val($(this).attr('id'));
        $("#js-city-list").hide();
    });
}

// When load page
$(document).ready(function() {
  	getCities();
    displayCity();
    chooseCity();
});
