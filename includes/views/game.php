<?php
// Verbindung
session_start();


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
