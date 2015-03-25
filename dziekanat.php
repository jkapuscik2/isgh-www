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
        <h1>Godziny otwarcia dziekanatów.</h1>
        <p>Im bardziej potrzebne tym trudniej dostępne.</p>
      </div>
    </div>
	
	<div class="container">
		<p>
		<iframe src="https://www.google.com/calendar/embed?title=Dziekanat%20Studium%20Licencjackiego&amp;showTabs=0&amp;mode=WEEK&amp;height=600&amp;wkst=2&amp;hl=pl&amp;bgcolor=%23FFFFFF&amp;src=i-sgh.pl_ctlraome4bd4m5rpjmpdfcjujg%40group.calendar.google.com&amp;color=%232F6309&amp;src=i-sgh.pl_bmhpml7fcea68r17cfitetvpe4%40group.calendar.google.com&amp;color=%231B887A&amp;src=i-sgh.pl_129gb7gh8f2stihu24007ks3hs%40group.calendar.google.com&amp;color=%23AB8B00&amp;src=i-sgh.pl_t2v4mnnul7llsur4nus1r4hq1o%40group.calendar.google.com&amp;color=%235F6B02&amp;src=i-sgh.pl_6o9c9ou3pi6ofilvnh2kdre92o%40group.calendar.google.com&amp;color=%23B1365F&amp;src=i-sgh.pl_e19r5650rk0mujovc4gs5hjpe4%40group.calendar.google.com&amp;color=%23182C57&amp;ctz=Europe%2FWarsaw" style=" border-width:0 " width="100%" height="600" frameborder="0" scrolling="no"></iframe>
		
		</p>
		<p>
		<iframe src="https://www.google.com/calendar/embed?title=Dziekanat%20Studium%20Magisterskiego&amp;showTabs=0&amp;showCalendars=0&amp;mode=WEEK&amp;height=600&amp;wkst=2&amp;hl=pl&amp;bgcolor=%23FFFFFF&amp;src=i-sgh.pl_8kupjaffa3qthpcknhbmuvs38k@group.calendar.google.com&amp;color=%23B1365F&amp;ctz=Europe%2FWarsaw" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
		</p>
	</div>
	
	<?php
	include ("script.html");
	?>
</body>
</html>