<?php
require_once "Animal.php";
require_once "IEated.php";
require_once "IEat.php";

class Cat extends Animal implements IEated, IEat
{
    public function eat(IEated $animal)
    {
        if($animal !== $this) {
            echo "Кот " . $this->getName() . " съел ".get_class($animal). " по имени " . $animal->getName(). "<br>";
            $animal->beFood();
        }else{
            echo "Кот не может съесть сам себя<br>";
        }
    }
    public function beFood()
    {
        echo "Кот ". $this->getName() . " был съеден <br>";
        unset($this);
    }
//    public function __destruct()
//    {
//        echo "уничтожен";
//    }
}