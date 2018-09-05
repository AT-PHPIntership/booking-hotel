var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
$('#startDate').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd',
    iconsLibrary: 'fontawesome',
    minDate: today,
  	startDate: '+0d',
});

$("#startDate").on("change paste keyup", function() {
	var minDay = new Date($('#startDate').val());
	$('#endDate').datepicker({
	    uiLibrary: 'bootstrap4',
	    format: 'yyyy-mm-dd',
	    iconsLibrary: 'fontawesome',
	    minDate: minDay,
	    startDate: '+1d',
	}); 
});
