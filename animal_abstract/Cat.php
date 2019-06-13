<?php
require_once "Animal.php";
require_once "IEated.php";
require_once "IEat.php";

class Cat extends Animal implements IEated, IEat
{
    public function eat(IEated &$animal)
    {
        if(!($animal instanceof Cat) && isset($animal) ) {
            echo "Кот " . $this->getName() . " съел ".get_class($animal). " по имени " . $animal->getName(). "<br>";
            $animal->beFood();
            $animal = null;
        }
    }
    public function beFood()
    {
        echo "Кот ". $this->getName() . " был съеден <br>";

//        foreach($GLOBALS as $key => $value) {
//            if ($value === $this) {
//                $GLOBALS[$key] = null;
//                return;
//            }
//        }
    }

}