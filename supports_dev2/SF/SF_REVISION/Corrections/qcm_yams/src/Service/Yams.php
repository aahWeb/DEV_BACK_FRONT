<?php

namespace App\Service;

class Yams{

    public function isYams(array $dices){

    }

    public function isSquare(array $dices){
        
    }

    public function isBigSuite(array $dices){
        
    }

    public function playDice(){

        return [
            $this->die(),
            $this->die(),
            $this->die(),
            $this->die(),
            $this->die(),
        ];
    }

    public function die(){

        return random_int(1, 6);
    }
}