<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class TangeninePlayers
 * @package Hackathon\PlayerIA
 * @author Augustin Abelé
 */
class TangeninePlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    private function getKillerChoice($choice) {
        switch ($choice) {
            case 'scissors':
                return 'rock';
            case 'paper':
                return 'scissors';
            case 'rock':
                return 'paper';
        }
    }

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------

        // first round
        if ($this->result->getNbRound() === 0)
        {
            return parent::paperChoice();
        }

        // // win last game
        if ($this->result->getLastScoreFor($this->mySide) === 3)
        {
            return parent::paperChoice();
        }
        else {
            return TangeninePlayer::getKillerChoice($this->result->getLastChoiceFor($this->opponentSide));
        }

        return parent::paperChoice();

    }
};
