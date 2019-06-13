<?php
require_once "IEated.php";
require_once "Animal.php";
class Mouse extends Animal implements IEated
{
    public function move(){
        echo get_class($this) . " ". $this->getName(). " убегает<br>";
    }
    public function beFood()
    {
        echo "Мышка ". $this->getName() . " была съедена <br>";

    }


}