<?php
include "./parts/header.php";
?>
    <script>
        //passwortstärke wird überprüft
        function validatePassword(password) {

            // Nichts anzeigen, wenn die Länge 0 ist
            if (password.length === 0) {
                document.getElementById("msg").innerHTML = "";
                return;
            }
            // Erzeugt ein Array mit allmöglichen Kombinationen
            var matchedCase = new Array();
            matchedCase.push("[$@$!%*#?&]"); // Sonderzeichen
            matchedCase.push("[A-Z]");      // Großbuchstaben
            matchedCase.push("[0-9]");      // Nummern
            matchedCase.push("[a-z]");     // Kleinbuchstaben

            // Überprüft die Bedingungen
            var ctr = 0;
            for (var i = 0; i < matchedCase.length; i++) {
                if (new RegExp(matchedCase[i]).test(password)) {
                    ctr++;
                }
            }
            // Gibt sie aus
            var color = "";
            var strength = "";
            switch (ctr) {
                case 0:
                case 1:
                case 2:
                    strength = "Very Weak";
                    color = "red";
                    break;
                case 3:
                    strength = "Medium";
                    color = "orange";
                    break;
                case 4:
                    strength = "Strong";
                    color = "green";
                    break;
            }
            document.getElementById("msg").innerHTML = strength;
            document.getElementById("msg").style.color = color;
        }
    </script>

    <?php

    //registrieren
    //datenbankverbindung herstellen
    $db = new mysqli('localhost','root','','quitz');
    if($db->connect_error):
        echo $db->connect_error;
    endif;
    if(isset($_POST['absenden2'])):// wenn man absenden knopf drückt, soll das folgenden passieren:

        //Variablen für die jeweiligen spalten der datenbank erzeugen
        $benutzername2 = $_POST['benutzername2'];
        $vorname2 = $_POST['vorname2'];
        $nachname2 = $_POST['nachname2'];
        $email = $_POST['email'];
        $passwort2 = $_POST['passwort2'];
        $passwort2_widerholen = $_POST['passwort2_wiederholen'];

        //holt Email aus der datenbank
        $search_mail = $db->prepare("SELECT PID FROM tplayer WHERE mail = ?");
        $search_mail->bind_param('s',$email);
        $search_mail->execute();
        $search_mailresult = $search_mail->get_result();

        //holt username aus datenbank
        $search_user = $db->prepare("SELECT PID FROM tplayer WHERE username = ?");
        $search_user->bind_param('s',$benutzername2);
        $search_user->execute();
        $search_userresult = $search_user->get_result();



        //Überprüft, ob Benutzername existiert
        if($search_userresult->num_rows == 0):
            //Überprüft, ob Email existiert
            if($search_mailresult->num_rows == 0):

                //Überprüft ob alles ausgefüllt ist
                if ($benutzername2 !== "" && $vorname2 !== "" && $nachname2 !== "" && $email !== "" && $passwort2 !== "" && $passwort2_widerholen !== ""):

                    //Überprüft, ob die Passwörter identisch ist
                    if($passwort2 == $passwort2_widerholen):
                        //Passwort wird nach md5 verschlüsselt
                        $passwort2 = md5($passwort2);
                        //die angegebenen daten werden in die datenbank gefüllt
                        $insert = $db->prepare("INSERT INTO tplayer (username,vname, nname, mail, pwd) VALUES (?,?,?,?,?)");
                        $insert->bind_param('sssss',$benutzername2, $vorname2, $nachname2, $email, $passwort2);
                        $insert->execute();

                        if (isset($_POST['absenden2'])) {
                            if ($_POST['benutzername2'] == "" || $_POST['vorname2'] == "" || $_POST['nachname2'] == "" || $_POST['email'] == "" || $_POST['passwort2'] == "" || $_POST['passwort2_wiederholen'] == "") {
                                echo "error: all fields are required";
                            } else {
                                echo "proceed...";
                            }
                        }


                        if($insert !== false):
                            echo 'Account wurde erfolgreich erstellt!';
                        endif;

                    else:
                        echo 'Passwörter stimmen nicht überein!';
                    endif;
                else:
                    echo 'Alle Felder müssen ausgefüllt sein';
                endif;
            else:
                echo 'Email ist vergeben!';
            endif;
        else:
            echo 'Benutzername ist vergeben!';
        endif;
    endif;

    //login

    if(isset($_POST['absenden'])):// wenn man absenden knopf drückt, soll das folgenden passieren:
        //die eingegebenen daten werden verglichen
        $benutzername = strtolower($_POST['benutzername']);
        $passwort = $_POST['passwort'];
        $passwort = md5($passwort);

        //
        $search_user2 = $db->prepare("SELECT PID FROM tplayer WHERE username = ? AND pwd = ?");
        $search_user2->bind_param('ss',$benutzername,$passwort);
        $search_user2->execute();
        $search_result = $search_user2->get_result();

        if($search_result->num_rows == 1):
            $search_object = $search_result->fetch_object();

            //falls alles passt wird man zu homelogin weitergelitten
            $_SESSION['user'] = $search_object->PID;
            header('Location: homelogin.php');
        else:
            echo 'Deine Angaben sind leider nicht korrekt!';
        endif;
    endif;

    ?>

</head>
<body>
<div class="container">
    <div class="row">


        <form class="login" action="" method="post">
            <div class="form-group">
                <label>Login</label>
                <input type="username" name="benutzername" class="form-control"  placeholder="Benutzername">
            </div>
            <div class="form-group">

                <input type="password" name="passwort" class="form-control"placeholder="Passwort">
            </div>

            <button type="submit" name="absenden" class="btn btn-primary">Login</button>
        </form>

        <form class="regis" action="" method="post">
            <div class="form-group">
                <label>Signup</label>
                <input type="username" name="benutzername2" class="form-control"  placeholder="Benutzername">
            </div>
            <div class="form-group">

                <input type="firstname" name="vorname2" class="form-control"  placeholder="Vorname">
            </div>

            <div class="form-group">

                <input type="lastname" name="nachname2" class="form-control"placeholder="Nachname">
            </div>

            <div class="form-group">

                <input type="email" name="email" class="form-control"placeholder="E-Mail">
            </div>

            <div class="form-group">

                <input type="password" name="passwort2" class="form-control"placeholder="Passwort" onkeyup="validatePassword(this.value);"><span id="msg"></span>
            </div>

            <div class="form-group">

                <input type="password" name="passwort2_wiederholen" class="form-control"placeholder="Passwort wiederholen">
            </div>

            <button type="submit" name="absenden2" class="btn btn-primary">Signup</button>
        </form>



    </div>
</div>

</body>
<?php
include "./parts/footer.php";
?>