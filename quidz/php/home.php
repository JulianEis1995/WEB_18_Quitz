<!doctype html>
<html lang="de">
<header>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../stylesheets/bootstrap.min.css">
    <link rel="stylesheet" href="../stylesheets/stylelogin.css" media="screen">

</header>
<body>


<?php
session_start();
// Seite?


// Nutzer ist angemeldet?
// TODO: Prüfen ob Nutzer angemeldet ist
if(isset($_SESSION['user'])):
    require_once('login.php');
endif;
?>

</body>
<footer></footer>

</html>