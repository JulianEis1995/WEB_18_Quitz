<?php
// Verbindung
session_start();


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
//ende
if ($fragenresult== null){
    header('Location: homelogin.php');
}




if(isset($_POST['action']) == 'answer') {

    $rant = '';
    if(isset($_POST['a3'])) {
        if ($fragenObject->ra == $fragenObject->a3)
        {
            echo 'richtig';
        }
        else{
            echo '<script>$(\'#myModal\').modal("show");</script> <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#endGame">
    Spiel beendet
</button>

<!-- Modal -->
<div class="modal fade" id="endGame" tabindex="-1" role="dialog" aria-labelledby="EndGame" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Spiel beendet!</h5>
            </div>
            <div class="modal-body">
                Das Spiel ist beendet. Gratuliere!
                <hr>
                <form method="get" action="includes/views/index.php">
                    <button type="submit" class="btn btn-option btn-outline-primary btn-large btn-block">Ende</button>
                </form>
            </div>


        </div>
    </div>
</div>
';

        }
    }
    if(isset($_POST['a2'])) {
        if ($fragenObject->ra == $fragenObject->a2)
        {
            echo 'richtig';
        }
        else{
            echo '<script>$(\'#myModal\').modal("show");</script> <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#endGame">
    Spiel Beendet
</button>

<!-- Modal -->
<div class="modal fade" id="endGame" tabindex="-1" role="dialog" aria-labelledby="EndGame" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Spiel beendet!</h5>
            </div>
            <div class="modal-body">
                Das Spiel ist beendet. Gratuliere!
                <hr>
                <form method="get" action="includes/views/index.php">
                    <button type="submit" class="btn btn-option btn-outline-primary btn-large btn-block">Ende</button>
                </form>
            </div>


        </div>
    </div>
</div>
';

        }
    }
    if(isset($_POST['a4'])) {
        if ($fragenObject->ra == $fragenObject->a4)
        {
            echo 'richtig';


        }
        else
        {
            echo'<script>$(\'#myModal\').modal("show");</script>
<!-- Button trigger modal -->
<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#endGame\">
    Spiel Beendet
</button>

<!-- Modal -->
<div class=\"modal fade\" id=\"endGame\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"EndGame\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"exampleModalLongTitle\">Spiel beendet!</h5>
            </div>
            <div class=\"modal-body\">
                Das Spiel ist beendet. Gratuliere!
                <hr>
                <form method=\"get\" action=\"includes/views/index.php\">
                    <button type=\"submit\" class=\"btn btn-option btn-outline-primary btn-large btn-block\">Ende</button>
                </form>
            </div>


        </div>
    </div>
</div>
';

        }
    }
    if(isset($_POST['a1'])) {
        if ($fragenObject->ra == $fragenObject->a1)
        {
            echo 'richtig';

        }
        else{
            echo '<script>$(\'#myModal\').modal("show");</script>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#endGame">
    Spiel Beendet
</button>

<!-- Modal -->
<div class="modal fade" id="endGame" tabindex="-1" role="dialog" aria-labelledby="EndGame" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Spiel beendet!</h5>
            </div>
            <div class="modal-body">
                Das Spiel ist beendet. Gratuliere!
                <hr>
                <form method="get" action="homelogin.php">
                    <button type="submit" class="btn btn-option btn-outline-primary btn-large btn-block">Ende</button>
                </form>
            </div>


        </div>
    </div>
</div>
';
        }
    }

    $alreadyAnsweredQuestions = unserialize($_SESSION['questionsAsked']);

    $alreadyAnsweredQuestions[] = $_POST['fid'];

    $_SESSION['questionsAsked'] = serialize($alreadyAnsweredQuestions);
}







$db->close();
?>
<?php
include "./parts/header.php";
?>

    <script>

        //funktion für joker button, jedoch funktioniert diese nicht
        function toggle_div_fun(id) {


            var divelement=document.getElementById(id);
            divelement.style.display='none';
        }

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

</div>
<form method="post">
    <div>
        <button onclick="toggle_div_fun('fa');"  class="btn btn-primary" class="Joker1" name="j1">50/50</button>

    </div>

    <div>
        <button onclick="toggle_div_fun('fa');"  class="btn btn-primary" class="Joker2" name="j2">50/50</button>

    </div>

    <div>
        <button onclick="toggle_div_fun('fa');"  class="btn btn-primary" class="Joker3" name="j3">50/50</button>

    </div>
    <input type="hidden" name="los" value="jok">
</form>
<div class="Liste">
    <ul class="list-group">
        <li class="list-group-item">1.000.000</li>
        <li class="list-group-item">128.000</li>
        <li class="list-group-item">64.000</li>
        <li class="list-group-item">32.000</li>
        <li class="list-group-item">16.000</li>
        <li class="list-group-item">9.000</li>
        <li class="list-group-item">8.000</li>
        <li class="list-group-item">4.000</li>
        <li class="list-group-item">1.000</li>
        <li class="list-group-item">500</li>
    </ul>
</div>

<form method="post">

    <div class="Antwort1">
        <button type="submit" class="btn btn-primary" class="Antwort1" id="fa" name="a1"><?php echo $fragenObject->a1; ?></button>

        <button type="submit" class="btn btn-primary" class="Antwort2" id="fa" name="a2"><?php echo $fragenObject->a2; ?></button>
    </div>
    <div class="Antwort3">
        <button type="submit" class="btn btn-primary" class="Antwort3" id="fa" name="a3"><?php echo $fragenObject->a3; ?></button>

        <button type="submit" class="btn btn-primary" class="Antwort4" id="fa" name="a4"><?php echo $fragenObject->a4; ?></button>
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
<?php
include "./parts/footer.php";
?>