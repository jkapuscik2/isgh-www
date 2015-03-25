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
        <h1>Dodaj plan zajęć do swojego kalendarza.</h1>
        <p>Poniżej znajdziesz instrukcję dodawania planu zajęć i-sgh.pl do niektórych usług kalendarzy online.</p>
      </div>
    </div>
	
	<div class="container">
		<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p>Jeśli brakuje tu jakiejś usługi, daj nam znać na <a href="mailto:info@i-sgh.pl" class="alert-link">info@i-sgh.pl</a>.</p>
		</div>
		<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a id="ChmuraSGH" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Chmura SGH / Office 365
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
<ol>
<li><a href="https://adfsproxy1.sgh.waw.pl/adfs/ls/?wa=wsignin1.0&wtrealm=urn:federation:MicrosoftOnline&wctx=wa%3Dwsignin1.0%26rpsnv%3D3%26ct%3D1393170734%26rver%3D6.1.6206.0%26wp%3DMBI_KEY%26wreply%3Dhttps:%252F%252Fwww.outlook.com%252Fowa%252F%26id%3D260563%26whr%3Dsgh.waw.pl%26CBCXT%3Dout" target="blank">
Zaloguj się</a> na swoje konto Office 365</li>
<li>W górnym menu górnym przejdź do zakładki <strong>kalendarz</strong></li>
<li>W lewym dolnym roku kliknij prawym przyciskiem myszy na "Moje kalendarze" i z menu kontekstowego wybierz pozycję "Otwórz kalendarz"</li>
<li>W polu "Kalendarz internetowy" wklej Link ICS i kliknij "Otwórz"</li>
<li>Powtórz dla kolejnych wybranych przez Ciebie przedmiotów</li>
</ol>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a id="Outlook" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Outlook.com
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in">
      <div class="panel-body">
	  <ol>
<li>Zaloguj się na swoje konto outlook.com</li>
<li>Przejdź do sekcji: kalendarz</li>
<li>Kliknij: importuj</li>
<li>Przejdź do rubryki: subskrybuj</li>
<li>W pole „adres URL kalendarza” wklej link ze strony i-sgh.pl(podany w rubryce „Link ICS”)</li>
<li>Skopiuj nazwę przedmiotu z tabelki do „nazwa kalendarza”</li>
<li>Dodatki: wybierz kolor i ikonkę</li>
		</ol>
		</div>
  </div>
  </div>
  
    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a id="iCal" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Apple iCal
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse in">
		<div class="panel-body">
Wkrótce
		</div>
	</div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a id="wppl" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          WP.PL
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse in">
		<div class="panel-body">
			<ol>
				<li>Zaloguj się na swoje konto poczta.wp.pl</li>
				<li>Przejdź do sekcji: kalendarz</li>
				<li>Kliknij: „więcej” a następnie „importuj”</li>
				<li>Wklej plik w formacie .ics, który ściągasz poprzez skopiowanie linka z rubryki: „link ICS” i wklejenie go do nowej karty w przeglądarce (zazwyczaj ściąga się plik, który nazywa się basic.ics, zalecamy zmienić jego nazwę na nazwę przedmiotu aby uniknąć problemów z rozpoznaniem plików</li>
				<li>Kliknij: „importuj”</li>
				<li>Powtórz czynność dla każdego kalendarza(przedmiotu)</li>
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