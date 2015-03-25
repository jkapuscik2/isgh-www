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
        <h1>Your schedule no matter where you are.</h1>
        <p>Having Google calendar, you can use our schedule easily and pleasently via your mobile or tablet.</p>
      </div>
    </div>
	
	<div class="container">
		<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p>Guide shown below refers to schedule created using Google account.</p>
		</div>
		<p><img src="img/mobile.png" class="img-responsive" style="border: 1px solid #000; margin-left: auto; margin-right: auto"></p>
	<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a id="Android" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Android
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
		<ol>
			<li style="text-align: left;">Open <strong>accounts and synchronization</strong> in settings.</li>
			<li style="text-align: left;">Find your Google account on the list and make sure that the <strong>accounts and synchronization</strong> is turned on.</li>
			<li style="text-align: left;">Go to app Calendar, push the menu button <img alt="" src="http://www.credomobile.com/_img/support/transform/icon_menu.gif" width="16" height="10" /> and choose <strong>Calendars</strong></li>
			<li style="text-align: left;">Make sure your calendars are activated. If you can't see them, go to <strong>Calendars to synchronize</strong> and activate them there.</li>
		</ol>
		<p style="text-align: center;"><strong><a title="http://support.google.com/calendar/bin/topic.py?hl=pl&amp;topic=2586645&amp;parent=13950&amp;ctx=topic" href="http://support.google.com/calendar/bin/topic.py?hl=pl&amp;topic=2586645&amp;parent=13950&amp;ctx=topic" target="_blank">Doesn't work? Click here</a>
		</strong></p>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a id="iOS" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          iOS
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in">
      <div class="panel-body">
		<ol>
			<li style="text-align: left;">Visit website <a style="line-height: 1.714285714; font-size: inherit;" title="https://www.google.com/calendar/syncselect" href="https://www.google.com/calendar/syncselect" target="_blank">google.com/calendar/syncselect</a>, mark your calendars to synchronize and accept by clicking <strong style="line-height: 1.714285714; font-size: inherit;">Save</strong></li>
			<li style="text-align: left;">Open <strong>Mail, contacts...</strong></li> in settings.
			<li style="text-align: left;">Find your Google account on the list and check if the synchronization of the calendar is activated ( if you didn’t add your account earlier, you need to click <strong>Add account...</strong>, then <strong>Gmail</strong>)</li>
			<li style="text-align: left;">Go to app calendar and make sure, that all the calendars are in the <strong>Calendars</strong> manu and have been activated.</li>
		</ol>
		<p style="text-align: center;"><strong><a title="http://support.google.com/calendar/bin/answer.py?hl=pl&amp;answer=151674&amp;topic=13950&amp;ctx=topic" href="http://support.google.com/calendar/bin/answer.py?hl=pl&amp;answer=151674&amp;topic=13950&amp;ctx=topic" target="_blank">Doesn't work? Click here</a></strong></p>      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a id="WP" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Windows Phone
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse in">
		<div class="panel-body">
			<h4>Using Google account</h4>
			<p style="text-align: left;">
			Use <strong><a title="http://www.windowsphone.com/pl-pl/how-to/wp8/people/use-calendars" href="http://www.windowsphone.com/pl-pl/how-to/wp8/people/use-calendars" target="_blank">official guide</a></strong>
			</p>


			<h4>Outlook.com account</h4>
			<ol>
				<li style="text-align: left;">After you import calendars to your outlook account (it has to be your main/first account on your smartphone Windows Phone) make sure, that all the calendars have been marked as activated (upper right corner - screw, sliding list)</li>
				<li style="text-align: left;">Calendars should automatically synchronize with your Windows Phone device. It may take a while (from a few minutes up to few hours - don’t worry).</li>
				<li style="text-align: left;">In case your calendars were not added automatically, go to app “Calendar”, choose settings and check if your calendars are activated.</li>
			</ol>
		</div>
	</div>
  </div>
</div>
	
	</div>
	
	<?php
	include ("script.html");
	?>
</body>
</html>