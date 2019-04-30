<?php

class QuestionModel
{
	public static function getById($id)
	{
		$db = new Database();
		$sql = "SELECT * FROM tquestions WHERE fid=".intval($id);

		$result = $db->query($sql);

		if($db->numRows($result) > 0)
		{
			return $db->fetchObject($result);
		}

		return null;
	}

	public static function getUnaskedQuestion($sid, $alreadyAnsweredQuestions)
	{
		$db = new Database();

		$sql = "SELECT * FROM tquestions WHERE sid=".intval($sid);
		$result = $db->query($sql);

		if($db->numRows($result) > 0)
		{
            $alreadyAnsweredQuestions = array();

			while($row = $db->fetchObject($result))
			{
                $alreadyAnsweredQuestions[] = $row;
			}

			return $alreadyAnsweredQuestions;
		}

		return null;
	}

	public static function getQuestions()
    {
        //Antwort möglichkeiten
        $db = new Database();

        //spielstart
        if (isset($_SESSION['gameStatus']) && $_SESSION['gameStatus'] == 'gameOver' || !isset($_SESSION['gameStatus'])) {
            $_SESSION['gameStatus'] = 'running';
            $_SESSION['questionsAsked'] = array();
        }
        //Schwierigkeit für seite
        if ($_SESSION['gameStatus'] == 'running') {
            $sid = $_GET['sid'];
        }
        //check connection
        if (!$db) {
            echo 'connection Failed' . mysqli_connect_errno();
        }
        //Frage herausziehen
        $questionsAskedString = implode(',', $_SESSION['questionsAsked']);
        $optionalExclude = '';
        if ($questionsAskedString != '') {
            $optionalExclude = 'AND FID NOT IN (' . $questionsAskedString . ')';
        }
        $sql = "SELECT * FROM tquestions WHERE SID=" . intval($sid) . ' ' . $optionalExclude . ' LIMIT 1';
        $fragenresult = $db->query($sql);

        if ($fragenresult == false) {
            return null;
        } else {
            return $fragenObject = $fragenresult->fetch_object();
        }
    }

//richtige Antwort auswählen

        public static function getAnswer($fragenObject)
    {
        $db=  new Database();
        if ($_SESSION['gameStatus'] == 'running') {
            $sid = $_GET['sid'];
        }
        $optionalExclude = '';
        $questionsAskedString = implode(',', $_SESSION['questionsAsked']);
        if ($questionsAskedString != '') {
            $optionalExclude = 'AND FID NOT IN (' . $questionsAskedString . ')';
        }

        $sql = "SELECT * FROM tquestions WHERE SID=" . intval($sid) . ' ' . $optionalExclude . ' LIMIT 1';
        $fragenresult = $db->query($sql);
        if (isset($_POST['action']) == 'answer') {

            $rant = '';
            if (isset($_POST['a3'])) {
                if ($fragenObject->ra == $fragenObject->a3) {
                    echo 'ak';
                } else {

                }
            }
            if (isset($_POST['a2'])) {
                if ($fragenObject->ra == $fragenObject->a2) {

                } else {

                }
            }
            if (isset($_POST['a4'])) {
                if ($fragenObject->ra == $fragenObject->a4) {


                } else {

                }
            }
            if (isset($_POST['a1'])) {
                if ($fragenObject->ra == $fragenObject->a1) {
                } else {

                }
            }
        } return $fragenObject;
    }


}