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
  js.src = "//connect.facebook.net/pl_PL/all.js#xfbml=1&appId=457796744269359";
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
        <h1>Contact us.</h1>
        <p>We are looking forward to hearing from you.</p>
      </div>
    </div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
			<h2>General issues</h2>
			<p>If you have any questions please write an e-mail on <a href="mailto:info@i-sgh.pl">info@i-sgh.pl</a></p>
			</div>
			<div class="col-md-6">
			<h2>Reporting bugs.</h2>
			<p>If there is a bug in your schedule, inform us immediately at <a href="mailto:support@i-sgh.pl">support@i-sgh.pl</a></p>
			</div>
		</div>
	</div>
	
	<?php
	include ("script.html");
	?>
</body>
</html>