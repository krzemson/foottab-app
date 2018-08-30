<?php

namespace TableFootball;

class Player
{
    
    public $players_count;
    
    public $players = [];

    public $database;

    private $number;

    public function __construct()
    {
        $this->database = new Database();

        if ($row = $this->checkSeason()) {
            $this->number = $row + 1;
        } else {
            $this->number = 1;
        }
    }

    /**
     * @param $playersNames
     * @return array
     */
    public function addPlayers($playersNames)
    {
        
        for ($i = 1; $i <=$this->players_count; $i++) {
                $this->players[] = $_POST["$playersNames$i"];
        }

        $this->newSeason($this->number);

        $this->save($this->players, $this->number);

        return $this->players;
    }

    /**
     * @param $count
     */
    public function setPlayersCount($count)
    {
        $this->players_count = $count;
        
        unset($count);
    }

    /**
     * @return mixed
     */
    private function checkSeason()
    {
        $sql = "SELECT MAX(season) AS last FROM seasons";

        $result = $this->database->query($sql);

        $row = $result->fetch_assoc();

        return $row['last'];
    }

    /**
     * @param $number
     * @return bool
     */
    private function newSeason($number)
    {
        $sql = "CREATE TABLE `season$number` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
                  `points` int(11) NOT NULL,
                    PRIMARY KEY(id)
                )";

        $sql2 = "INSERT INTO seasons(season) VALUES ($number)";

        $this->database->query($sql);
        $this->database->query($sql2);

        return true;
    }

    /**
     * @param $players
     * @param $number
     * @return bool
     */
    private function save($players, $number)
    {
        foreach ($players as $player) {
            $sql = "INSERT INTO season$number (name, points) VALUES ('$player',0)";

            $this->database->query($sql);

        }

        return true;
    }

    /**
     * @param $name
     * @return bool
     */
    private function update($name)
    {
        $number = $this->number - 1;

        $sql = "UPDATE season$number SET points = points + 1 WHERE name = '$name'";

        $this->database->query($sql);

        return true;
    }

    /**
     * @param $quantity
     * @param $pairs2
     * @return bool
     */
    public function addScore($quantity, $pairs2)
    {
        for ($i=0; $i<$quantity; $i++) {
            if ($_POST["score$i"] == 1) {
                $this->update($pairs2[$i][0]);
                $this->update($pairs2[$i][1]);
            } elseif ($_POST["score$i"] == 2) {
                $this->update($pairs2[$i][2]);
                $this->update($pairs2[$i][3]);
            }
        }
        return true;
    }

    /**
     * @return mixed
     */
    public function showTable()
    {
        $number = $this->number - 1;

        $sql = "SELECT * FROM season$number ORDER BY points DESC";

        $result = $this->database->query($sql);

        $row = $result->fetch_all(MYSQLI_ASSOC);

        return $row;
    }
}
