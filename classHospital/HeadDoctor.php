<?php
//написать классы больницы. Создайте больницу, в которой будет главный врач
//- он сможет просмотреть всех пациентов , лечащие врачи (например, хирург, терапевт, лор)
//- они могут просмотреть только своих пациентов.
//И самих пациентов, которые будут записываться на приём к определённому врачу
//на определённое время.
class HeadDoctor
{
    private $name = null;
    private $orientation = null;//какой врач: зубной, лор...
    private $hospitalName = null;

    public function getName()
    {
        return $this->name;
    }
    public function setName(string $name)
    {
        if(strlen($name) < 4){
            echo "Имя врача не короче 4 символов";//пример "Те А.В."
            return;
        }
        $this->name = $name;
    }

    public function getHospitalName()
    {
        return $this->hospitalName;
    }

    public function setHospitalName(string $hospitalName)
    {
        if(!($hospitalName instanceof Hospital)){
            echo "Такой лечебницы нет";
        }
        if(strlen($hospitalName)<8){
            echo "название лечебницы не менее 8 символов";
            return;
        }
        $this->hospitalName = $hospitalName;
    }

    public function getOrientation()
    {
        return $this->orientation;
    }

    public function setOrientation(string $orientation)
    {
        if(strlen($orientation)<3){
            echo "Направление врача не менее 3 символов, например 'лор'";
            return;
        }
        $this->orientation = $orientation;
    }

    public function checkPatient(Patient $patient){
        echo "Главный врач ". $this->getName(). " осматривает пациента ".$patient->getName()."<br>";
    }


}