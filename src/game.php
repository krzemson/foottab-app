<?php

namespace TableFootball;

class Game
{
    private $combination = [];
    private $pairs = [];
    public $pairs2 = [];

    /**
     * @param $players
     * @return array
     */
    public function shufflePlayers($players)
    {

        for ($i = 0; $i< sizeof($players); $i++) {
            for ($n = $i; $n<sizeof($players); $n++) {
                if ($players[$i] != $players[$n]) {
                    $this->combination[] = [$players[$i],$players[$n]];
                }
            }
        }

        return $this->combination;
    }

    /**
     * @param $table
     * @return bool
     */
    private function checkIfTheSame($table)
    {
        if ($table[0][0] != $table[1][0]
            & $table[0][0] != $table[1][1]
            & $table[0][1] != $table[1][0]
            & $table[0][1] != $table[1][1]) {
            return true;
        }

        return false;
    }

    /**
     * @param $table
     * @return bool
     */
    private function checkIfTheSame4($table)
    {
        if ($table[0][0] != $table[1][0]
            & $table[0][0] != $table[1][1]
            & $table[0][1]  != $table[1][0]
            & $table[0][1]  != $table[1][1]
            & $table[0][0] != $table[2][0]
            & $table[0][0] != $table[2][1]
            & $table[0][1]  != $table[2][0]
            & $table[0][1]  != $table[2][1]
            & $table[0][0] != $table[3][0]
            & $table[0][0] != $table[3][1]
            & $table[0][1]  != $table[3][0]
            & $table[0][1]  != $table[3][1]) {
            return true;
        }

        return false;
    }

    /**
     * @param $combination
     * @param $players
     * @return bool
     */
    public function shufflePairs($combination, $players)
    {


        while (!empty($combination)) {
              shuffle($combination);

            if ($this->checkifthesame($combination)) {
                $this->pairs[] = array_shift($combination);
                $this->pairs[] = array_shift($combination);
            }

            if (empty($combination)) {
                break;
            }

            if (sizeof($players) > 4) {
                if (sizeof($combination) == 2 & !$this->checkifthesame($combination)) {
                    $combination[] = array_shift($this->pairs);
                    $combination[] = array_shift($this->pairs);
                } elseif (sizeof($combination) == 4) {
                    if (!$this->checkifthesame4($combination)) {
                        $combination[] = array_shift($this->pairs);
                        $combination[] = array_shift($this->pairs);
                    }
                }
            }


        }

        while (!empty($this->pairs)) {
            $this->pairs2[] = array_merge(array_shift($this->pairs), array_shift($this->pairs));
        }
         return true;
    }
}
