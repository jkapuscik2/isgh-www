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
  js.src = "//connect.facebook.net/en_EN/all.js#xfbml=1&appId=457796744269359";
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
        <h1>This is us.</h1>
        <p>We would like to introduce team that made this wonderful project possible.</p>
      </div>
    </div>
	
	<div class="container">
		<div class="media">
			<a class="pull-left" href="http://www.facebook.com/finfando" target="blank">
			<img class="media-object img-circle" src="img/filip.jpg" alt="Filip Finfando">
			</a>
			<div class="media-body">
				<h4 class="media-heading">Filip Finfando</h4>
				<p class="rola">Project Director (CEO), IT Specialist</p>
				<p>Founder of the i-sgh, dreamer, visionary, perfectionist, gentleman. Avid skier and marathoner. Shows extraordinary analytical skills - invaluable both in private and professional life. Commonly known as the (CEO) because of his winner-like presence and extremely professional approach to work.</p>
				<p><div class="fb-follow" data-href="http://www.facebook.com/finfando" data-colorscheme="light" data-layout="button_count" data-show-faces="true"></div></p>
			</div>
		</div>
		
		<div class="media">
			<a class="pull-left" href="http://www.facebook.com/profile.php?id=1722734265" target="blank">
			<img class="media-object img-circle" src="img/kacper.jpg" alt="Kacper Kłos">
			</a>
			<div class="media-body">
			<h4 class="media-heading">Kacper Klos</h4>
			<p class="rola">Foreign Affairs Specialist (COO)</p>
			<p>Until recently tennis was his only love. Now he has to find time both for tennis courts and i-sgh project. Huge fan of Roger Federer, unfulfilled pianist and gourmet of French cusine. Talks rather not much, but when he does - he is shockingly brilliant and charming - that i why he is the one who represents the entire project on the world stage - the genius of i-sgh can not be unsaid after all.
</p>
			</div>
		</div>
		
		<div class="media">
			<a class="pull-left" href="http://www.facebook.com/michal.mroczkowski" target="blank">
			<img class="media-object img-circle" src="img/michal.jpg" alt="Michał Mroczkowski">
			</a>
			<div class="media-body">
			<h4 class="media-heading">Michał Mroczkowski</h4>
			<p class="rola">Internal Affairs Specialist</p>
			<p>Well known for his exceptional intellect and insanely ironic sense of humor. An expert in every issue from the broader term: LIFE - that is why he is a perfect personality to recruit new members and keep a tight rein on current team. Loves fitness, body-building and dietetics - this three factors convinced us to keep him inside the organization. He coordinates work of the team at i-sgh and is a right-hand man of the President(CEO).</p>
			</div>
		</div>
		
		<div class="media">
			<a class="pull-left" href="http://www.facebook.com/kajtek.wyrzykowski" target="blank">
			<img class="media-object img-circle" src="img/kajetan.jpg" alt="Kajetan Wyrzykowski">
			</a>
			<div class="media-body">
			<h4 class="media-heading">Kajetan Wyrzykowski</h4>
			<p class="rola">Marketing Specialist (CMO)</p>
			<p>Fan of film and theater. Connoisseur of widely understood art - big fan of the great artist Eldo. Dancer - discovered many young talents in this particular field. Unparalleled in terms of English proficiency - always happy to provide few hints. A specialist in modern marketing techniques that are used in the i-sgh promotion. His task is to make all visions of the President easily available to every student.
</p>
			</div>
		</div>
		
		<div class="media">
			<a class="pull-left" href="http://www.facebook.com/soawesomecow" target="blank">
			<img class="media-object img-circle" src="img/karolina.jpg" alt="Karolina Magiera">
			</a>
			<div class="media-body">
			<h4 class="media-heading">Karolina Magiera</h4>
			<p class="rola">Sales Specialist (CSO)</p>
			<p>In private life - a perfect housewife and a cook. The i-sgh.pl board meetings have been filled not only with her cuteness and sagacity, but also her hand-made cakes and other favorite delicacies of the i-sgh.pl CEO. She can freely compete with Jagna MarczuÅ‚ajtis in snowboarding skills. She is also a great seller â€“ making an Eskimo buy a fridge would not be a challenge. Definitely the missing “woman factor” in the board. Her responsibilities in i-sgh are sale and promotion of the product.
			</p>
			</div>
		</div>
		
		<div class="media">
			<a class="pull-left" href="dolacz.php">
			<img class="media-object img-circle" src="img/dolacz.jpg" alt="Dołącz">
			</a>
			<div class="media-body">
			<h4 class="media-heading">You</h4>
			<p class="rola">Your contribution into i-sgh</p>
			<p>If you like our project and you want to develop it with us, fill <a href="dolacz.php">this application</a>.</p>
			</div>
	
	
	</div>
	
	<?php
	include ("script.html");
	?>
</body>
</html>