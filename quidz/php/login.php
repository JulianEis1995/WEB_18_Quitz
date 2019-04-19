<!doctype html>
<html lang="de">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../stylesheets/stylelogin.css" media="screen">
    <link rel="stylesheet" href="../stylesheets/bootstrap.min.css">

    <title>WWM</title>
    <script>
        function validatePassword(password) {

            // Do not show anything when the length of password is zero.
            if (password.length === 0) {
                document.getElementById("msg").innerHTML = "";
                return;
            }
            // Create an array and push all possible values that you want in password
            var matchedCase = new Array();
            matchedCase.push("[$@$!%*#?&]"); // Special Charector
            matchedCase.push("[A-Z]");      // Uppercase Alpabates
            matchedCase.push("[0-9]");      // Numbers
            matchedCase.push("[a-z]");     // Lowercase Alphabates

            // Check the conditions
            var ctr = 0;
            for (var i = 0; i < matchedCase.length; i++) {
                if (new RegExp(matchedCase[i]).test(password)) {
                    ctr++;
                }
            }
            // Display it
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

        <?php

            //registrieren
                    $db = new mysqli('localhost','quidz','','quidz');
                    if($db->connect_error):
                      echo $db->connect_error;
                    endif;
                    if(isset($_POST['absenden2'])):

                      $benutzername2 = $_POST['benutzername2'];
                      $vorname2 = $_POST['vorname2'];
                      $nachname2 = $_POST['nachname2'];
                      $email = $_POST['email'];
                      $passwort2 = $_POST['passwort2'];
                      $passwort2_widerholen = $_POST['passwort2_wiederholen'];

                        $search_mail = $db->prepare("SELECT PID FROM tplayer WHERE mail = ?");
                        $search_mail->bind_param('s',$email);
                        $search_mail->execute();
                        $search_mailresult = $search_mail->get_result();


                      $search_user = $db->prepare("SELECT PID FROM tplayer WHERE username = ?");
                      $search_user->bind_param('s',$benutzername2);
                      $search_user->execute();
                      $search_userresult = $search_user->get_result();




                      if($search_userresult->num_rows == 0):
                          if($search_mailresult->num_rows == 0):

                              if ($benutzername2 !== "" && $vorname2 !== "" && $nachname2 !== "" && $email !== "" && $passwort2 !== "" && $passwort2_widerholen !== ""):

                        if($passwort2 == $passwort2_widerholen):
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
        if(isset($_POST['absenden'])):
            $benutzername = strtolower($_POST['benutzername']);
            $passwort = $_POST['passwort'];

            $search_user2 = $db->prepare("SELECT PID FROM tplayer WHERE username = ? AND pwd = ?");
            $search_user2->bind_param('ss',$benutzername,$passwort);
            $search_user2->execute();
            $search_result = $search_user2->get_result();

            if($search_result->num_rows == 1):
                $search_object = $search_result->fetch_object();


               $_SESSION['user'] = $search_object->PID;
                header('Location: homelogin.php');
            else:
                echo 'Deine Angaben sind leider nicht korrekt!';
            endif;
        endif;

?>

    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>