<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <?php include 'head.html';?>
</head>
<body>
    <?php include_once 'analyticstracking.php';?>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <?php include 'navbar.html';?>	
    <div class="jumbotron">
        <div class="container">
            <h1>Twój nowy plan zajęć jest już w drodze.</h1>
            <p>Przed tobą jeszcze kilka kliknięć. Najpierw wybierz odpowiedni rodzaj i kierunek studiów.</p>
        </div>
    </div>
    <div class="container">	
        <div>
            <div class="row">
                <div class="col-md-2"><h2>Licencjackie</h2>
                </div>
                <div class="col-md-5">
                    <h4>Stacjonarne</h4>
                    <a href="select?area=SLLD" class="btn btn-default btn-lg btn-block">Studia w języku polskim</a>
                    <a href="select?area=SLLA" class="btn btn-default btn-lg btn-block">Studies in English</a>			
                    <a href="select?area=SLLM" class="btn btn-default btn-lg btn-block">Management</a>
                </div>
                <div class="col-md-5">
                        <h4>Niestacjonarne</h4>
                        <a href="select?area=NLLP" class="btn btn-default btn-lg btn-block">Popołudniowe</a>
                        <a href="select?area=NLLS" class="btn btn-default btn-lg btn-block">Sobotnio-niedzielne</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2"><h2>Magisterskie</h2>
                </div>
                <div class="col-md-5">	
                    <h4>Stacjonarne</h4>
                    <a href="select?area=SMMD" class="btn btn-default btn-lg btn-block">Studia w języku polskim</a>
                    <a href="select?area=SMMA" class="btn btn-default btn-lg btn-block">Studies in English</a>
                </div>
                <div class="col-md-5">
                    <h4>Niestacjonarne</h4>
                    <a href="select?area=NMMP" class="btn btn-default btn-lg btn-block">Popołudniowe</a>
                    <a href="select?area=NMMS" class="btn btn-default btn-lg btn-block">Sobotnio-niedzielne</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2"><h2>Inne</h2></div>
                    <div class="col-md-10">	
                        <a href="select.php?area=PODYPLOMOWE" class="btn btn-default btn-lg btn-block disabled">Podyplomowe</a>
                        <a href="select.php?area=DOKTORANCKIE" class="btn btn-default btn-lg btn-block disabled">Doktoranckie</a>
                    </div>
            </div>
        </div>
    </div>
    <?php include 'script.html';?>
</body>
</html>


