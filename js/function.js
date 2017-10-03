(function($) {
	$(document).keypress(function (e) {
		if (e.which == 13) {
			$("#bossbutton").trigger( "click" );
		}
	});
	
	$( "#sinfo_download" ).click(function() {
		$("#bossbutton").trigger( "click" );
	});
	
	// $( "input" ).click(function() {
		// $("input").val('');
	// });
	
	$( "#morecontent" ).click(function() {
		$( "#content" ).show('fast');
	});
	
	$( ".fa-refresh" ).click(function() {
		var youtube_url = $(this).attr( "ytid" );
		window.history.pushState('download', 'Download song', '/watch?v='+youtube_url);
		ga('send', 'pageview', '/watch?v='+youtube_url);
		ga('send', 'pageview');
		$("input").val('https://www.youtube.com/watch?v='+youtube_url);
		$("#bossbutton").removeAttr( "download" );
		$("#bossbutton").trigger( "click" );		
	});
	
	$( "#bossbutton" ).click(function() {
		$(".alert").remove();
		if($('.bossbutton').attr('download')) {
			window.history.pushState('download', '', '/');
			ga('send', 'pageview');
			ga('send', 'pageview', '/');
			var slink = $('.bossbutton').attr('download');
			window.location.href = "/downloads/?f=" + slink;
			$("#bossbutton").removeAttr( "download" );
			$( "#statuslabel" ).text('Just paste your song link here!');
			$("input").val('');
			$("input").prop('disabled', false);
			$("#bossbutton").prop('disabled', false);
			$("#box_content_file").hide('fast', function(){
				$("#box_content_history").show('fast');
			});
		} else {
			window.history.pushState('download', 'Download in progress.. Please wait..', '/watch?v='+$( "#ylink" ).val());
			$("input").prop('disabled', true);
			$("#bossbutton").prop('disabled', true);
			$( "#bossbutton" ).html('Wait...');
			$( "#statuslabel" ).text('Download in progress.. Please wait..');
			var collapsed=$(this).find('i').hasClass('fa-youtube');
			$('.input-group-addon').find('i').removeClass('fa-youtube');
			$('.input-group-addon').find('i').addClass('fa-refresh fa-spin fa-fw');
			if(collapsed)
			$(this).find('i').toggleClass('fa youtube');
			$.ajax({
				type: "POST",
				url: "api.php",
				data: {
					download: $( "#ylink" ).val(),
					key: API_KEY
				},
				dataType: "json",
				// xhrFields: {
					// onprogress: function(e) {
						// $('#statuslabel').html(e.target.responseText);
					// }
				// },
				success: function (data) {
					var file_title	= data['songinfo']['titlu'];
					var slink		= data['songinfo']['id'];
					var size		= data['songinfo']['size'];
					var addedon		= data['songinfo']['addedon'];
					var downloads	= data['songinfo']['downloads'];
					window.history.pushState('download', file_title, '/watch?v='+slink);
					ga('send', 'pageview', '/watch?v='+slink);
					ga('send', 'pageview');
					$('#sinfo_title').html(file_title);
					$('#sinfo_size').html(size);
					$('#sinfo_date').html(addedon);
					$('#sinfo_downloads').html(downloads);
					$('audio').append('<source id="audioplayer" src="http://www.music-server.ml/downloads/?f=' + slink + '&embed" type="audio/ogg">');
					$("#box_content_history").hide('fast', function(){
						$("#box_content_file").show('fast');
					});
					$('.input-group-addon').find('i').removeClass('fa-refresh fa-meh-o fa-spin fa-fw');
					$('.input-group-addon').find('i').addClass('fa-smile-o');
					$("#bossbutton").prop('disabled', false);
					$('#bossbutton').html('<i class="fa fa-arrow-down" aria-hidden="true" title="Download '+file_title+'"></i>');
					$('#bossbutton').attr("download",slink);
					$( "#statuslabel" ).text('File "' + file_title.substring(0, 50) + '..." is ready to download :)');
				},
				error: function (result) {
					window.history.pushState('download', "Not found", '/error/');
					ga('send', 'pageview', '/error/');
					ga('send', 'pageview');
					$( "#statuslabel" ).text('Wops! Try again! Just paste your song link here!');
					$( "#form" ).prepend('<div class="alert alert-danger"><strong>Error: </strong>'+result['responseJSON']['message']+'</div>');
					$("input").prop('disabled', false);
					$("#bossbutton").prop('disabled', false);
					$('.input-group-addon').find('i').removeClass('fa-refresh fa-spin fa-fw');
					$('.input-group-addon').find('i').addClass('fa-meh-o fa-spin');
					console.log(result);
					$('#bossbutton').html('<i class="fa fa-refresh" aria-hidden="true" title="Retry"></i>');
					$("input").val('');
					document.getElementById('ylink').focus();
				}
			});
		}
	});
	
	document.getElementById('ylink').focus();
	
	$(window).scroll(function() {
		if ($("#mainNav").offset().top > 100) {
			$("#mainNav").addClass("navbar-shrink");
		} else {
			$("#mainNav").removeClass("navbar-shrink");
		}
	});
})(jQuery);


