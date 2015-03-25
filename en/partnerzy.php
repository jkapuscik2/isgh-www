<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<?php
	include ("head.html")
	?>
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_EN/all.js#xfbml=1&appId=457796744269359";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	<?php
	include ("navbar.html");
	?>
	
    <div class="jumbotron">
	  <div class="container">
        <h1>Our partners.</h1>
        <p>Thank you for your contribution to the project.</p>
      </div>
    </div>
	
	<div class="container">

		<div class="media">
			<a class="pull-left" href="http://bssg.pl" target="blank">
			<img class="media-object" src="img/bssg.jpg" alt="Filip Finfando">
			</a>
			<div class="media-body">
				<h4 class="media-heading">BSSG</h4>
				<p class="rola">IT support</p>
				<p>BSSG is responsible for hosting our website and IT know-how.</p>
				<p><div class="fb-like" data-href="https://facebook.com/bssgbi" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div></p>
			</div>
		</div>
		
		<div class="media">
			<a class="pull-left" href="http://podio.com" target="blank">
			<img class="media-object" src="img/podio.jpg" alt="Podio">
			</a>
			<div class="media-body">
				<h4 class="media-heading">Podio</h4>
				<p class="rola">Wsparcie organizacji pracy zespołu projektowego</p>
				<p>Podio is a tool which helps us cooperate efficiently. Your student organization can apply for Podio sponsorship at <a href="https://podio.com/webforms/149199/4201"> this site.</a></p>
				<div class="fb-like" data-href="https://facebook.com/teampodio" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
			</div>
		</div>
		
		<!--<div class="media">
			<a class="pull-left" href="http://google.com" target="blank">
			<img class="media-object" src="img/google.png" alt="Google">
			</a>
			<div class="media-body">
				<h4 class="media-heading">Google</h4>
				<p class="rola">Platforma Google Calendar</p>
				<p>Plan zajęć opiera się na kalendarzu Google.</p>
				<p><div class="fb-like" data-href="https://facebook.com/Google" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div></p>
			</div>
		</div>-->

	
	</div>
	
	<?php
	include ("script.html");
	?>
</body>
</html>