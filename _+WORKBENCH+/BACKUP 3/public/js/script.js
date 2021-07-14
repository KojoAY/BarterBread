// JavaScript Document
function getPhoto(id) {
	getNo = id.substr(8);
	photoHolder = $(".details-thumbs > a"); 

	imageLink = $(".details-thumbs > a > img")[getNo].getAttribute("src");
	imageName = imageLink.substr(21);
	$(".offer-pics").attr({"style" : "background-image: url(/photos/items/" + imageName + ")"});
	
	currPhoto = ".details-thumbs > a#" + id;
	$(currPhoto).css({'opacity':'.5'});
	
	// get the index of the current thumbnail
	getIndex = photoHolder.eq(getNo).css({'opacity':'.5'});
	// highlight all other thumbnails except the photo displayed
	photoHolder.not(getIndex).css({'opacity':'1'});

}


$(document).ready(function(e){

	currPhoto = ".details-thumbs > a#offPhoto0";
	$(currPhoto).css({'opacity':'.5'});

});