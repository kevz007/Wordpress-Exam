(function($){
$(document).ready(function() {
    var $menu = $("#main-menu").clone().appendTo(".mobile-menu");
	$menu.find('ul').removeAttr('id');

	gsap.registerPlugin(ScrollTrigger);

	ScrollTrigger.create({
		start:"top top",
		end: () => "+=" + document.querySelector("#containerMain").offsetHeight,
		trigger:"#header",
		pin:true, 
        pinSpacing:false 
	});

	//Navigation Section
	const hamburger = document.querySelector('.menu-open');
	const closeMenu = document.querySelector('.closeNav');
	const navTL = gsap.timeline({paused:true, reversed:true});
	navTL.to("#container-nav", {x: "0"})
	     .to("body",{duration:0.1,height:"100vh", overflowY:"hidden"});
		/* .from(CSSRulePlugin.getRule("#container-nav:before"), {duration:1, cssRule:{y:"-100%"}},"-=.5")
		 .from("#container-nav .container h3 span", {y: "100%", stagger:0.20},"-=1")
		 .from("#container-nav figure img", {opacity:0},"-=1")		 
		 .from("#container-nav #menu ul li a", {y: "-100%", stagger:0.15},"-=.5"); */
	
	hamburger.addEventListener('click', () =>{
		navTL.reversed() ? navTL.play() : navTL.reverse(1); 
	});
	closeMenu.addEventListener("click", function (e){			 
		navTL.reverse(1)
		e.preventDefault();		  
	});  
});

})(jQuery);