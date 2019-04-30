    <?php
    echo $this->header;
    ?>
<!-- Buttons -->

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <img class="card-img-top img-fluid" src="logo/start.png" alt="Play">
            <div class="card-body">
                <h5 class="card-title">Play the Game?</h5>
                <p class="card-text">Willst du ein neues Spiel starten? Dann warte nicht und klick hier!</p>
                <form method="get" action="includes/views/game.php">
                    <button type="submit" class="btn btn-primary">Spiel Starten</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <img class="card-img-top img-fluid" src="logo/optionen.png" alt="Optionen">
            <div class="card-body">
                <h5 class="card-title">Want to configure something?</h5>
                <p class="card-text">Ist dir das Spiel zu leicht oder zu schwer? Dann passe die Schwierigkeit an!</p>
                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#ModalOptionen">Optionen</button>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <img class="card-img-top img-fluid" src="logo/bestenliste.png" alt="Bestenliste">
            <div class="card-body">
                <h5 class="card-title">Who is the best?</h5>
                <p class="card-text">Kannst du den besten schlagen? Schau hier nach und du erfährst, wie gut du sein musst!</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalSpielBestenliste">Bestenliste</button>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <img class="card-img-top img-fluid" src="logo/anleitung.png" alt="Anleitung">
            <div class="card-body">
                <h5 class="card-title">Need help?</h5>
                <p class="card-text">Du hast dieses Spiel noch nie gespielt oder willst noch einmal die Regeln nachlesen? Kein Problem!</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalSpielAnleitung">Anleitung</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Optionen-->
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
                <h5>Schwierigkeit</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="difficulty" id="difficulty1" value="easy" checked>
                    <label class="form-check-label" for="difficulty1">
                        Leicht
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="difficulty" id="difficulty2" value="medium">
                    <label class="form-check-label" for="difficulty2">
                        Mittel
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="difficulty" id="difficulty3" value="difficult">
                    <label class="form-check-label" for="difficulty3">
                        Schwer
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Bestenliste-->
<div class="modal fade" id="ModalSpielBestenliste" tabindex="-1" role="dialog" aria-labelledby="ModalSpielBestenlisteTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalSpielBestenlisteTitle">Bestenliste</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class='table table-hover'>
                    <thead>
                    <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Username</th>
                        <th scope='col'>Vorname</th>
                        <th scope='col'>Nachname</th>
                        <th scope='col'>Mail</th>
                        <th scope='col'>Preis</th>
                        <th scope='col'>Zeit</th>
                        </tr>";
                    </thead>";

                <?php
                $nr = 0;
                foreach($this->scoreboard as $scoreboardObj):
                ?>
                <tr>
                    <td><?php echo $nr; ?></td>
                    <td><?php echo $scoreboardObj->username; ?></td>
                    <td><?php echo $scoreboardObj->vname; ?></td>
                    <td><?php echo $scoreboardObj->nname; ?></td>
                    <td><?php echo $scoreboardObj->mail; ?></td>
                    <td><?php echo $scoreboardObj->price; ?></td>
                    <td><?php echo $scoreboardObj->time; ?></td>
                </tr>
                <?php
                $nr++;
                endforeach;
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Anleitung-->
<div class="modal fade" id="ModalSpielAnleitung" tabindex="-1" role="dialog" aria-labelledby="ModalSpielAnleitungTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalSpielAnleitungTitle">Anleitung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Jeder Kandidat bekommt ein Spielmodul. Die Quizkarten werden nun nach ihrem Geldwert auf 15 Stapel verteilt. Einer der Mitspieler ist der Quizmaster. Er nimmt die erste 50€ Karte und steckt diese in sein Modul. Wichtig hierbei ist, dass er die Rückseite des Spielmoduls verdeckt, da dort die Antwort zu sehen ist.
                <p>Nun versucht jeder Spieler für sich das Ziel der Million zu erreichen. Hierfür schiebt er drei der vier Regler so zurecht, dass nur noch der Buchstabe seiner Antwort zu sehen ist.
                <p>Wer zuerst die 15. und damit Millionenfrage erreicht hat, hat dieses Spiel gewonnen. Es kann aber auch vor Spielbeginn eine gewisse Rundenzahl genannt werden die das Ende des Spiels bedeutet. In dieser Variante gewinnt der Spieler, der zu diesem Zeitpunkt die meißten Fragen fehlerfrei beantwortet hat.
                <p>Natürlich gibt es auch die bekannten drei Joker bei Wer wird Millinär?. Bei dem 50:50 Joker streicht der Moderator zwei der falschen Antworten. Wählt man den Publikumsjoker, antworten die Mitspieler verdeckt auf ihrem Spielmodul. Diese zeigen nun ihre Karten dem Spielführer und er verkündet das Ergebniss der Antworten. Der allzeit beliebte Telefonjoker darf natürlich auch nicht fehlen. Jedoch wird nicht wirklich jemand angerufen, sondern man sucht sich aus der Runde einen Kandidaten aus, der die Frage beantworten soll. Dieser versucht nun ehrlich seine Meinung kundzutun.
                <p>Die Spieldauer beträgt je nach gewählter Variante ca. 45 Minuten. Ein Spielspaß für die ganze Familie.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    <?php

    echo $this->footer;

    ?>