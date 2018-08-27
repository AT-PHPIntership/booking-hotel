function getSlides() {
  $.ajax({
    url: "/api/slides",
    type: 'GET',
  })
  .done(function (response) {
    showSlides(response.result);
  });
}

function showSlides(data) {
  var id = 1;
  data.forEach(function(type) {
    var html = type.image;
    $('#js-silde-' + id).css('background-image', 'url(upload/slide/' + html + ')');
    id ++;
  });
}

$(document).ready(function() {
  getSlides();
});
