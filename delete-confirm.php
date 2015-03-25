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

			<h1>Zajęcia usunięte.</h1>
			<p>Potwierdzamy usunięcie następujących zajęć:</p>
		</div>
    </div>
	

	<?php
		
		//Connect to DB
		require_once 'db.php';
		
		//wczytaj wszystkie obszary dla tego uid
		$query_area='select distinct `area` from isgh_users_groups where user_id = (select id from isgh_users where uid = "'.$_POST['uid'].'")';
		if (!$mysqli->query($query_area)) {
			echo 'Wystąpił błąd. Powiadom nas o tym błędzie na adres <a href="mailto:support@i-sgh.pl">support@i-sgh.pl</a>. <br><br> Błąd:  (' . $mysqli->errno . ') ' . $mysqli->error;
		}
		$result_area = $mysqli->query($query_area);
		$result_area->data_seek(0);
		//pobierz dane przedmiotu dla każdego z obszarów
		while ($row_area = $result_area->fetch_assoc()) {
			$query_groups='
			select distinct c.user_id,c.area,p.subject_id,p.lecturer_id,p.group,p.subject,p.lecturer,p.type from (select * from isgh_users_groups where user_id = (select id from isgh_users 
			where uid = "'.$_POST['uid'].'") and area = "'.$row_area["area"].'") c 
			inner join (select distinct subject_id,lecturer_id,`group`,subject,lecturer,type 
			from isgh_plan_'.$row_area["area"].') p on p.lecturer_id=c.lecturer_id and p.subject_id = c.subject_id and p.group = c.group';
			if (!$mysqli->query($query_groups)) {
				echo 'Wystąpił błąd. Powiadom nas o tym błędzie na adres <a href="mailto:support@i-sgh.pl">support@i-sgh.pl</a>. <br><br> Błąd:  (' . $mysqli->errno . ') ' . $mysqli->error;
			}
			$result_groups = $mysqli->query($query_groups);
			$result_groups->data_seek(0);
				//wczytaj dane pojedynczego przedmiotu dla dla każdej z grup
				while ($row = $result_groups->fetch_assoc()) {		
										$ugroup=$row['subject_id'].$row['lecturer_id'].$row['group'];
										if(isset($_POST[$ugroup]) && 
											$_POST[$ugroup] == 'Yes') {
											
											//wiersz z danymi jednego kalendarza przedmiotowego
											$line_lista.='
											<tr>
												<td>'.$row['subject_id'].'-'.$row['lecturer_id'].'</td>
												<td>'.$row['subject'].'</td>
												<td>'.$row['lecturer'].'</td>
												<td>'.$row['type'].'</td>
												<td>'.$row['group'].'</td>
											</tr>';
											
											//dodaj info do bazy
											$query_stat = 'delete from isgh_users_groups 
											where 
												user_id = "'.$row['user_id'].'"
												and area = "'.$row['area'].'"
												and subject_id = "'.$row['subject_id'].'"
												and lecturer_id = "'.$row['lecturer_id'].'"
												and `group` = "'.$row['group'].'"';
											if (!$mysqli->query($query_stat)) {
												echo "delete failed - (" . $mysqli->errno . ") " . $mysqli->error;
											}
										} else {
										//do nothing
										}
				}
		}
	?>
	<div class="container">
            <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>Przedmioty znikną z twojego kalendarza w ciągu 24h.</p>
            </div>
		<table id="przedmioty_lista" class="table table-bordered table-hover">
			<tr>
				<th>Sygnatura</th>
				<th>Przedmiot</th>
				<th>Wykładowca</th>
				<th>Typ</th>
				<th>Grupa</th>
			</tr>
			<?php 
			echo $line_lista;
			?>
		</table>
	</div>
	<?php
	include ("script.html");
	?>
	
</body>
</html>


