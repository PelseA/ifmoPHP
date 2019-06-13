<?php
require_once "Animal.php";

require_once "IMove.php";
require_once "IEat.php";
require_once "IEated.php";

require_once "Mouse.php";
require_once "Cat.php";
require_once "Dog.php";

$dog = new Dog("Тузик");
$cat = new Cat("Барсик");
var_dump($cat);
$cat->move();
$mouse = new Mouse("Мышка");
$mouse->move();
$dog->move();
$cat->eat($mouse);
//$cat->eat($cat); //не сработает т к $cat instanceof Cat
$dog->eat($cat);

var_dump($cat);
//$cat->move(); //больше не получится вызвать так как объект съеден

var_dump($mouse);
