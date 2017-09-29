<?php
require __DIR__ . '/config.php';
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
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Plugin CSS -->
	
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', '<?=ANALYTICS_ID?>', 'auto');
	  ga('send', 'pageview');

	</script>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><?=APP_NAME?></a>
        <a class="navbar-item" href="/"><?=APP_VERSION?></a>
        
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
					<div class="form-group has-feedback">
						<label id="statuslabel" class="control-label">Just paste your song link here!</label>
						<div class="input-group">
							<span class="input-group-addon"> <i class="fa fa-youtube"></i></span>
							<input type="text" class="form-control" id="ylink" placeholder="Example: https://www.youtube.com/watch?v=Vb5pn9Z3t30" />
							<button class="form-control bossbutton input-group-addon-right" id="bossbutton">Convert</button>
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

	<div class="call-to-action bg-dark">
		<div class="container text-left">
			<h3>Last 5 Downloaded files</h3>
			<?=latest_5()?>
		</div>
	
	<div class="container text-left">
		<hr>
			<h3>About Music Server</h3>
			<p>Convert video from YouTube into Hight Quality MP3 ( 256kbps )</p>
			<p>When you choose our YouTube to mp3 converter you get a service that is fully compatible with all modern browsers.Download YouTube videos free of charge, legally and safely!Download from YouTube in MP3 ! Free and fast with direct link!</p>
			<ul>
				<li>1MB/s Download speed limit</li>
				<li>No time limit - Convert a video even if is 3 hours longer</li>
				<li>Direct Link & No ads</li>
				<li>Hight Quality ( 256kb/s ) MP3</li>
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
		  <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-cc-paypal fa-3x sr-contact"></i>
            <p>
              <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5JJ5PEDBW6T3J">Donate via PayPal</a>
            </p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x sr-contact"></i>
            <p>
              <a href="mailto:<?=CONTACT_EMAIL?>"><?=CONTACT_EMAIL?></a>
            </p>
          </div>
		  <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-android fa-3x sr-contact"></i>
            <p>
              <a href="/apk/">Download Mobile Application<br><small>Android / iOS / Windows / Windows Phone</small></a>
            </p>
          </div>
		  <div class="col-lg-4 mr-auto text-center"></div>
		  <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-arrow-up fa-3x sr-contact"></i>
            <p>
              <a href="/">YT-Downloader</a>
            </p>
          </div>
		  <div class="col-lg-4 mr-auto text-center">
			<i class="fa fa-github fa-3x sr-contact"></i>
            <p>
              <a href="https://github.com/pionut196/youtube-dl-full-php-gui-wrapper">Fork me on GitHub</a>
            </p>
		  </div>
        </div>
      </div>
    </section>
	
	<div class="call-to-action bg-dark">
		<div class="container text-center">
		  <div class="row">
			<div class="col-xs-12 col-md-12">No rights reserved!</div>
			<div class="col-xs-12 col-md-12">No content hosted on this server.</div>
			<div class="col-xs-12 col-md-12">We do not take any responsibility and we are not liable for any damage caused through use of products or services through this website, be it indirect, special, incidental or consequential damages (including but not limited to damages for loss of business, loss of profits, interruption or the like).</div>
			<hr>
			<div class="col-xs-12 col-md-12 text-left">
				<div class="col-xs-12 col-md-6 col-lg-6"><small>API Version <?=APP_VERSION?></small></div>
				<div class="col-xs-12 col-md-6 col-lg-6"><small>Popescu Ionut <?=date('Y')?></small></div>
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
	</script>

  </body>
</html>