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
<?php include ("navbar.html");?>
<div class="jumbotron">
  <div class="container">
	<h1>Najczęściej zadawane pytania.</h1>
	<p>Wszystko co potrzebujesz wiedzieć na temat planu zajęć i-sgh.pl.</p>

  
  </div>
</div>
<div class="container">
	<div class="panel-group" id="accordion">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a id="delete" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Jak usunąć przedmioty z mojego kalendarza?</a>
				</h4>
			</div>
			<div id="collapseFour" class="panel-collapse collapse out">
				<div class="panel-body">
					To proste. Wklej tutaj swój unikalny ID (to ten ciąg znaków zaznaczony literami X w adresie kalendarza: http://kalendarz.i-sgh.pl/XXXXXXXXXXXX.ics):<br>
					<form name="uid" onsubmit="return validateForm()" action="delete" method="post">
						<input type="text" name="uid" class="form-control" placeholder="Twój uid" required><br>
						<input type="submit" class="btn btn-primary btn-lg" value="Przejdź do usuwania przedmiotów!">
					</form>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a id="delete" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Jak dodać przedmioty do mojego kalendarza?</a>
				</h4>
			</div>
			<div id="collapseFive" class="panel-collapse collapse out">
				<div class="panel-body">
				To proste. Zarejestruj się tak samo jak za pierwszym razem pamiętając, żeby podać ten sam e-mail i login co ostatnio.<br>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a id="delete" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Nie mogę znaleźć mojego przedmiotu/grupy na liście. Co robić?</a>
				</h4>
			</div>
			<div id="collapseSix" class="panel-collapse collapse out">
				<div class="panel-body">
				Dane mamy z oficjalnego harmonogramu dostępnego na stronie SGH, dlatego najpierw pobierz excela z harmonogramem ze strony i spróbuj znaleźć tam swoją grupę. Być może zmienił się prowadzący albo grupa została usunięta? Jeśli przedmiot i grupa jest w excelu, a nie ma go w i-sgh.pl, czym prędzej napisz na <a href="mailto:support@i-sgh.pl">support@i-sgh.pl</a>.<br>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a id="delete" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">W moim planie zajęć jest błąd. Co robić?</a>
				</h4>
			</div>
			<div id="collapseSeven" class="panel-collapse collapse out">
				<div class="panel-body">
				Dane mamy z oficjalnego harmonogramu dostępnego na stronie SGH, dlatego najpierw pobierz aktualnego excela z harmonogramem ze strony i spróbuj znaleźć tam swoją grupę. Jeśli plan zajęć i-sgh.pl jest niezgodny z tym co jest w excelu czym prędzej napisz na <a href="mailto:support@i-sgh.pl">support@i-sgh.pl</a>.<br>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a id="delete" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">Co jeśli plan zajęć mnie oszuka? Czy odpowiadacie za dane zamieszczone w planie zajęć?</a>
				</h4>
			</div>
			<div id="collapseEight" class="panel-collapse collapse out">
				<div class="panel-body">
				Dokładamy wszelkich starań, żebyście zawsze trafili na zajęcia na czas i do odpowiedniej sali. Jednak nie możemy wziąć 100% odpowiedzialności za poprawność i aktualność Twojego planu zajęć. Dane, które pobieramy z oficjalnego harmonogramu SGH są przetwarzane automatycznie i mogą pojawić się błędy podczas przetwarzania. Może się też zdarzyć, że harmonogram zostanie zmieniony, a my nie zdążymy zaktualizować planu na czas. Dodatkowo w przypadku Google Calendar i wielu innych usług plan zajęć nie jest synchronizowany w czasie rzeczywistym z naszym serwerem, a jedynie kilka razy w ciągu doby. Jeśli znalazłeś błąd w swoim planie zajęć czym prędzej napisz na <a href="mailto:support@i-sgh.pl">support@i-sgh.pl</a>.<br>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a id="delete" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">Co jeśli plan zajęć zostanie zmieniony? Czy muszę od nowa tworzyć mój plan zajęć na i-sgh.pl?</a>
				</h4>
			</div>
			<div id="collapseNine" class="panel-collapse collapse out">
				<div class="panel-body">
				Nie. Plan zajęć i-sgh.pl tworzy się tylko raz na początku semestru. Aktualizujemy plan zajęć tak szybko jak to możliwe po pojawieniu się nowego harmonogramu na stronie SGH. Jeśli zrobiłeś/aś wszystko zgodnie z <a href="http://i-sgh.pl/instrukcja">instrukcją</a> to Twój plan zajęć zsynchronizuje się automatycznie z naszym serwerem. W przypadku Google Calendar i wielu innych usług może to zająć do 24 godzin. W razie wątpliwości pisz na <a href="mailto:support@i-sgh.pl">support@i-sgh.pl</a>.<br>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include ("script.html");?>
</body>
</html>