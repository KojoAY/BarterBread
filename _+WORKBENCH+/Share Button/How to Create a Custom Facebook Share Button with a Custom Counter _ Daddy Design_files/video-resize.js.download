jQuery(document).ready(function(jQuery) {
	if (jQuery('body.touch #hero video').css('display') == 'none' ){
		jQuery('body.touch #hero video').get(0).pause();
		jQuery('body.touch #hero video').remove();
		jQuery('body.touch #hero').addClass('novid');
	}
			
	jQuery(window).load(function() {
		    resizeVideo('#hero video');
    });
	
	jQuery(window).resize(function() {
			resizeVideo('#hero video');
			
			if (jQuery('body.touch #hero video').css('display') == 'none' ){
				jQuery('body.touch #hero video').get(0).pause();
				jQuery('body.touch #hero video').remove();
				jQuery('body.touch #hero').addClass('novid');
			}
			if (jQuery('body.touch #hero .wrapper').css('background-image') == 'none' && jQuery('body.touch #hero').hasClass('novid')){
			    jQuery('body.touch #hero .wrapper').append('<video width="1000" height="540" autoplay loop><source src="http://www.daddydesign.com/wp-content/themes/daddydesign/video/ddvid.mp4" type="video/mp4"><source src="http://www.daddydesign.com/wp-content/themes/daddydesign/video/ddvid.ogv" type="video/ogg"><source src="http://www.daddydesign.com/wp-content/themes/daddydesign/video/ddvid.webm" type="video/webm"></video>');
			    jQuery('body.touch #hero').removeClass('novid');
				resizeVideo('body.touch #hero video');
			}
	});
});

function resizeVideo(theItem){
	var containerWidth=jQuery('#hero .wrapper').width();
	var containerHeight=jQuery('#hero .wrapper').height();
	var videoWidth=jQuery(theItem).width();
	var videoHeight=jQuery(theItem).height();
	var aspectHeight = videoHeight / videoWidth;
	var aspectWidth = videoWidth / videoHeight;
	
	if ((containerHeight / containerWidth) < aspectHeight) {
		jQuery(theItem).css("width",containerWidth);
		jQuery(theItem).css("height",aspectHeight*containerWidth);
	} else {
		jQuery(theItem).css("height",containerHeight);
		jQuery(theItem).css("width",aspectWidth*containerHeight);
	};
	
	jQuery(theItem).css("left",(containerWidth - jQuery(theItem).width())/2);
    jQuery(theItem).css("top",(containerHeight - jQuery(theItem).height())/2);
	jQuery(theItem).css("position","absolute");
};