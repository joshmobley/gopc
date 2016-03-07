$(document).ready(function(){

	function mobileNav(){
		$('.menu-link').click(function(event){
			event.preventDefault();
			$('.nav-wrapper').toggleClass('visible');
			$('body').toggleClass('no-scroll');
		});
	}

	mobileNav();

	function activeTab(container){
		$(container).children('.container').first().addClass('is-active');
		$(container).children('.tab').first().addClass('is-active');
		$(container).children('.tab').click(function(event){
			event.preventDefault();
			if( $(this).hasClass('is-active') ){

			}else{
				$(container).children('.is-active').removeClass('is-active');
				$(this).addClass('is-active');
				$(this).siblings('.container.' + $(this).attr('data-tab')).addClass('is-active');
			}
		});
	}

	//activeTab($('.features-and-specs'));

});