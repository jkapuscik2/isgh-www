<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
<head>
    <?php include 'head.html';?>
</head>
<body>
    <?php include_once 'analyticstracking.php';?>
    <?php
        if (isset($_POST['submit_ok'])) {
            $insert_query = "update isgh_plan_".$_POST['area']." set subject = '".$_POST['subject']."' where event_id = ".$_POST['event_id']."";
            //if (!$mysqli->query($insert_query)) {
            //    echo 'Błąd MySQL:  (' . $mysqli->errno . ') ' . $mysqli->error;
            //}
            //$new_product_id = $mysqli->insert_id;
            echo $insert_query;
        }
    ?>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <div class="jumbotron">
        <div class="container">
            <h1>Janosik</h1>
            <p>Aktualizuj wydarzenia</p>
        </div>
    </div>
    <div class="container">
        <table id="przedmioty_lista" class="table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Indeks</th>
                    <th>Studia</th>
                    <th>Sygnatura</th>
                    <th>Przedmiot</th>
                    <th>Wykładowca</th>
                    <th>Typ</th>
                    <th>Grupa</th>
                    <th>Lokalizacja</th>
                    <th>Data</th>
                    <th>Zaakceptuj/Odrzuć</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $table_fix = $_GET["area"];

                //Connect to DB
                require_once 'db.php';
                
                //zapytanie do bazy o tabelkę z kalendarzami przedmiotów
                $query="SELECT u.uid,u.email,u.indeks,j.area,j.event_id,j.subject_id,j.lecturer_id,j.subject,j.lecturer,j.type,j.day,j.start_time,j.end_time,j.group,j.location,j.date FROM `isgh_plan_update` j inner join isgh_users u on j.uid=u.uid";
                if (!$mysqli->query($query)) {
                    echo 'Coś poszło nie tak :( Daj znać o tym Filipowi na adres <a href="mailto:filip@i-sgh.pl">filip@i-sgh.pl</a>. <br><br> Treść błędu:  (' . $mysqli->errno . ') ' . $mysqli->error;
                }
                $result = $mysqli->query($query);
                $result->data_seek(0);
                while ($row = $result->fetch_assoc()) {
                    //wyświetlenie jednego wiersza
                    echo '
                    <tr>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['indeks'].'</td>
                        <td>'.$row['area'].'</td>
                        <td>'.$row['subject_id'].'-'.$row['lecturer_id'].'</td>
                        <td>'.$row['subject'].'</td>
                        <td>'.$row['lecturer'].'</td>
                        <td>'.$row['type'].'</td>
                        <td>'.$row['group'].'</td>
                        <td>'.$row['location'].'</td>
                        <td>'.$row['date'].'</td>
                        <td><form action="index" method="post">
                            <input type="hidden" name="area" value="'.$row['area'].'">
                            <input type="hidden" name="event_id" value="'.$row['event_id'].'">
                            <input type="hidden" name="subject" value="'.$row['subject'].'">
                            <button type="submit" class="btn btn-default btn-xs" name="submit_ok">Aktualizuj</button></form>
                        </td>
                    </tr>';
                }
            ?>
            </tbody>
            </table>
    </div>
    <?php include 'script.html';?>
</body>
</html>