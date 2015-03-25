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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=457796744269359";
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
			<?php 
			if ($google_auth == 0) {
			echo '
			<h1>Już prawie koniec!</h1>
			<p>Poniżej znajduje się lista przedmiotów, które wybrałeś w poprzednim kroku.</p>';
			} else {
			echo '<h1>Mission accomplished.</h1>
			<p>Poniżej znajduje się lista przedmiotów, które zostały dodane do <a href="http://calendar.google.com">Twojego kalendarza Google</a>.</p>';
			}
			?>
		</div>
    </div>
	
	<div class="container">

		<?php
		$table_fix = $_POST['table_fix'];

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
		
		//insert data about new user
		if ($google_auth == 0) {
		
			// insert new user data into isgh_users table
			$new_user_query = "insert into `isgh_users` (`indeks`,`email`,`data_accept`,`email_accept`) values ('".$_POST['indeks']."','".$_POST['email']."','".$_POST['data_accept']."','".$_POST['email_accept']."')";
			$mysqli->query($new_user_query);
			$new_user_id = $mysqli->insert_id;
		
		} else {
			
			// insert new user data into isgh_users table
			$new_user_query = "insert into `isgh_users` (`indeks`,`email`,`data_accept`,`email_accept`,`google_auth`) values ('".$_POST['indeks']."','".$_POST['google_email']."','".$_POST['data_accept']."','".$_POST['email_accept']."','".$google_auth."')";
			$mysqli->query($new_user_query);
			$new_user_id = $mysqli->insert_id;
			}
		
		//dodanie kalendarzy ogólnych tylko, gdy user jest zalogowany
		if ($google_auth == 1) {
		
			$query_general="select * from isgh_general";
			$result_general = $mysqli->query($query_general);
			$result_general->data_seek(0);
			while ($row_general = $result_general->fetch_assoc()) {	
				
				//dodaj kalendarz do konta Google
				if ($table_fix == "mg_sdi_pop") {
					$general_area = "mag";
				} elseif ($table_fix == "mg_ns") {
					$general_area = "mag";
				} else {
					$general_area = "lic";
				}
				
				$calendarListEntry = new Google_CalendarListEntry();
				$calendarListEntry->setId($row_general['google_calendar_id_'.$general_area]);
				$createdCalendarListEntry = $cal->calendarList->insert($calendarListEntry);
				
			}
		} else {
		//do nothing
		}
		
		//zapytanie do bazy o tabelkę z kalendarzami przedmiotów
		$query="select * from isgh_".$table_fix."_calendars";
		$result = $mysqli->query($query);
		$result->data_seek(0);
		while ($row = $result->fetch_assoc()) {
			
			//warunek - zaznaczony checkbox
			if(isset($_POST[''.$row['calendar_id'].'']) && 
				$_POST[''.$row['calendar_id'].''] == 'Yes') {
				$line.='&cid='.$row['google_calendar_id'];
				
				if ($google_auth == 0) {
					
					//wiersz z danymi jednego kalendarza przedmiotowego i linkiem do niego
					$line_lista.='
					<tr>
						<td>'.$row['subject_id'].'-'.$row['lecturer_id'].'</td>
						<td>'.$row['subject'].'</td>
						<td>'.$row['lecturer'].'</td>
						<td>'.$row['type'].'</td>
						<td>'.$row['group'].'</td>
						<td><input type="text" onClick="this.select();" class="form-control" value="http://www.google.com/calendar/ical/'.$row['google_calendar_id'].'/public/basic.ics"></td>
					</tr>';	
				} else {
					
					//wiersz z danymi jednego kalendarza przedmiotowego
					$line_lista.='
					<tr>
						<td>'.$row['subject_id'].'-'.$row['lecturer_id'].'</td>
						<td>'.$row['subject'].'</td>
						<td>'.$row['lecturer'].'</td>
						<td>'.$row['type'].'</td>
						<td>'.$row['group'].'</td>
					</tr>';
					
					//dodaj kalendarz do konta Google
					$calendarListEntry = new Google_CalendarListEntry();
					$calendarListEntry->setId($row['google_calendar_id']);
					$createdCalendarListEntry = $cal->calendarList->insert($calendarListEntry);
				}
				
				//dodaj info do bazy
				$query_stat = "insert into isgh_users_calendars values ('".$new_user_id."','".$table_fix."','".$row['calendar_id']."')";
				if (!$mysqli->query($query_stat)) {
					echo "insert failed - (" . $mysqli->errno . ") " . $mysqli->error;
				}
			} else {
			//do nothing
			}    

		}

		
		//zapytanie do bazy o tabelkę z kalendarzami języków
		$query_lang="select * from isgh_".$table_fix."_cnjo_calendars";
		$result_lang = $mysqli->query($query_lang);
		$result_lang->data_seek(0);
		while ($row_lang = $result_lang->fetch_assoc()) {
			
			//warunek - zaznaczony checkbox
			if(isset($_POST['lang_'.$row_lang['calendar_id'].'']) && 
				$_POST['lang_'.$row_lang['calendar_id'].''] == 'Yes') {
		
				$line_lang.='&cid='.$row_lang['google_calendar_id'];
				
				if ($google_auth == 0) {
					
					//wiersz z danymi jednego kalendarza językowego i linkiem do niego
					$line_lista_lang.='
					<tr>
						<td>'.$row_lang['subject_id'].'-'.$row_lang['lecturer_id'].'</td>
						<td>'.$row_lang['subject'].'</td>
						<td>'.$row_lang['lecturer'].'</td>
						<td>'.$row_lang['type'].'</td>
						<td>'.$row_lang['group'].'</td>
						<td><input type="text" onClick="this.select();" class="form-control" value="http://www.google.com/calendar/ical/'.$row_lang['google_calendar_id'].'/public/basic.ics"></td>
					</tr>';	
				} else {
					
					//wiersz z danymi jednego kalendarza językowego
					$line_lista_lang.='
					<tr>
						<td>'.$row_lang['subject_id'].'-'.$row_lang['lecturer_id'].'</td>
						<td>'.$row_lang['subject'].'</td>
						<td>'.$row_lang['lecturer'].'</td>
						<td>'.$row_lang['type'].'</td>
						<td>'.$row_lang['group'].'</td>
					</tr>';
					
					//dodaj kalendarz do konta Google
					$calendarListEntry = new Google_CalendarListEntry();
					$calendarListEntry->setId($row_lang['google_calendar_id']);
					$createdCalendarListEntry = $cal->calendarList->insert($calendarListEntry);
				}
				
				//dodaj info do bazy
				$query_stat = "insert into isgh_users_calendars values ('".$new_user_id."','".$table_fix."_cnjo','".$row_lang['calendar_id']."')";
				if (!$mysqli->query($query_stat)) {
					echo "insert failed - (" . $mysqli->errno . ") " . $mysqli->error;
				}
				
			} else {
			//do nothing
			}    

		}

	?>

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<table id="przedmioty_lista" class="table table-bordered table-hover">
					<tr>

						<?php 
							if ($google_auth == 0) {
								echo '
								<th>Sygnatura</th>
								<th>Przedmiot</th>
								<th>Wykładowca</th>
								<th>Typ</th>
								<th>Grupa</th>
								<th>Link ICS</th>';
							} else {
								echo '
								<th>Sygnatura</th>
								<th>Przedmiot</th>
								<th>Wykładowca</th>
								<th>Typ</th>
								<th>Grupa</th>
								';				
							}
						?>
					</tr>
				<?php 
					echo $line_lista;
					echo $line_lista_lang;
				?>
				
					</table>
			</div>
			<div class="col-md-4">
				
				<?php 
				if ($google_auth == 0) {
					echo '
					<h3>
						Teraz wszystko zależy od Ciebie!
					</h3>
					<p>Poradź sobie sam lub skorzystaj z przygotowanej przez nas instrukcji tworzenia naszego planu zajęć z wykorzystaniem linków ICS w najpopularniejszych usługach kalendarzy online. Instrukcje otworzą się w nowym oknie, więc nie stracisz listy swoich przedmiotów</p>
					<p>
						<div class="btn-group">
							<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
							<span class="glyphicon glyphicon-calendar"></span> Skorzystaj z instrukcji <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
							<li><a href="instrukcja.php#ChmuraSGH" target="blank">Chmura SGH / Office365</a></li>
							<li><a href="instrukcja.php#Outlook" target="blank">Outlook.com</a></li>
							<li><a href="instrukcja.php#iCal" target="blank">Apple iCal</a></li>	
							<li><a href="instrukcja.php#wppl" target="blank">wp.pl</a></li>
							<!--<li class="divider"></li>
							<li><a href="#">Separated link</a></li> -->
							</ul>
						</div>
					</p>
					<h3>Podziel się!</h3>
					<p>Plan i-sgh.pl tworzyliśmy z myślą o ułatwieniu życia wszystkim studentom SGH. Pomóż nam i podziel się dobrą nowiną ze swoimi znajomymi. <div class="fb-share-button" data-href="http://i-sgh.pl" data-type="button_count"></div>
					<h3>
						Nasz plan jest zawsze aktualny.
					</h3>
					<p>
						Jeśli utworzyłeś swój plan poprawnie będzie on automatycznie aktualizowany do najnowszej wersji harmonogramu dostępnego na stronie SGH. Częstotliwość aktualizacji kalendarzy zależy od Twojej usługi.
					</p>

					';
				
				} else {
					echo '
					<h3>Plan w telefonie</h3>
					<p>Nasze instrukcje krok po kroku pokażą ci jak korzystać z Twojego nowego planu zajęć w telefonie lub tablecie</p>
					<p>
						<div class="btn-group">
						<a href="telefon.php" class="btn btn-info"><span class="glyphicon glyphicon-phone"></span> Plan w telefonie/tablecie</a>
						<!--<button type="button" class="btn btn-info">Plan w telefonie/tablecie</button>-->
						<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
						</button>
						<ul class="dropdown-menu" role="menu">
						<li><a href="telefon.php#Android">Android</a></li>
						<li><a href="telefon.php#iOS">iOS</a></li>
						<li><a href="telefon.php#WP">Windows Phone</a></li>
						<!--<li class="divider"></li>
						<li><a href="#">Separated link</a></li>-->
						</ul>
						</div>
					</p>
					<h3>Podziel się!</h3>
					<p>Plan i-sgh.pl tworzyliśmy z myślą o ułatwieniu życia wszystkim studentom SGH. Pomóż nam i podziel się dobrą nowiną ze swoimi znajomymi. <div class="fb-share-button" data-href="http://i-sgh.pl" data-type="button_count"></div>
					<h3>Nasz plan jest zawsze aktualny</h3>
					<p>Staramy się możliwie szybko aktualizować plan i-sgh.pl do najnowszej dostępnej wersji harmonogramu na stronie SGH. Ewentualne zmiany pojawią się w Twoim planie natychmiastowo.</p>
					';
				}
				?>
				
				
			</div>
	
		</div>
	</div>
	
	<?php
	include ("script.html");
	?>
	
</body>
</html>


