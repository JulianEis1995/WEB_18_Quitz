<?php
// Verbindung
session_start();
//Antwort möglichkeiten
//var_dump($_POST);
/*if(isset($_POST['action']) == 'answer') {
    $fid = $_POST['fid'];
    $answer = '';
    if(isset($_POST['a3'])) {
        $answer = 'a3';
    }
    if(isset($_POST['a2'])) {
        $answer = 'a2';
    }
    if(isset($_POST['a4'])) {
        $answer = 'a4';
    }
    if(isset($_POST['a1'])) {
        $answer = 'a1';
    }
}*/

//spielstart
if(isset($_SESSION['gameStatus']) && $_SESSION['gameStatus'] == 'gameOver' || !isset($_SESSION['gameStatus'])) {
    $_SESSION['gameStatus'] = 'running';
    $_SESSION['questionsAsked'] = array();
}
//Schwierigkeit für seite
if($_SESSION['gameStatus'] == 'running') {
    $sid = $_GET['sid'];
}
//frage besorgen
$db= new mysqli('localhost', 'root', '', 'quitz');
//check connection
if(!$db){
    echo 'connection Failed' . mysqli_connect_errno();
}
//Frage herausziehen
$questionsAskedString = implode(',', unserialize($_SESSION['questionsAsked']));
$optionalExclude = '';
if($questionsAskedString != '') {
    $optionalExclude = 'AND FID NOT IN ('.$questionsAskedString.')';
}
$sql="SELECT * FROM tquestions WHERE SID=".intval($sid).' '.$optionalExclude.' LIMIT 1';
$fragenresult = $db->query($sql);
if($fragenresult == false) {
    echo $db->error;
}
else{
    $fragenObject = $fragenresult->fetch_object();
}

//pruefen $fragenObject == null?
if($fragenObject == null)
{
    $_SESSION['questionsAsked'] = '';

    //speichern score in der Datenbank
    //Redirect auf eine andere SEite?
}
//$fragenresult == null?
//var_dump($fragenresult);
//close

//richtige Antwort auswählen



if(isset($_POST['action']) == 'answer') {

    $rant = '';
    if(isset($_POST['a3'])) {
        if ($fragenObject->ra == $fragenObject->a3)
        {
            echo 'richtig';
        }
        else{
            echo 'falsch';

        }
    }
    if(isset($_POST['a2'])) {
        if ($fragenObject->ra == $fragenObject->a2)
        {
            echo 'richtig';
        }
        else{
            echo 'falsch';

        }
    }
    if(isset($_POST['a4'])) {
        if ($fragenObject->ra == $fragenObject->a4)
        {
            echo 'richtig';


        }
        else
        {
            echo 'falsch';

        }
    }
    if(isset($_POST['a1'])) {
        if ($fragenObject->ra == $fragenObject->a1)
        {
            echo 'richtig';

        }
        else{
            echo 'falsch';


        }
    }

    $alreadyAnsweredQuestions = unserialize($_SESSION['questionsAsked']);

    $alreadyAnsweredQuestions[] = $_POST['fid'];

    $_SESSION['questionsAsked'] = serialize($alreadyAnsweredQuestions);
}

/*if(isset($_POST['los']) == 'jok') {
    if(isset($_POST['j1'])) {
        echo 'amk';

    }
    if(isset($_POST['j2'])) {
        echo 'amkasdf';
    }
    if(isset($_POST['j3'])) {
        echo 'amasdk';
    }
}
*/





$db->close();
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Spielfeld</title>
    <link rel="stylesheet" href="../stylesheets/spielfeld.css">
</head>
<body>



<div class="Pause">
    <button type="button" class="btn btn-dark">Pause</button>
</div>
<div class="Frage">

    <p><?php foreach($this->scoreboard as $scoreboardObj): ?></p>



</div>
<form method="post">
    <div>
        <button type="submit" class="btn btn-primary" class="Joker1" name="j1">50/50</button>

    </div>

    <div>
        <button type="submit" class="btn btn-primary" class="Joker2" name="j2">50/50</button>

    </div>

    <div>
        <button type="submit" class="btn btn-primary" class="Joker3" name="j3">50/50</button>

    </div>
    <input type="hidden" name="los" value="jok">
</form>

<div class="Liste">
    <ul class="list-group">
        <li class="list-group-item">1.000.000</li>
        <li class="list-group-item">500.000</li>
        <li class="list-group-item">125.000</li>
        <li class="list-group-item">64.000</li>
        <li class="list-group-item">32.000</li>
        <li class="list-group-item">16.000</li>
        <li class="list-group-item">8.000</li>
        <li class="list-group-item">4.000</li>
        <li class="list-group-item">2.000</li>
        <li class="list-group-item">1.000</li>
        <li class="list-group-item">500</li>
        <li class="list-group-item">300</li>
        <li class="list-group-item">200</li>
        <li class="list-group-item">100</li>
        <li class="list-group-item">50</li>
    </ul>
</div>

<form method="post">

    <div class="Antwort1">
        <button type="submit" class="btn btn-primary" class="Antwort1" name="a1"><?php echo $fragenObject->a1; ?></button>

        <button type="submit" class="btn btn-primary" class="Antwort2"  name="a2"><?php echo $fragenObject->a2; ?></button>
    </div>
    <div class="Antwort3">
        <button type="submit" class="btn btn-primary" class="Antwort3"  name="a3"><?php echo $fragenObject->a3; ?></button>

        <button type="submit" class="btn btn-primary" class="Antwort4"  name="a4"><?php echo $fragenObject->a4; ?></button>
    </div>
    <input type="hidden" name="fid" value="<?php echo $fragenObject->FID; ?>">
    <input type="hidden" name="action" value="answer">
</form>





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
