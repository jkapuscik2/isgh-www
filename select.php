<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <?php include 'head.html';?>
    <link rel="stylesheet" type="text/css" href="DataTables-1.10.3/media/css/jquery.dataTables.css">
    <style type="text/css" class="init">
    </style>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/380cb78f450/integration/bootstrap/3/dataTables.bootstrap.css">
    <script type="text/javascript" language="javascript" src="DataTables-1.10.3/media/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="DataTables-1.10.3/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/380cb78f450/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function() {
                $('#przedmioty_lista').DataTable( {
                        "paging":   false,
                        "info":     false

                    } );
        } );
    </script>           
</head>
<body>
    <?php include_once 'analyticstracking.php';?>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <?php include 'navbar.html';?>	
    <div class="jumbotron">
	<div class="container">
            <h1>Twoje przedmioty.</h1>
            <p>Zaznacz grupy przedmiotowe, które chcesz mieć w swoim planie zajęć.</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form name="select" onsubmit="return validateForm()" action="add" method="post">
                <table id="przedmioty_lista" class="table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Sygnatura</th>
                            <th>Przedmiot</th>
                            <th>Wykładowca</th>
                            <th>Typ</th>
                            <th>Grupa</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $table_fix = $_GET["area"];

                        //Connect to DB
                        require_once 'db.php';

                        //zapytanie do bazy o tabelkę z kalendarzami przedmiotów
                        $query="select distinct subject_id,lecturer_id,subject,lecturer,type,`group` from isgh_plan_".$table_fix;
                        if (!$mysqli->query($query)) {
                            echo 'Coś poszło nie tak :( Daj znać o tym Filipowi na adres <a href="mailto:filip@i-sgh.pl">filip@i-sgh.pl</a>. <br><br> Treść błędu:  (' . $mysqli->errno . ') ' . $mysqli->error;
                        }
                        $result = $mysqli->query($query);
                        $result->data_seek(0);
                        while ($row = $result->fetch_assoc()) {
                            $ugroup=$row['subject_id'].$row['lecturer_id'].$row['group'];
                            //wyświetlenie jednego wiersza
                            echo '
                            <tr>
                                <td><input type="checkbox" name='.$ugroup.' value="Yes" /></td>
                                <td>'.$row['subject_id'].'-'.$row['lecturer_id'].'</td>
                                <td>'.$row['subject'].'</td>
                                <td>'.$row['lecturer'].'</td>
                                <td>'.$row['type'].'</td>
                                <td>'.$row['group'].'</td>
                            </tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <input type="hidden" name="table_fix" value="<?php echo $table_fix;?>">
                <div class="well well-lg">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon">@</span>
                        <input type="email" name="email" class="form-control" placeholder="Twój adres e-mail" required>
                    </div>
                    <br>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon">#</span>
                        <input type="number" name="indeks" class="form-control" placeholder="Twój nr indeksu" required>
                    </div>
                    <br>
                    <div class="checkbox">
                        <label style="font-size: 75%;">
                            <input type="checkbox" name="data_accept" value="1"  required>
                            Zgadzam się na przechowywanie i przetwarzanie mojego adresu e-mail oraz numeru indeksu przez i-sgh.pl. Te dane są nam potrzebne, abyśmy wiedzieli ilu studentów używa naszego planu zajęć oraz, żeby lepiej reagować na Wasze zgłoszenia.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label style="font-size: 75%;">
                            <input type="checkbox" name="email_accept" value="1">
                            Chcę otrzymywać wiadomości e-mail od i-sgh.pl. Mogą to być informacje na temat przerw w działaniu planu i-sgh.pl lub organizowanych przez nas akcjach. Nie wysyłamy SPAMu i w każdej chwili możesz zrezygnować z otrzymywania tych wiadomości.
                        </label>
                    </div>
                    <br>
					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p style="font-size: 75%;">Pamiętaj proszę o wyczyszczeniu pola wyszukiwarki tabeli przed przejściem dalej.</p>
					</div>                
                    <input type="submit" class="btn btn-primary btn-lg" value="Dalej!">
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>
</html>