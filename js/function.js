(function($) {
	$(document).keypress(function (e) {
		if (e.which == 13) {
			$("#bossbutton").trigger( "click" );
		}
	});
	
	$( "input" ).click(function() {
		$("input").val('');
	});
	
	$( ".fa-refresh" ).click(function() {
		var youtube_url = $(this).attr( "yturl" );
		var youtube_id  = $(this).attr( "ytid" );
		$("input").val(youtube_url);
		$("#bossbutton").trigger( "click" );
		window.history.pushState('download', 'Download song', '/watch?v='+youtube_url);
	});
	
	$( "#bossbutton" ).click(function() {
		if($('.bossbutton').attr('download')) {
			var slink = $('.bossbutton').attr('download');
			window.location.href = "/downloads/?f=" + slink;
			$("#bossbutton").removeAttr( "download" );
			$( "#statuslabel" ).text('Just paste your song link here!');
			$("input").val('');
			$("input").prop('disabled', false);
			$("#bossbutton").prop('disabled', false);
		} else {
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
				data: { download: $( "#ylink" ).val() },
				dataType: "json",
				// xhrFields: {
					// onprogress: function(e) {
						// $('#statuslabel').html(e.target.responseText);
					// }
				// },
				success: function (data) {
					$('.input-group-addon').find('i').removeClass('fa-refresh fa-meh-o fa-spin fa-fw');
					$('.input-group-addon').find('i').addClass('fa-youtube');
					var file_title	= data['songinfo']['titlu'];
					var slink		= data['songinfo']['id'];
					var size		= data['songinfo']['size'];
					$("#bossbutton").prop('disabled', false);
					$('#bossbutton').html('Download');
					$('#bossbutton').attr("download",slink);
					$( "#statuslabel" ).text('File "' + file_title.substring(0, 30) + '..." ('+size+') is ready to download :)');
				},
				error: function (result) {
					$( "#statuslabel" ).text('Wops! Try again! Just paste your song link here!');
					$("input").prop('disabled', false);
					$("#bossbutton").prop('disabled', false);
					$('.input-group-addon').find('i').removeClass('fa-refresh fa-spin fa-fw');
					$('.input-group-addon').find('i').addClass('fa-meh-o fa-spin');
					console.log(result['responseText']);
					$('#bossbutton').html('Download');
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


