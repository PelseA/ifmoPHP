<?php
require_once "IMove.php";
abstract class Animal implements IMove
{
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }

    public function move()
    {
        echo get_class($this) . " ". $this->getName(). " бежит<br>";
    }

}