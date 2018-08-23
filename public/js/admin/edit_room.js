$(document).ready(function(){
	var deleteImage = [];
    $(".js-room-image").click(function(){
   		// Get Id image and delete text into room-image item
        var idImage = $("#" + $(this).attr("id") + " img").attr("id");
        var idDeleteItem = $("#" + $(this).attr("id") + " span").attr("style");
        // Hide or Display image
        if(idDeleteItem === "display: none;"){
        	$("#" + idImage).hide();
        	$("#" + $(this).attr("id") + " span").attr("style","display: hide;");
            var image = $("#" + idImage).attr("id");
            deleteImage.push(image);
            $("#image-delete").attr("value", deleteImage);
        } else {
        	$("#" + idImage).show();
			$("#" + $(this).attr("id") + " span").attr("style","display: none;");
            var image = $("#" + idImage).attr("id");
            deleteImage.splice( $.inArray(image, deleteImage), 1);
            $("#image-delete").attr("value", deleteImage);
        }
    });
});
