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
            <?php 
            if ($google_auth == 0) {
            echo '
            <h1>Twój plan zajęć jest już gotowy!</h1>
            <p>Sprawdź proszę, czy lista przedmiotów jest kompletna.</p>';
            } else {
            echo '<h1>Mission accomplished.</h1>
            <p>Poniżej znajduje się lista przedmiotów, które zostały dodane do <a href="http://calendar.google.com">Twojego kalendarza Google</a>.</p>';
            }
            ?>
        </div>
    </div>
        <?php
        $table_fix = $_POST['table_fix'];

        //Connect to DB
        require_once 'db.php';

        //check if new user
        $query ="
            SELECT * 
            FROM isgh_users
            WHERE indeks =  '".$_POST['indeks']."'
            AND email =  '".$_POST['email']."'
            ORDER BY registration_timestamp DESC 
            LIMIT 0 , 1";
        $result = $mysqli->query($query);
        $row_cnt = $result->num_rows;
        if ($row_cnt == 1) {
            $new_user = 0;
            $result->data_seek(0);
            while ($row = $result->fetch_assoc()) {
            $uid = $row['uid'];
            $new_user_id = $row['id'];
            }
        } else {
            $new_user=1;

            //wygenerowanie uid
            $uid = "l".uniqid();

            //dodanie informacji o użytkowniku do isgh_users
            $new_user_query = "insert into `isgh_users` (`uid`,`indeks`,`email`,`data_accept`,`email_accept`,`registration_timestamp`) values ('".$uid."','".$_POST['indeks']."','".$_POST['email']."','".$_POST['data_accept']."','".$_POST['email_accept']."',now())";
            $mysqli->query($new_user_query);
            $new_user_id = $mysqli->insert_id;
        };

        //zapytanie do bazy
        $query="select distinct subject_id,lecturer_id,subject,lecturer,type,`group` from isgh_plan_".$table_fix;
        $result = $mysqli->query($query);
        $result->data_seek(0);
        while ($row = $result->fetch_assoc()) {
            $ugroup=$row['subject_id'].$row['lecturer_id'].$row['group'];
            
            //warunek - zaznaczony checkbox
            if(isset($_POST[$ugroup]) && $_POST[$ugroup] == 'Yes') {
                
                //wiersz z danymi jednego kalendarza przedmiotowego
                $line_lista.='
                <tr>
                    <td>'.$row['subject_id'].'-'.$row['lecturer_id'].'</td>
                    <td>'.$row['subject'].'</td>
                    <td>'.$row['lecturer'].'</td>
                    <td>'.$row['type'].'</td>
                    <td>'.$row['group'].'</td>
                </tr>';

                //dodaj info do bazy
                $query_stat = 'insert into isgh_users_groups (`user_id`,`area`,`subject_id`,`lecturer_id`,`group`) values ("'.$new_user_id.'","'.$table_fix.'","'.$row['subject_id'].'","'.$row['lecturer_id'].'","'.$row['group'].'")';
                if (!$mysqli->query($query_stat)) {
                    echo "insert failed - (" . $mysqli->errno . ") " . $mysqli->error;
                }
            } else {
                //do nothing
            }
        }
        ?>
    <div class="container">
        <?php
        if ($new_user == 0) {
            echo '
            <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>Wygląda na to, że już rejestrowałeś sie na i-sgh.pl - wybrane przez Ciebie przedmioty zostały dodane do ostatnio wygenerowanego przez ciebie kalendarza i powinny się w nim pojawić w ciągu 24h. Instrukcję usuwania przedmiotów znajdziesz w <a href="faq">FAQ</a></p>
            </div>';
        };
        ?>
        <div class="row">
            <div class="col-md-8">
                <table id="przedmioty_lista" class="table table-bordered table-hover">
                    <tr>
                            <th>Sygnatura</th>
                            <th>Przedmiot</th>
                            <th>Wykładowca</th>
                            <th>Typ</th>
                            <th>Grupa</th>
                    </tr>
                    <?php 
                    echo $line_lista;
                    ?>
                </table>
            </div>
            <div class="col-md-4">
                <h3>Zacznij korzystać!</h3>
                <p>
                <a style="font-size:22px" class="btn btn-success btn-lg" href="https://www.google.com/calendar/render?cid=http://kalendarz.i-sgh.pl/<?php echo $uid;?>.ics" target="blank"><span class="glyphicon glyphicon-calendar"></span> Dodaj do kalendarza Google</a>
                </p>
                <h3>W smartfonie lub tablecie</h3>
                <p>Twój plan zajęć i-sgh.pl może być zawsze przy tobie. <a href="telefon.php" target="blank">Dowiedz się więcej</a>.</p>
                <h3>Podziel się!</h3>
                <p>Plan zajęć i-sgh.pl tworzyliśmy z myślą o wszystkich studentach SGH. Podziel się dobrą nowiną ze swoimi znajomymi. <div class="fb-share-button" data-href="http://i-sgh.pl" data-type="button_count"></div></p>
                <h3>
                Chcesz wiedzieć więcej?
                </h3>
                <p>Przeczytaj <a href="faq.php" target="blank">najczęściej zadawane pytania</a>.</p>
                                <h3>
                    Nie chcę korzystać z kalendarza Google
                </h3>
                <p>Z planu zajęć i-sgh.pl możesz korzystać w dowolnej aplikacji, która wspiera standard iCalendar. Skorzystaj z przygotowanych przez nas instrukcji:</p>
                <p>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Instrukcje <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="instrukcja.php#ChmuraSGH" target="blank">Chmura SGH / Office365</a></li>
                            <li><a href="instrukcja.php#GoogleCalendar" target="blank">Google Calendar</a></li>
                            <li><a href="instrukcja.php#Outlook" target="blank">Outlook.com</a></li>
                            <li><a href="instrukcja.php#iCal" target="blank">Apple iCal</a></li>	
                            <li><a href="instrukcja.php#wppl" target="blank">wp.pl</a></li>
                            <!--<li class="divider"></li>
                            <li><a href="#">Separated link</a></li> -->
                        </ul>
                    </div>
                </p>
                <p>
                    <?php
                    echo '
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a id="test" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                  Zapoznałem się już z instrukcją powyżej i wiem jak korzystać z mojego kalendarza.
                                </a>
                              </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse out">
                                <div class="panel-body">
                                <input type="text" onClick="this.select();" class="form-control" value="http://kalendarz.i-sgh.pl/'.$uid.'.ics">
                                </div>
                            </div>
                        </div>
                    ';
                    ?>
                </p>
                <!--
                <h3>Plan w telefonie</h3>
                <p>Nasze instrukcje krok po kroku pokażą ci jak korzystać z Twojego nowego planu zajęć w telefonie lub tablecie</p>
                <p>
                    <div class="btn-group">
                    <a href="telefons.php" class="btn btn-info"><span class="glyphicon glyphicon-phone"></span> Plan w telefonie/tablecie</a>
                    <button type="button" class="btn btn-info">Plan w telefonie/tablecie</button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                    <li><a href="telefon.php#Android">Android</a></li>
                    <li><a href="telefon.php#iOS">iOS</a></li>
                    <li><a href="telefon.php#WP">Windows Phone</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    </ul>
                    </div>
                </p>
                <h3>Podziel się!</h3>
                <p>Plan i-sgh.pl tworzyliśmy z myślą o ułatwieniu życia wszystkim studentom SGH. Pomóż nam i podziel się dobrą nowiną ze swoimi znajomymi. <div class="fb-share-button" data-href="http://i-sgh.pl" data-type="button_count"></div>
                <h3>Nasz plan jest zawsze aktualny</h3>
                <p>Staramy się możliwie szybko aktualizować plan i-sgh.pl do najnowszej dostępnej wersji harmonogramu na stronie SGH. Ewentualne zmiany pojawią się w Twoim planie natychmiastowo.</p>
                -->
            </div>
        </div>
    </div>
    <?php
    include ("script.html");
    ?>
	
</body>
</html>


