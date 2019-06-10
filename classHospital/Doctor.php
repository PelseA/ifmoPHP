<?php

require_once "HeadDoctor.php";

class Doctor extends HeadDoctor
{
    public function checkPatient(Patient $patient)
    {
        if(!($patient->makeAppointment($this))){
            echo "Это не ваш пациент";
        }
        echo "<br> Врач ". $this->getName(). " осматривает пациента ".$patient->getName()."<br>";
    }

}