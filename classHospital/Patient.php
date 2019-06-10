<?php
class Patient
{
    private $name = null;

    public function getName()
    {
        return $this->name;
    }
    public function setName(string $name)
    {
        if(strlen($name)<4){
            echo "Имя пациента не менее 4 символов";
            return;
        }
        $this->name = $name;
    }
    public function makeAppointment(Doctor $doctor)
    {
        $this->choose_date();
        $this->get_ticket($doctor);
        return true;
    }

    protected function choose_date()
    {
        //тут правильно применять 'require_once'   с '_once'??
        require_once "php/appointment.php";
        return true;
    }
    protected function get_ticket($doctor)
    {
        echo "Вы записались на прием к доктору ". $doctor->getName() . " <br>";
        require_once "php/appointment.php";
        $post = $_POST;
        echo "Пациент: ".$post['patient']. "<br>";
        echo "Дата: ".$post['date']. "<br>";
        echo "Время: ". $post['time']. "<br>";
    }

}