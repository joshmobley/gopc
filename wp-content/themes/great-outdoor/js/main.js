$(document).ready(function(){

	function mobileNav(){
		$('.menu-link').click(function(event){
			event.preventDefault();
			$('.nav-wrapper').toggleClass('visible');
			$('body').toggleClass('no-scroll');
		});
	}

	mobileNav();

});