<?php

/**
 */
class HomeLoginController extends Controller
{
	protected $viewFileName = "homelogin"; //this will be the View that gets the data...
	protected $loginRequired = true;


	public function run()
	{
		//wurde ein Formular abgeschickt?
        //welche Daten soll ich aus der Datenbank holen?
        //soll ich irgendwas speichern?
        $this->view->scoreboard = ScoreboardModel::getScores();



        //todo: das ganze in den richtigen controller schieben
        if(isset($_POST['action']) == 'answer') {
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
        }
	}

}