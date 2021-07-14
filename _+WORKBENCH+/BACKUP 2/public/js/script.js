// JavaScript Document

$(document).ready(function(e){
    
	
	/*$("#back-top").hide();
	$('.logo-menu').css({'background':'none'});
	
	$(function(){$(window).scroll(function(){
		if($(this).scrollTop()>100){
			//$('#back-top').fadeIn();
			$(".logo-menu").css({'background-color':'#fff'});
		} else {
			//$('#back-top').fadeOut();
			$('.logo-menu').css({'background':'none'});
		}
	});
	
	$('#back-top a').click(function(){
		$('body, html').animate({
			scrollTop:0}, 800); 
			return false;
		});
	});*/
	
	
    // stat menu popup
	$(".stat-popup-container").css({'visibility':'hidden', 'position':'absolute'});

	$("#stat-feat").click(function(e) {
		$(".stat-popup-container").css({'visibility':'visible', 'position':'fixed'});
	});

	$("#close-stat").click(function(e) {
        $(".stat-popup-container").css({'visibility':'hidden', 'position':'absolute'});
    });




	// content menu popup
	$(".content-popup-container").css({'visibility':'hidden', 'position':'absolute'});

	$("#content-feat").click(function(e) {
		$(".content-popup-container").css({'visibility':'visible', 'position':'fixed'});
	});

	$("#close-content").click(function(e) {
        $(".content-popup-container").css({'visibility':'hidden', 'position':'absolute'});
    });




    // settings menu popup
	$(".settings-popup-container").css({'visibility':'hidden', 'position':'absolute'});

	$("#settings-feat").click(function(e) {
		$(".settings-popup-container").css({'visibility':'visible', 'position':'fixed'});
	});

	$("#close-settings").click(function(e) {
        $(".settings-popup-container").css({'visibility':'hidden', 'position':'absolute'});
    });









	
	// book seat popup box on details page
	$(".book-seat-popup").css({'visibility':'hidden'});
	
	$("#book-seat-btn").click(function(e) {
        $(".book-seat-popup").css({'visibility':'visible', 'position':'fixed'});
    });
	
	$(".book-seat-popup .fa-close").click(function(e) {
        $(".book-seat-popup").css({'visibility':'hidden', 'position':'absolute'});
    });
	
	
	
	
	// login popup box
	$(".login-popup").css({'visibility':'hidden'});
	
	$("#login-btn").click(function(e) {
        $(".login-popup").css({'visibility':'visible', 'position':'fixed'});
    });
	
	$(".login-popup .fa-close").click(function(e) {
        $(".login-popup").css({'visibility':'hidden', 'position':'absolute'});
    });
	
	
	
	
	// set lift request popup box
	$(".set-lift-alert-popup").css({'visibility':'hidden'});
	
	$("#set-request-btn").click(function(e) {
        $(".set-lift-alert-popup").css({'visibility':'visible', 'position':'fixed'});
    });
	
	$(".set-lift-alert-popup .fa-close").click(function(e) {
        $(".set-lift-alert-popup").css({'visibility':'hidden', 'position':'absolute'});
    });
	
	
	
	
	
	// rate driver popup box
	$(".rate-user-popup").css({'visibility':'hidden'});
	
	$("#rate-user-btn").click(function(e) {
        $(".rate-user-popup").css({'visibility':'visible', 'position':'fixed'});
    });
	
	$(".rate-user-popup .fa-close").click(function(e) {
        $(".rate-user-popup").css({'visibility':'hidden', 'position':'absolute'});
    });
	
	
	
	
	
	
	
	// rate driver popup box
	$(".del-offer-popup").css({'visibility':'hidden'});
	
	$("#del-offer").click(function(e) {
        $(".del-offer-popup").css({'visibility':'visible', 'position':'fixed'});
    });
	
	$(".del-offer-popup .fa-close").click(function(e) {
        $(".del-offer-popup").css({'visibility':'hidden', 'position':'absolute'});
    });
	
	
	
	
	
	
	
	
	// id verification popup box
	$(".id-verify-popup").css({'visibility':'hidden'});
	
	$("#id-verify-btn").click(function(e) {
        $(".id-verify-popup").css({'visibility':'visible', 'position':'fixed'});
    });
	
	$(".id-verify-popup .fa-close").click(function(e) {
        $(".id-verify-popup").css({'visibility':'hidden', 'position':'absolute'});
    });
});