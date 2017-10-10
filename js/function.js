(function ($) {
    $(document).keypress(function (e) {
        if (e.which === 13) {
            $("#bossbutton").trigger("click");
        }
    });

    $("#sinfo_download").click(function () {
        $("#bossbutton").trigger("click");
    });

    // $( "input" ).click(function() {
    // $("input").val('');
    // });

    $("#morecontent").click(function () {
        $("#content").show('fast');
    });

    $(document).on("click", ".download", function () {
        var youtube_url = $(this).attr("ytid");
        window.history.pushState('download', 'Download song', '/watch?v=' + youtube_url);
        ga('send', 'pageview', '/watch?v=' + youtube_url);
        ga('send', 'pageview');
        $("input").val('https://www.youtube.com/watch?v=' + youtube_url);
        $("#bossbutton").removeAttr("download");
        $("#bossbutton").trigger("click");
    });

    $("#bossbutton").click(function () {
        $(".alert").remove();
        $("#box_search").html('');
        if ($('.bossbutton').attr('download')) {
            window.history.pushState('download', '', '/');
            ga('send', 'pageview');
            ga('send', 'pageview', '/');
            var slink = $('.bossbutton').attr('download');
            window.location.href = "/downloads/?f=" + slink;
            $("#bossbutton").removeAttr("download");
            $("#statuslabel").text('Just paste your link or type a song name!');
            $("input").val('');
            $("input").prop('disabled', false);
            $("#bossbutton").prop('disabled', false);
            $("#box_content_file").hide('fast', function () {
                $("#box_content_history").show('fast');
            });
        } else {
            window.history.pushState('download', 'Download in progress.. Please wait..', '/watch?v=' + $("#ylink").val());
            $("input").prop('disabled', true);
            $("#bossbutton").prop('disabled', true);
            $("#bossbutton").html('Wait...');
            $("#statuslabel").text('Download in progress.. Please wait..');
            var collapsed = $(this).find('i').hasClass('fa-youtube');
            $('.input-group-addon').find('i').removeClass('fa-youtube');
            $('.input-group-addon').find('i').addClass('fa-refresh fa-spin fa-fw');
            if (collapsed)
                $(this).find('i').toggleClass('fa youtube');

            if ($("#ylink").val().indexOf('youtube.com') > -1)
            {
                $.ajax({
                    type: "POST",
                    url: "api.php",
                    data: {
                        download: $("#ylink").val(),
                        key: API_KEY
                    },
                    dataType: "json",
                    // xhrFields: {
                    // onprogress: function(e) {
                    // $('#statuslabel').html(e.target.responseText);
                    // }
                    // },
                    success: function (data) {
                        var file_title = data['songinfo']['titlu'];
                        var slink = data['songinfo']['id'];
                        var size = data['songinfo']['size'];
                        var addedon = data['songinfo']['addedon'];
                        var downloads = data['songinfo']['downloads'];
                        window.history.pushState('download', file_title, '/watch?v=' + slink);
                        ga('send', 'pageview', '/watch?v=' + slink);
                        ga('send', 'pageview');
                        $('#sinfo_title').html(file_title);
                        $('#sinfo_size').html(size);
                        $('#sinfo_date').html(addedon);
                        $('#sinfo_downloads').html(downloads);
                        $('#audioplayer').remove();
                        $('audio').append('<source id="audioplayer" src="http://www.pitube.ml/downloads/?f=' + slink + '&embed" type="audio/ogg">');
                        $("#box_content_history").hide('fast', function () {
                            $("#box_content_file").show('fast');
                        });
                        $('.input-group-addon').find('i').removeClass('fa-refresh fa-meh-o fa-spin fa-fw');
                        $('.input-group-addon').find('i').addClass('fa-smile-o');
                        $("#bossbutton").prop('disabled', false);
                        $('#bossbutton').html('<i class="fa fa-arrow-down" aria-hidden="true" title="Download ' + file_title + '"></i>');
                        $('#bossbutton').attr("download", slink);
                        $("#statuslabel").text('File "' + file_title.substring(0, 50) + '..." is ready to download :)');
                    },
                    error: function (result) {
                        error(result['responseJSON']['message']);
                    }
                });
            } else {
                $("input").prop('disabled', false);
                $("#bossbutton").prop('disabled', false);
                $("#bossbutton").html('Search');
                $("#statuslabel").text('Search result for "' + $("#ylink").val() + '"');
                $("#box_search").show('fast', function () {
                    $("#box_content_history").hide();
                });

                $.ajax({
                    type: "POST",
                    url: "api.php",
                    data: {
                        search: $("#ylink").val(),
                        key: API_KEY
                    },
                    dataType: "json",
                    success: function (data) {
                        var searchlist = '<ul class="listrap">';
                        data.forEach(function (result) {
                            searchlist += '<li ytid="' + result['id']['videoId'] + '" class="download"><div class="listrap-toggle"><span></span><img src="' + result['snippet']['thumbnails']['default']['url'] + '" class="img-circle"></div><strong>' + result['snippet']['title'] + '</strong></li>';
                        });
                        searchlist += '</ul>';
                        $("#box_search").append(searchlist);
                    },
                    error: function (result) {
                        console.error(result);
                    }
                });
            }
        }
    });

    document.getElementById('ylink').focus();

    $(window).scroll(function () {
        if ($("#mainNav").offset().top > 100) {
            $("#mainNav").addClass("navbar-shrink");
        } else {
            $("#mainNav").removeClass("navbar-shrink");
        }
    });

    function error(param) {
        window.history.pushState('download', "Not found", '/error/');
        ga('send', 'pageview', '/error/');
        ga('send', 'pageview');
        $("#statuslabel").text('Wops! Try again! Just paste your link or type a song name');
        $("#form").prepend('<div class="alert alert-danger"><strong>Error: </strong>' + param + '</div>');
        $("input").prop('disabled', false);
        $("#bossbutton").prop('disabled', false);
        $('.input-group-addon').find('i').removeClass('fa-refresh fa-spin fa-fw');
        $('.input-group-addon').find('i').addClass('fa-meh-o fa-spin');
        $('#bossbutton').html('<i class="fa fa-refresh" aria-hidden="true" title="Retry"></i>');
        $("input").val('');
        document.getElementById('ylink').focus();
    }
})(jQuery);


