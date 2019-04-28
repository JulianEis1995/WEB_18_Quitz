<?php
// Verbindung

//verbindung erstellen
$db=mysqli_connect('localhost', 'quidz', '', 'quidz');

//check connection
if(mysqli_connect_errno()){
    echo 'connection Failed' . mysqli_connect_errno();
}

//create Querry
$query1='SELECT * FROM tquestions WHERE SID==1';
$query2='SELECT * FROM tquestions WHERE SID==2';
$query3='SELECT * FROM tquestions WHERE SID==3';

//get result
$result1=mysqli_query($db, $query1);
$result2=mysqli_query($db, $query2);
$result3=mysqli_query($db, $query3);

// fetch Data
$fragen1=mysqli_fetch_all($result1, MYSQLI_ASSOC);
$fragen2=mysqli_fetch_all($result2, MYSQLI_ASSOC);
$fragen3=mysqli_fetch_all($result3, MYSQLI_ASSOC);

//Free result
mysqli_free_result($result1);
mysqli_free_result($result2);
mysqli_free_result($result3);

//close
mysqli_close($db);

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
<?php foreach($fragen1 as $post1): foreach ($fragen2 as $post2): foreach ($fragen3 as $post3):        ?>
<div class="Pause">
    <button type="button" class="btn btn-dark">Pause</button>
</div>
<div class="Frage">
    <p><?php if(SID==1){
        echo $post1['question'];}
        else if(SID==2){
            echo $post2['question'];
            }
        else
        {echo $post3['question'];}
                ?></p>
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

<div class="Antwort1">
    <button type="button" class="btn btn-primary" class="Antwort1">Antwort 1</button>

    <button type="button" class="btn btn-primary" class="Antwort2">Antwort 2</button>
</div>
<div class="Antwort3">
    <button type="button" class="btn btn-primary" class="Antwort3">Antwort 3</button>

    <button type="button" class="btn btn-primary" class="Antwort4">Antwort 4</button>
</div>
<?php endforeach; ?>
<?php endforeach; ?>
<?php endforeach; ?>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
