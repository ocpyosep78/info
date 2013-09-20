jQuery(document).ready(function( $ ){
	"use strict";

	/* Menu */
	$('.top-menu li, .main-menu li, .float-menu li').has("ul").find( "a:first" ).append( '<span class="submenu-indicator">&raquo;</span>' );
	$('.top-menu li ul, .main-menu li ul, .float-menu li ul').hide();
	$('.top-menu li, .main-menu li, .float-menu li').hoverIntent(function(){
		$(this).find("ul:first").slideToggle(200);
	});

	/* Floated Navigation */
	$(window).scroll( function(){
		if($(this).scrollTop() > 300) {
			$(".floated-navigation").stop().animate({ top: '0' }, 300);
		}else{
			$(".floated-navigation").stop().animate({ top: '-60px' }, 300);
		}
	});	

	/* Post Meta Thumbnail */
	$(".post-hover-animate").hoverIntent(function(){
		$(this).find(".post-thumb-meta:first").stop().animate({ bottom: '0' }, 300);
	}, function(){
		$(this).find(".post-thumb-meta:first").stop().animate({ bottom: '-35px' }, 300);
	});

	/* Tabs & Accordion*/
	$(".tabs").tabs();
	$(".accordion").accordion({collapsible: true});

	/* Tooltip */
	$(".widget-news-picture a").tipsy({fade: false, gravity: 's'});
	$(".social-profiles a").tipsy({fade: true, gravity: 's'});
	$(".tipsy").tipsy({fade:false});

	/* Scroll to Top */
	$(".back-to-top").click(function(){
		$("body, html").animate({
			scrollTop: 0
		}, 800);
		return false;
	});

	/* Alert Control */
	$(".alert .alert-control").click(function(){
		$(this).parent().slideUp(500);
	});

	/* Mobile Menu */
	$(".main-navigation .main-menu-mobile .placeholder-menu").click(function(){
		$(this).parent().find(".main-mobile-menu").slideToggle(200);
	});
	$(".top-navigation .top-menu-mobile .icon-menu").click(function(){
		$(this).parent().find(".top-mobile-menu").slideToggle(200);
	});

});