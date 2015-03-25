<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<?php
	include ("head.html")
	?>
	
	<script type="text/javascript" language="javascript" src="DataTables-1.9.4/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="DataTables-1.9.4/media/js/jquery.dataTables.js"></script>            
</head>
<body>

<?php include_once("analyticstracking.php") ?>
	<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	<?php
	include ("navbar.html");
	?>
	
    <div class="jumbotron">
	  <div class="container">
        <h1>Your courses.</h1>
        <p>Find and chose your groups and fill in the form.</p>
      </div>
    </div>
	
	<div class="container">
		<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p><strong>We're sorry!</strong> We haven't implemeted dynamic filtering of the tables yet. You have to use <em>CTRL+F</em>.</p>
		</div>
	
		<?php
		$table_fix = $_GET["area"];
		//connect to database
		$mysqli = new mysqli("localhost", "bssg13", "filip123", "bssg13");
		if ($mysqli->connect_errno) {
			echo 'Wystąpił błąd. Powiadom nas o tym błędzie na adres <a href="mailto:support@i-sgh.pl">support@i-sgh.pl</a>. <br><br> Błąd: Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
		}

		//set charset
		if (!$mysqli->set_charset("utf8")) {
			printf('Wystąpił błąd. Powiadom nas o tym błędzie na adres <a href="mailto:support@i-sgh.pl">support@i-sgh.pl</a>. <br><br> Błąd: Error loading character set utf8: %s\n', $mysqli->error);
			} else {
				//do nothing printf("Current character set: %s\n", $mysqli->character_set_name());
		}

		//warning języki
		if ($table_fix == "slld") {
		//do nothing
		} else if ($table_fix == "slla") {
		echo '<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p><strong>Warning!</strong> Language courses are missing here. This notification will disappear as soon as those courses are available. We are working hard to provide them as soon as possible.</p>
		</div>';
		} else {
		//do nothing
		}
		
		//pierwszy wiersz tabeli i początek formularza
		echo '
		<form name="select" onsubmit="return validateForm()" action="add.php" method="post">

		<table id="przedmioty_lista" class="table table-bordered table-hover">
		<tr>
		<td></td>
		<th>Signature</th>
		<th>Course</th>
		<th>Lecturer</th>
		<th>Type</th>
		<th>Group</th>
		</tr>';
		
		//zapytanie do bazy o tabelkę z kalendarzami przedmiotów
		$query="select * from isgh_".$table_fix."_calendars where google_calendar_id is not null";
		$result = $mysqli->query($query);
		$result->data_seek(0);
		while ($row = $result->fetch_assoc()) {
			
			//wyświetlenie jednego wiersza
			echo '<tr>
			<td><input type="checkbox" name="'.$row['calendar_id'].'" value="Yes" /></td>
			<td>'.$row['subject_id'].'-'.$row['lecturer_id'].'</td>
			<td>'.$row['subject'].'</td>
			<td>'.$row['lecturer'].'</td>
			<td>'.$row['type'].'</td>
			<td>'.$row['group'].'</td>
			</tr>	
			';

		}
		
		//zapytanie do bazy o tabelkę z kalendarzami języków
		$query_lang="select * from isgh_".$table_fix."_cnjo_calendars where google_calendar_id is not null";
		$result_lang = $mysqli->query($query_lang);
		$result_lang->data_seek(0);
		while ($row_lang = $result_lang->fetch_assoc()) {
			
			//wyświetlenie jednego wiersza
			echo '<tr>
			<td><input type="checkbox" name="lang_'.$row_lang['calendar_id'].'" value="Yes" /></td>
			<td>'.$row_lang['subject_id'].'-'.$row_lang['lecturer_id'].'</td>
			<td>'.$row_lang['subject'].'</td>
			<td>'.$row_lang['lecturer'].'</td>
			<td>'.$row_lang['type'].'</td>
			<td>'.$row_lang['group'].'</td>
			</tr>	
			';

		}
		
		
		//koniec tabeli i formularz
		echo '</table>
		
		<input type="hidden" name="table_fix" value="'.$table_fix.'">
		<input type="hidden" name="google_email" value="'.$google_email.'">
		<div class="well well-lg">


		<div class="input-group input-group-lg">
		<span class="input-group-addon">@</span>
		<input type="email" name="email" class="form-control" placeholder="'.$google_email.'" '.$email_state.'>
		</div>
		<br>
		
		<div class="input-group input-group-lg">
		<span class="input-group-addon">#</span>
		<input type="number" name="indeks" class="form-control" placeholder="Your student nummber" required>
		</div>
		<br>
		
		<div class="checkbox">
		<label>
		<input type="checkbox" name="data_accept" value="1" required>
		I hereby give consent for my personal data included in my offer to be processed for the informational purposes (in accordance with the Personal Data Protection Act dated 29.08.1997; Journal of Laws of the Republic of Poland 2002 No 101, item 926 with further amendments). For example, we would like to find out how many students use our schedule. We do not intend to sell your e-mail address.
		</label>
		</div>
		<div class="checkbox">
		<label>
		<input type="checkbox" name="email_accept" value="1">
		I want to receive e-mails from i-sgh.pl. This could be information about  maintance breaks in i-sgh.pl or actions organised by us. You can always opt out of receiving these messages.
		</label>
		</div>
		<br>
		
		<input type="submit" class="btn btn-primary btn-lg" value="Continue!">
		

		</div>
		</form>
		';
		?>
		
<!--		<label for="indeks">Your student number: </label><input type="number" name="indeks" min="0" max="100000" required><br>
		<label for="imie">Your name and surname: </label><input type="text" name="imie"><br>

		By clicking <strong>Continue</strong> you agree to the processing of your data by i-sgh.pl<br>
		<input type="submit" name="formSubmit" value="Continue" /><br>
		-->
	
	</div>

	
	<?php
	include ("script.html");
	?>
	
</body>
</html>


