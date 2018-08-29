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