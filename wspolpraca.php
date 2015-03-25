<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
<head>
    <?php
    include ("head.html")
    ?>
</head>
<body>
    <?php include_once("analyticstracking.php") ?>
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/pl_PL/all.js#xfbml=1&appId=457796744269359";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <?php
    include ("navbar.html");
    ?>
    <div class="jumbotron">
        <div class="container">
            <h1>Współpraca</h1>
            <p>Pozawalamy firmom i organizacjom studenckim dotrzeć do ponad 1000 studentów SGH</p>
        </div>
    </div>
    <div class="container">
        <h2>Chcesz wiedzieć więcej?</h2>
        <p>
            Jeśli jesteś przedstawicielem firmy lub organizacji studenckiej i chcesz poznać nasze możliwości, odezwij się na <a href="mailto:wspolpraca@i-sgh.pl">wspolpraca@i-sgh.pl</a>
        </p>
        
        <h2>Dotychczas zaufali nam:</h2>
        <div class="media">
            <a class="pull-left" href="http://ey.com" target="blank">
                <img class="media-object" src="img/ey.png" alt="EY">
            </a>
            <div class="media-body">
                <h4 class="media-heading">EY</h4>
                <p class="rola">Współpraca</p>
                <p>Współpraca przy organizacji rekrutacji na praktyki studenckie.</p>
                <p><div class="fb-like" data-href="https://facebook.com/EY.Kariera" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div></p>
            </div>
        </div>
        <div class="media">
            <a class="pull-left" href="http://esgieha.pl" target="blank">
                <img class="media-object" src="img/ss.jpg" alt="EY">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Samorząd studentów SGH</h4>
                <p class="rola">Współpraca</p>
                <p>Współpraca przy organizacji wydarzeń Samorządu Studentów SGH.</p>
                <p><div class="fb-like" data-href="https://facebook.com/EY.Kariera" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div></p>
            </div>
        </div>
        <div class="media">
            <a class="pull-left" href="http://bssg.pl" target="blank">
                <img class="media-object" src="img/bssg.jpg" alt="BSSG">
            </a>
            <div class="media-body">
                <h4 class="media-heading">BSSG</h4>
                <p class="rola">Wsparcie IT</p>
                <p>BSSG zapewnia hosting naszej strony WWW oraz wsparcie merytoryczne.</p>
                <p><div class="fb-like" data-href="https://facebook.com/bssgbi" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div></p>
            </div>
        </div>
        <div class="media">
            <a class="pull-left" href="http://podio.com" target="blank">
                <img class="media-object" src="img/podio.jpg" alt="Podio">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Podio</h4>
                <p class="rola">Wsparcie organizacji pracy zespołu projektowego</p>
                <p>Podio to platforma, która pomaga naszemu zespołowi sprawnie współpracować. Ty również możesz skorzystać z <a href="https://podio.com/webforms/149199/4201"> darmowej wersji Podio dla organizacji studenckich.</a></p>
                <div class="fb-like" data-href="https://facebook.com/teampodio" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
            </div>
        </div>

        <!--
        <div class="media">
            <a class="pull-left" href="http://google.com" target="blank">
                <img class="media-object" src="img/google.png" alt="Google">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Google</h4>
                <p class="rola">Platforma Google Calendar</p>
                <p>Plan zajęć opiera się na kalendarzu Google.</p>
                <p><div class="fb-like" data-href="https://facebook.com/Google" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div></p>
            </div>
        </div>-->
    </div>
    <?php
    include ("script.html");
    ?>
</body>
</html>