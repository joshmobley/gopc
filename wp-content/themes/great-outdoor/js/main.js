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

	activeTab($('.features-and-specs'));

    /* resize video embeds to fit */

    function youtubeResize(){

        // Find all YouTube videos
        var $allVideos = $("iframe[src^='http://www.youtube.com'], iframe[src^='https://www.youtube.com'], iframe[src^='//player.vimeo.com'], iframe[src^='https://player.vimeo.com'], iframe[src^='http://player.vimeo.com']"),

            // The element that is fluid width
            $fluidEl = $(".half-width, .blog-content");

        // Figure out and save aspect ratio for each video
        $allVideos.each(function() {

          $(this)
            .data('aspectRatio', this.height / this.width)

            // and remove the hard coded width/height
            .removeAttr('height')
            .removeAttr('width');

        });

        // When the window is resized
        $(window).resize(function() {

          var newWidth = $fluidEl.width();

          // Resize all videos according to their own aspect ratio
          $allVideos.each(function() {

            var $el = $(this);
            $el
              .width(newWidth)
              .height(newWidth * $el.data('aspectRatio'));

          });

        // Kick off one resize to fix all videos on page load
        }).resize();
    }

    youtubeResize();

    function ajaxPostFilter( el ){
        $(el).find('.cat-item').click( function(event){
            event.preventDefault();


            var num_id = $(this).attr('class').match(/\d+/);
            $(this).toggleClass('active');

            console.log(num_id);
        });
    }

    //ajaxPostFilter('.post-filter');


    $('#menu-main-nav li').hover( function(){
        $('#' + $(this).attr('data-mega')).stop().fadeIn().delay(200);
    }, function(){
        $('#' + $(this).attr('data-mega')).stop().fadeOut(50);
    });

});
