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


	var isMobile = {
	    Android: function() {
	        return navigator.userAgent.match(/Android/i);
	    },
	    BlackBerry: function() {
	        return navigator.userAgent.match(/BlackBerry/i);
	    },
	    iOS: function() {
	        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	    },
	    Opera: function() {
	        return navigator.userAgent.match(/Opera Mini/i);
	    },
	    Windows: function() {
	        return navigator.userAgent.match(/IEMobile/i);
	    },
	    any: function() {
	        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	    }
	};

	$(document).on("click", '.fa-whatsapp', function() {
	    if( isMobile.any() ) {
	        var text = $(this).attr("data-text");
	        var url = $(this).attr("data-link");
	        var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
	        var whatsapp_url = "whatsapp://send?text=" + message;
	        window.location.href = whatsapp_url;
	    } else {
	        alert("Please share this article in mobile device");
	    }
	});





	// listing cash value
	$("#o_actValue").keyup(function(e) {
		$("#w_price_1").html("GH&cent;"+this.value);
	});


	// list offer option
	$("#cashOpt").css({"display":"none"});

	$("#w_tradeType_1_1").click(function(e){
		$("#barterOpt").css({"display":"block"});
		$("#cashOpt").css({"display":"none"});
	});

	$("#w_tradeType_1_2").click(function(e){
		$("#barterOpt").css({"display":"none"});
		$("#cashOpt").css({"display":"block"});
	});
});

