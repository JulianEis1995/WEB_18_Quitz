<?php
echo $this->header;
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Spielfeld</title>
</head>
<body>
<div class="Pause">
<button type="button" class="btn btn-dark">Pause</button>
</div>
<div class="Frage">
<p>Frage .</p>
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



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<?php

echo $this->footer;

?>