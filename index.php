<?php
	require __DIR__ . '/config.php';
	if (($link = filter_input(INPUT_GET, 'v', FILTER_SANITIZE_STRING))) {
		$get_id = "https://www.youtube.com/watch?v=".filter_input(INPUT_GET, 'v', FILTER_SANITIZE_STRING);
	} else { 
		$get_id = null;
	}
?>
<!DOCTYPE html>
<html lang="en">

  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="When you choose our YouTube to mp3 converter you get a service that is fully compatible with all modern browsers.Download YouTube videos free of charge, legally and safely!Download from YouTube in MP3 ! Free and fast with direct link! Android APK Application Also avaiable! PEGGO Alternative">
    <title><?=TITLE?></title>
	<meta property="og:title" content="<?=TITLE?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="http://<?=APP_URL?><?=$_SERVER['REQUEST_URI']?>" />
	<meta property="og:image" content="http://<?=APP_URL?>/img/screen.jpg " />
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet">
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', '<?=ANALYTICS_ID?>', 'auto');
	  ga('send', 'pageview');

	</script>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	  (adsbygoogle = window.adsbygoogle || []).push({
		google_ad_client: "ca-pub-6293250485535997",
		enable_page_level_ads: true
	  });
	</script>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/"><?=APP_NAME?></a>
        <a class="navbar-item" id="morecontent" href="#"><?=APP_VERSION?></a>
        
      </div>
    </nav>

    <header class="masthead">
	<section id="page-top">
      <div class="header-content">
        <div class="header-content-inner">
          <h1 id="homeHeading"><?=APP_NAME?></h1>
          <hr>
		  
          <div class="container">
			<div class="row">
			  <div class="col-lg-8 mx-auto text-left">
				<div class="form-group">
					<div id="form" class="form-group has-feedback">
						<label id="statuslabel" class="control-label">Just paste your song link here!</label>
						<div class="input-group">
							<span class="input-group-addon"> <i class="fa fa-youtube"></i></span>
							<input type="text" class="form-control" id="ylink" value="<?=$get_id?>" placeholder="Example: https://www.youtube.com/watch?v=Vb5pn9Z3t30" />
							<button class="form-control bossbutton input-group-addon-right" id="bossbutton"><i class="fa fa-arrow-right" aria-hidden="true" title="Convert it"></i></button>
						</div>
						<div class="form-group box">
							<div id="box_content_file" style="display:none" class="">
								<div class="col-md-12 mx-auto">Title: <b id="sinfo_title"></b></div>
								<div class="col-md-12 mx-auto">Size: <b id="sinfo_size"></b></div>
								<div class="col-md-12 mx-auto">Added on: <b id="sinfo_date"></b></div>
								<div class="col-md-12 mx-auto">Downloads: <b id="sinfo_downloads"></b></div>
								<div class="mx-auto">
									<audio class="col-md-12 mx-auto" controls></audio>
								</div>
								<div class="col-md-12 mx-auto"><button class="col-md-12 btn btn-download" id="sinfo_download">Download</button></div>
								<div class="col-md-3 mx-auto text-center"><small><a href="<?=HTTP_PROTOCOL?>://<?=APP_URL?>/">< Go back</a></small></div>
							</div>
							<div id="box_content_history" class="">
								<?=latest_5()?>
							</div>
							<div class="col-md-3 mx-auto text-center"><small>API Version: <?=APP_VERSION?></small></div>
						</div>
					</div>
				</div>					
				</div>
			  </div>
			</div>
		  </div>
        </div>
      </div>
	  </section>
    </header>

	<div id="content">
	<div class="call-to-action bg-dark">
	
	<div class="container text-left">
		<hr>
			<h3>About <?=APP_NAME?></h3>
			<p>Convert video from YouTube into High Quality MP3 ( 256kbps )</p>
			<p>When you choose our YouTube to mp3 converter you get a service that is fully compatible with all modern browsers.Download YouTube videos free of charge, legally and safely!Download from YouTube in MP3 ! Free and fast with direct link!</p>
			<ul>
				<li>No download speed limit</li>
				<li>No time limit - Convert a video even if is 10 hours longer</li>
				<li>Direct Link & No ads</li>
				<li>High Quality ( 256kb/s ) MP3</li>
				<li>Open Source</li>
				<li>Free :)</li>
			</ul>
		</div>
	</div>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="primary">
            <p>Do you like my work? That's great! If you need something send me an email and i will get back to you as soon as possible!<br>Or, make a <b>small donation</b>, buy me a coffee and a better server! :)</p>
          </div>
        </div>
        <div class="row">
		  <div class="col-lg-4 mx-auto text-center">
            <i class="fa fa-cc-paypal fa-3x sr-contact"></i>
            <p>
              <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5JJ5PEDBW6T3J">Donate via PayPal</a>
            </p>
          </div>
          <div class="col-lg-4 mx-auto text-center">
            <i class="fa fa-envelope-o fa-3x sr-contact"></i>
            <p>
              <a href="mailto:<?=CONTACT_EMAIL?>"><?=CONTACT_EMAIL?></a>
            </p>
          </div>
		  <div class="col-lg-4 mx-auto text-center">
            <i class="fa fa-android fa-3x sr-contact"></i>
            <p>
              <a href="/files/">Download Mobile Application<br><small>Android / iOS / Windows / Windows Phone</small></a>
            </p>
          </div>
		  <div class="col-lg-4 mx-auto text-center">
			<i class="fa fa-file-code-o fa-3x sr-contact"></i>
            <p>
              <a href="mailto:p.ionut196@gmail.com">Get API access</a>
            </p>
		  </div>
		  <div class="col-lg-4 mx-auto text-center">
            <i class="fa fa-arrow-up fa-3x sr-contact"></i>
            <p>
              <a href="/"><?=APP_NAME?></a>
            </p>
          </div>
		  <div class="col-lg-4 mx-auto text-center">
			<i class="fa fa-github fa-3x sr-contact"></i>
            <p>
              <a href="https://github.com/pionut196/youtube-dl-full-php-gui-wrapper">Fork me on GitHub</a>
            </p>
		  </div>
        </div>
      </div>
    </section>
	
	<div class="bg-dark">
		<div class="container text-center">
			<div class="row">
				<div class="col-xs-12 col-md-12 mx-auto"><hr /></div>
				<div class="col-xs-12 col-md-12 mx-auto"><p>No rights reserved!</p></div>
				<div class="col-xs-12 col-md-12 mx-auto"><p>No content hosted on this server.</p></div>
				<div class="col-xs-12 col-md-12 mx-auto"><p>We do not take any responsibility and we are not liable for any damage caused through use of products or services through this website, be it indirect, special, incidental or consequential damages (including but not limited to damages for loss of business, loss of profits, interruption or the like).</p></div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-12 mx-auto"><hr /></div>
				<div class="col-xs-6 mx-auto text-left"><small><p>API Version <?=APP_VERSION?></small></p></div>
				<div class="col-xs-6 mx-auto text-right"><small><p><?=APP_NAME?> <?=date('Y')?></small></p></div>
			</div>
		</div>
	</div>
	</div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Plugin JavaScript -->
	<script async src="https://cdn.onesignal.com/sdks/OneSignalSDK.js"></script>
	
    <!-- Custom scripts for this template -->
    <script src="js/function.js"></script>
	<script>
		var OneSignal = window.OneSignal || [];
		OneSignal.push(["init", {
		  appId: "<?=ONESIGNAL_ID?>",
		  autoRegister: true, /* Set to true to automatically prompt visitors */
		  httpPermissionRequest: {
			enable: true
		  },
		  notifyButton: {
			  enable: true /* Set to false to hide */
		  }
		}]);
		var API_KEY = '<?=API_KEY?>';
	</script>

  </body>
</html>