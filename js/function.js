(function($) {
	
	// youtube downloader function
	$( "input" ).click(function() {
		$("input").val('');
	});
	$( "#dldsong" ).click(function() { // action to do when you press " download it"
		hide_download_input();
		$.ajax({ // now make a " request " to server ( here is sending your link to "api.php" file who will do the rest of things
			
            type: "POST",
            url: "api.php",
            data: { download: $( "#ylink" ).val() },
            dataType: "json",
            success: function (data) { // now get the response from "api.php" file and show it to you
				$( "#loading" ).hide('fast');
				$( "#statuslabel" ).text('Just paste your song link here!');
                var slink = data['songinfo']['fisier'];
				$( "#dlready" ).html('<a class="btn btn-default btn-xl text-center col-xs-12" id="done" href="/downloads/?f='+ encodeURIComponent(slink)  +'">Download '+ slink  +'</a>'); // right here
            },
            error: function (result) { //if something is wrong is showing an error
                $( "#statuslabel" ).text('Hops! Try again! Just paste your song link here!');
				$( "#loading" ).hide('fast');
				console.log(result);
				show_download_input();
            }
        });
	});
	
	$(document).on('click', '#done',function(e){
		show_download_input();
	});
	
	function show_download_input() {
		$("input").prop('disabled', false);
		$( "#dlpreg" ).show('fast');
		$( "#dlready" ).html('');
		$("input").val('');
		return true;
	}
	function hide_download_input() {
		$( "#dlpreg" ).hide('fast'); // hide input link
		$( "#loading" ).show('fast'); // show you a " progress "
		$("input").prop('disabled', true);
		$( "#statuslabel" ).text('Download in progress.. Please wait..'); // show you a " progress "
		return true;
	}
	
	// end youtube downloader
	
	// about template now

  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 48)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 48
  });

  // Collapse the navbar when page is scrolled
  $(window).scroll(function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-shrink");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  });

  // Scroll reveal calls
  window.sr = ScrollReveal();
  sr.reveal('.sr-icons', {
    duration: 600,
    scale: 0.3,
    distance: '0px'
  }, 200);
  sr.reveal('.sr-button', {
    duration: 1000,
    delay: 200
  });
  sr.reveal('.sr-contact', {
    duration: 600,
    scale: 0.3,
    distance: '0px'
  }, 300);
  
})(jQuery); // End of use strict


