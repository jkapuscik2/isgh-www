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
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <?php
    include ("navbar.html");
    ?>	
    <div class="jumbotron">
        <div class="container">
            <h1>Janosik</h1>
            <p>Aktualizuj wydarzenia</p>
        </div>
    </div>
    <div class="container">
        <?php
        //Connect to DB
        require_once 'db.php';
        
        $query="select * from isgh_plan_".$_POST['area']." where event_id = ".$_POST['event_id'];
        if (!$mysqli->query($query)) {
            echo 'Wystąpił błąd. Powiadom nas o tym błędzie na adres <a href="mailto:support@i-sgh.pl">support@i-sgh.pl</a>. <br><br> Błąd:  (' . $mysqli->errno . ') ' . $mysqli->error;
            }
        $result = $mysqli->query($query);
        $result->data_seek(0);
        while ($row = $result->fetch_assoc()) {
            $event_id = $row['event_id'];
            $subject_id = $row['subject_id'];
            $lecturer_id = $row['lecturer_id'];
            $subject = $row['subject'];
            $lecturer = $row['lecturer'];
            $type = $row['type'];
            $day = $row['day'];
            $start_time = $row['start_time'];
            $end_time = $row['end_time'];
            $group = $row['group'];
            $location = $row['location'];
            $date = $row['date'];
        }
        if ($_POST["update"] == "o") {
            echo "ODWOŁANE ".$_POST['area']." event_id:".$_POST['event_id']."<br>".$_POST["update"];
            $subject="[ODWOŁANE] ".$subject;
            echo $subject;
            $query='INSERT INTO `01759070_isgh`.`isgh_plan_update` (`uid`,`area`,`event_id`,`subject_id`,`lecturer_id`,`subject`,`lecturer`,`type`,`day`,`start_time`,`end_time`,`group`,`location`,`date`) VALUES ("'.$_POST["uid"].'","'.$_POST["area"].'","'.$event_id.'","'.$subject_id.'","'.$lecturer_id.'","'.$subject.'","'.$lecturer.'","'.$type.'","'.$day.'","'.$start_time.'","'.$end_time.'","'.$group.'","'.$location.'","'.$date.'")';
            if (!$mysqli->query($query)) {
                echo 'Wystąpił błąd. Powiadom nas o tym błędzie na adres <a href="mailto:support@i-sgh.pl">support@i-sgh.pl</a>. <br><br> Błąd:  (' . $mysqli->errno . ') ' . $mysqli->error;
            }
        } else if ($_POST["update"] == "k") {
            echo "KOLOKWIUM ".$_POST['area']." event_id:".$_POST['event_id'];
            $subject="[KOLOKWIUM] ".$subject;
            $query='INSERT INTO `01759070_isgh`.`isgh_plan_update` (`uid`,`area`,`event_id`,`subject_id`,`lecturer_id`,`subject`,`lecturer`,`type`,`day`,`start_time`,`end_time`,`group`,`location`,`date`) VALUES ("'.$_POST["uid"].'","'.$_POST["area"].'","'.$event_id.'","'.$subject_id.'","'.$lecturer_id.'","'.$subject.'","'.$lecturer.'","'.$type.'","'.$day.'","'.$start_time.'","'.$end_time.'","'.$group.'","'.$location.'","'.$date.'")';
            if (!$mysqli->query($query)) {
                echo 'Wystąpił błąd. Powiadom nas o tym błędzie na adres <a href="mailto:support@i-sgh.pl">support@i-sgh.pl</a>. <br><br> Błąd:  (' . $mysqli->errno . ') ' . $mysqli->error;
            }
        } else {
            echo "dupa";
        }
        ?>
    </div>
    <?php
    include ("script.html");
    ?>
</body>
</html>