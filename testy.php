
<?php
//Connect to DB
require_once 'db.php';

//Rozpocznij kalendarz ics
$ical = "BEGIN:VCALENDAR
VERSION:2.0
PRODID:i-sgh.pl
X-WR-CALNAME: Plan zajęć i-sgh.pl
X-WR-CALDESC: Siemano";

//wczytaj wszystkie obszary dla tego uid
$query_area='select distinct `area` from isgh_users_groups where user_id = (select id from isgh_users where uid = "'.$_GET["uid"].'")';
if (!$mysqli->query($query_area)) {
	echo 'Wystąpił błąd. Powiadom nas o tym błędzie na adres <a href="mailto:support@i-sgh.pl">support@i-sgh.pl</a>. <br><br> Błąd:  (' . $mysqli->errno . ') ' . $mysqli->error;
}
$result_area = $mysqli->query($query_area);
$result_area->data_seek(0);

//wczytaj id przedmiotów dla każdego z obszarów
while ($row_area = $result_area->fetch_assoc()) {
	$query_groups='select * from isgh_users_groups where user_id = (select id from isgh_users where uid = "'.$_GET["uid"].'") and area = "'.$row_area["area"].'"';
	if (!$mysqli->query($query_groups)) {
		echo 'Wystąpił błąd. Powiadom nas o tym błędzie na adres <a href="mailto:support@i-sgh.pl">support@i-sgh.pl</a>. <br><br> Błąd:  (' . $mysqli->errno . ') ' . $mysqli->error;
	}
	$result_groups = $mysqli->query($query_groups);
	$result_groups->data_seek(0);
		
		//wczytaj eventy dla każdej z grup
		while ($row_groups = $result_groups->fetch_assoc()) {
			$query_event='select * from isgh_plan_'.$row_area["area"].' where subject_id='.$row_groups["subject_id"].' and lecturer_id='.$row_groups["lecturer_id"].' and `group`='.$row_groups["group"];
			if (!$mysqli->query($query_event)) {
				echo 'Wystąpił błąd. Powiadom nas o tym błędzie na adres <a href="mailto:support@i-sgh.pl">support@i-sgh.pl</a>. <br><br> Błąd:  (' . $mysqli->errno . ') ' . $mysqli->error;
			}
			$result_event = $mysqli->query($query_event);
			$result_event->data_seek(0);
			while ($row_event = $result_event->fetch_assoc()) {
				
				//drukuj vevent
				$ical.="BEGIN:VEVENT
						DTSTART:".str_replace('-','',$row_event['date'])."T".str_replace(':','',$row_event['start_time'])."Z
						DTEND:".str_replace('-','',$row_event['date'])."T".str_replace(':','',$row_event['end_time'])."Z
						SUMMARY:".$row_event["subject"]." (".$row_event["type"].")
						END:VEVENT";
			}
		}
	
}

//zakończ kalendarz ics
$ical.="END:VCALENDAR";
echo $ical;
?>