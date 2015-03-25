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
<body class="glowna">
<?php include_once("analyticstracking.php") ?>

	<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	<div id="wrap">	

		<?php
		include ("navbar.html");
		?>
		<div class="jumbotron-front">
		<div class="container">
			<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p><strong>Stay tuned! </strong>We're working on the schedule for academic year 2014/15. Like us on facebook to stay up to date.</p>
			</div>
			<img src="img/logo-www-przezr.png" id="logo" class="img-responsive">
			<h1>Information at SGH has just become <strong>available.</strong></h1>
			<p style="text-align:center"> We've created gorgeous schedule which is going to change your life entirely.</p>
			<?php
			echo '<p style="text-align:center"><a style="font-size:22px" class="btn btn-danger btn-lg" href="'.$authUrl.'" disabled="disabled">Start using Google account &raquo;</a>';?>  

			<a style="font-size:22px" class="btn btn-default btn-lg" href="plan.php" disabled="disabled">I don't have Google account &raquo;</a></p>
		</div>
		</div>

	</div>

	<?php
	include ("script.html");
	?>
	
</body>
</html>