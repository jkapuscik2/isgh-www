<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <?php include 'head.html';?>
</head>
<body class="glowna">
    <?php include_once 'analyticstracking.php';?>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <div id="wrap">	
        <?php include 'navbar.html';?>	
        <div class="jumbotron-front">
            <div class="container">
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p>Plan zajęć na semestr letni już jest dostępny!</p>
                </div>
                <img src="img/logo-www-przezr.png" id="logo" class="img-responsive">
                <h1>Informacja na SGH stała się <strong>dostępna.</strong></h1>
                <p style="text-align:center">Stworzyliśmy plan zajęć, który całkowicie odmieni życie każdego studenta SGH.</p>
                <p style="text-align:center"><!--<a style="font-size:22px" class="btn btn-danger btn-lg" href="plan.php" disabled="disabled">Rozpocznij &raquo;</a>-->
                <a style="font-size:22px" class="btn btn-danger btn-lg" href="plan">Rozpocznij &raquo;</a></p>
            </div>
        </div>
    </div>
    <?php include 'script.html';?>
</body>
</html>