<?php
// Verbindung, Session starten
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
    $_SESSION['questionsAsked'] = array();//füllt aray mit bereits gestellten fragen
}
//Schwierigkeit bekommen
if($_SESSION['gameStatus'] == 'running') {
    $sid = $_GET['sid'];
}

$db= new mysqli('localhost', 'root', '', 'quitz'); //verbindung zur datenbank
//check connection
if(!$db){
    echo 'connection Failed' . mysqli_connect_errno();
}
//Frage herausziehen
$questionsAskedString = implode(',', unserialize($_SESSION['questionsAsked']));// Fragen die bereits gestellt wurden
$optionalExclude = '';
if($questionsAskedString != '') { //es wird eine frage gesucht die noch nicht im Fragenarray drin ist, also noch nicht verwendet wird
    $optionalExclude = 'AND FID NOT IN ('.$questionsAskedString.')';
}
$sql="SELECT * FROM tquestions WHERE SID=".intval($sid).' '.$optionalExclude.' LIMIT 1'; //holt aus der datenbank mit bedingung einer bestimmten SID genau eine Frage aus der Datenbank
$fragenresult = $db->query($sql); // Frage wird als Result gespeichert
if($fragenresult == false) {
    echo $db->error;// wenn keien frage enthalten ist gibt es einen error
}
else{
    $fragenObject = $fragenresult->fetch_object(); // ansonsten wir das object gefetscht und hat einen gespeicherten rückgabewert
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

    $alreadyAnsweredQuestions = unserialize($_SESSION['questionsAsked']);  // diese methode dient dazu das sich das array wenn alle fragen gestellt wurden leert

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
    <script>




    </script>
    <link rel="stylesheet" href="../stylesheets/spielfeld.css">
</head>
<body>



<button type="button" class="Pause"  data-toggle="modal" data-target="#ModalOptionen">Optionen</button> <!-- Pauseknopf mit möglichkeite auf spielfortsetzen oder spiel schließen-->


<div class="modal fade" id="ModalOptionen" tabindex="-1" role="dialog" aria-labelledby="ModalOptionenTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalOptionenTitle">Optionen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-option btn-outline-primary btn-large btn-block">Spiel fortsetzen</button>
                <button type="button" class="btn btn-option btn-outline-primary btn-large btn-block">Spiel beenden</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="Frage">

    <p><?php echo $fragenObject->question; //ausgabe der Frage?></p>



</div>

<div class="progress"> <!-- progress leiste ist auf 30 sekunden getrimmt, das man weiss wie viel zeit noch vorhanden ist-->
    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
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
<div class="Liste"><!-- Liste zeigt aktuelle gewinnsumme-->
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

<form method="post"> <!--Formular wird für ausgabe der 4 antworten benötigt, da man die inputs braucht um die FID zuzuweisen und die fragen in action speichern-->

    <div class="Antwort1">
        <button type="submit" class="btn btn-primary" class="Antwort1" id="a1" name="a1"><?php echo $fragenObject->a1; ?></button> <!-- submit knöpfe damit man antwort auswählöen kann-->

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