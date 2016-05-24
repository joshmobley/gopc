$(document).ready(function(){

    $('.do-filter-open, .do-filter-close').on('click', function(event){
        event.preventDefault();
        $('.post-filter .responsive-column').toggleClass('is-open');
    });

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
        var $allVideos = $("iframe[src^='http://www.youtube.com'], iframe[src^='https://www.youtube.com'], iframe[src^='//player.vimeo.com'], iframe[src^='https://player.vimeo.com'], iframe[src^='http://player.vimeo.com'], iframe[src^='https://www.google.com/maps/']"),

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

    /* mega menu animation */
    $('#menu-main-nav li').hover( function(){
        if( $(window).width() >= 1200 ){
            $('#' + $(this).attr('data-mega')).addClass('is-open');
        }
    }, function(){
        if( $(window).width() >= 1200 ) {
            $('#' + $(this).attr('data-mega')).removeClass('is-open');
        }

    });

    $('#menu-main-nav > li > a').on('click', function(event){
        if( $(window).width() < 1200){
            event.preventDefault();
            $(this).siblings('.mega-menu').addClass('is-open');
            $('.do-menu-close').addClass('is-open').on('click', function(){
                $(this).removeClass('is-open');
                $('.mega-menu').removeClass('is-open');
            });
        }
    });

    /* hack alert -- looking at path to expose children on product filter */

    //console.log(window.location.pathname.split('/'));
    var loc = window.location.pathname.split('/');

    $('.post-filter .children').each( function(){

        var ul = $(this);
        var path = ul.attr('data-path');

        for( var i = 0; i < loc.length; i++ ){
            if( loc[i] == path ){
                ul.addClass('is-active');
            }
        }

    });



});
