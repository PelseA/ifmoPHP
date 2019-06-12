<?php
//1. Создать классы Dog, Cat и Mouse.
//2. Реализовать интерфейсы в добавленных классах, учитывая что:
//Кот(Cat) может передвигаться, может кого-то съесть и может быть сам съеден.
//Мышь(Mouse) может передвигаться и может быть съедена.
//Собака(Dog) может передвигаться и съесть кого-то.
require_once "Animal.php";
class Dog extends Animal implements IEat
{
    public function eat(IEated $animal)
    {
        echo "Собака ". $this->getName() . " съела " .get_class($animal). " по имени " . $animal->getName(). "<br>";
        $animal->beFood();
        //$animal->__destruct();
    }


}