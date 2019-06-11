<?php
//написать классы больницы. Создайте больницу, в которой будет главный врач
//- он сможет просмотреть всех пациентов , лечащие врачи (например, хирург, терапевт, лор)
//- они могут просмотреть только своих пациентов.
//И самих пациентов, которые будут записываться на приём к определённому врачу
//на определённое время.

//этот класс будет врачей хранить и пациентов

class Hospital
{
    private $name;
    private $patients = [];

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        if(strlen($name)<8){
            echo "название лечебницы должно быть не менее 8 символов";
            return;
        }
        $this->name = $name;
    }

    public function addPatient(Patient $patient){
        if($patient->getHospitalName() != $this->getName()) {
            echo "Этот пациент не регистрировался в данной лечебнице";
        }
        array_push($this->patients, $patient);
    }

    public function getPatients(){
        var_dump($this->patients);
        return $this->patients;
    }
    public function getDoctors(){

    }
}