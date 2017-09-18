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
	<meta property="og:url" content="http://<?=APP_URL?><?=$_SERVER['REQUEST_URI']?>" />
	<meta property="og:image" content="http://<?=APP_URL?>/img/screen.jpg " />
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Plugin CSS -->
	<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async='async'></script>
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
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead">
	<section id="page-top">
      <div class="header-content">
        <div class="header-content-inner">
          <h1 id="homeHeading"><?=APP_NAME?></h1>
		  <small>API Version <?=APP_VERSION?></small>
          <hr>
		  
          <div class="container">
			<div class="row">
			<div class="col-lg-8 mx-auto text-center" id="loading" style="display:none">
				<div id="fountainG">
					<div id="fountainG_1" class="fountainG"></div>
					<div id="fountainG_2" class="fountainG"></div>
					<div id="fountainG_3" class="fountainG"></div>
					<div id="fountainG_4" class="fountainG"></div>
					<div id="fountainG_5" class="fountainG"></div>
					<div id="fountainG_6" class="fountainG"></div>
					<div id="fountainG_7" class="fountainG"></div>
					<div id="fountainG_8" class="fountainG"></div>
				</div><br/><br/>
			  </div>
			  <div class="col-lg-8 mx-auto text-left">
				<div class="form-group">
				  <label class="text-faded" for="usr" id="statuslabel">Just paste your song link here!</label>
				  <input type="text" autocomplete="off" required class="form-control" id="ylink">
				</div>
				<div class="form-group" id="dlpreg"><button class="btn btn-default btn-xl col-xs-12" id="dldsong">Download it</button></div>
				<div class="form-group" id="dlready"></div>
			  </div>
			</div>
		  </div>
		  
		  
        </div>
      </div>
	  </section>
    </header>

    

    <div class="call-to-action bg-dark">
      <div class="container text-left">
        <h2>Last 5 Downloaded files</h2>
		<?=latest_5()?>
		
		<div class="col-xs-12 col-md-12"></div>
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
			<div class="col-xs-12 col-md-12">No rights reserved!</div>
			<div class="col-xs-12 col-md-12">No content hosted on this server.</div>
			<div class="col-xs-12 col-md-12">We do not take any responsibility and we are not liable for any damage caused through use of products or services through this website, be it indirect, special, incidental or consequential damages (including but not limited to damages for loss of business, loss of profits, interruption or the like).</div>
		</div>
	</div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/function.js"></script>

  </body>
</html>