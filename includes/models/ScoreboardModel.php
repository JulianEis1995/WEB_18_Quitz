<?php

class ScoreboardModel
{
	public static function getScores()
	{
		$db = new Database();
		$sql = "SELECT username, vname, nname, mail, CONCAT('€ ',FORMAT(price, 2)) AS price, time FROM tPlayer tP INNER JOIN tScoreboard tS ON tP.PID = tS.PID ORDER BY tS.price DESC";

		$result = $db->query($sql);

		if($db->numRows($result) > 0)
		{
            $scoreboardArray = array();

            while($row = $db->fetchObject($result))
            {
                $scoreboardArray[] = $row;
            }

            return $scoreboardArray;
		}

		return null;
	}
}