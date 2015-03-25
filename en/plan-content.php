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
	<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	<?php
	include ("navbar.html");
	?>
	
    <div class="jumbotron">
	  <div class="container">
        <h1>Your new schedule is already on the way.</h1>
        <p>Last few clicks ahead of you. At first, please chose your type and field of study.</p>
      </div>
    </div>
	
	<div class="container">	
		<?php
		if ($google_auth == 0) {
		echo '<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p><strong>Important: </strong> You have just claimed that you want to use our schedule without Google account. 
		In such a case we will provide only links to online ICS calendars (iCalendar standard) along with guide how to add them to some of the online services (i.e. SGH Cloud, Outlook.com, WindowsPhone, Apple iCal). 
		</p>
		<p> We strongly encourage you use our schedule using Google account. If you have just created such account or recalled that you have one <a href="'.$authUrl.'" class="alert-link">log in using this account.</a>
		</p>
		</div>';
		
		} else {
		echo '<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p>
		Loging to your Google account has been successful. 
		Your schedule will be added <strong>automatically</strong> to your callendar available at <a href="http://calendar.google.com" class="alert-link">http://calendar.google.com</a>. 
		</p>
		</div>';
	
		}
		?>
		
		<table id="plan" class="table table-bordered">
			<tbody>
				<tr>
					<td></td>
					<th>Full-time studies</th>
					<th>Part-time studies</th>
				</tr>
			
				<tr>
					<th>Bachelor</th>
					<td>
						<!--<a href="select.php?area=slld" class="btn btn-default btn-lg btn-block">II, IV, VI semester - studies in Polish</a>-->

						<div class="btn-group btn-block">
						<button type="button" class="btn btn-default dropdown-toggle btn-lg btn-block" data-toggle="dropdown">
						II, IV, VI semester - studies in Polish <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
						<li><a href="select.php?area=slld">Lectures and exercises</a></li>
						<li><a href="select.php?area=cnjo2">Languages - II semester</a></li>
						<li><a href="select.php?area=cnjo4">Languages - IV semester</a></li>
						</ul>
						</div>
						<a href="select.php?area=slla" class="btn btn-default btn-lg btn-block">II, IV, VI semester - studies in English</a>			
						<a href="select.php?area=sllm" class="btn btn-default btn-lg btn-block">IV, VI semester - Management</a>
					</td>
					<td>
						<a href="select.php?area=nllp" class="btn btn-default btn-lg btn-block disabled">II, IV, VI semester - afternoon studies</a>
						<a href="select.php?area=nlls" class="btn btn-default btn-lg btn-block disabled">II, IV, VI semester - weekend studies</a>
					</td>
				</tr>
				<tr>
					<th>Masters</th>
					<td colspan="2">
						<a href="select.php?area=nllp" class="btn btn-default btn-lg btn-block disabled">Full-time and part-time afternoon studies</a>
						<a href="select.php?area=nlls" class="btn btn-default btn-lg btn-block disabled">Part-time weekend studies</a>
					</td>
			</tbody>
		</table>
	
	</div>

	
	<?php
	include ("script.html");
	?>
</body>
</html>


