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
        <h1>Wydarzenia na uczelni i najważniejsze terminy.</h1>
        <p>Poza planem zajęć zapewniamy ci informacje o wydarzeniach społeczności SGH oraz m. in. terminach deklaracji.</p>
      </div>
    </div>
	
	<div class="container">
		<?php
		//connect to database
		$mysqli = new mysqli("localhost", "bssg13", "filip123", "bssg13");
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}

		//set charset
		if (!$mysqli->set_charset("utf8")) {
			printf("Error loading character set utf8: %s\n", $mysqli->error);
			} else {
				// do nothing printf("Current character set: %s\n", $mysqli->character_set_name());
		}
		//wyświetlenie kalendarzy ogólnych
			$query_general="select * from isgh_general";
			$result_general = $mysqli->query($query_general);
			$result_general->data_seek(0);
			while ($row_general = $result_general->fetch_assoc()) {	
				$line_lista.='
				<tr>
					<td>'.$row_general['nazwa'].'</td>
					<td><input type="text" onClick="this.select();" class="form-control" value="http://www.google.com/calendar/ical/'.$row_general['google_calendar_id_lic'].'/public/basic.ics"></td>
					<td><input type="text" onClick="this.select();" class="form-control" value="http://www.google.com/calendar/ical/'.$row_general['google_calendar_id_mag'].'/public/basic.ics"></td>
				</tr>';
			}
		?>
		<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p>Jeśli utworzyłeś swój plan zajęć logując się do konta Google, kalendarze o których tu mowa zostały automatycznie dodane do Twojego konta i możesz je wyświetlić na <a href="http://calendar.google.com" class="alert-link">calendar.google.com.</a>
		</p>
		</div>
		
		<table id="przedmioty_lista" class="table table-bordered table-hover">
			<tr>
				<th>Nazwa</th>
				<th>Link ICS (licencjackie)</th>
				<th>Link ICS (magisterskie)</th>
			</tr>
			<?php echo $line_lista;?>
		</table>
	
	</div>
	
	<?php
	include ("script.html");
	?>
</body>
</html>