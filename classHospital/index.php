<?php
require_once "HeadDoctor.php";
require_once "Doctor.php";
require_once "Hospital.php";
require_once "Patient.php";
//require_once "Request.php";//не смогла применить класс как хотела
$hospital = new Hospital();
$hospital->setName("Лечебница 'Новый век'");
var_dump($hospital);
$hospital_title = $hospital->getName();
var_dump($hospital_title);
$headDoctor = new HeadDoctor();
$headDoctor->setHospitalName($hospital_title);
$headDoctor->setName("Брагин В.П.");
$headDoctor->setOrientation('терапевт');
var_dump("Создан объект 'Главный врач'<br> ");
var_dump($headDoctor);
$headDoctor->setName("Прагин В.П.");
var_dump("Изменили имя 'Главного врача'<br> ");
var_dump($headDoctor);

$hospital = new Hospital();
var_dump("<br>Название госпиталя: ".$headDoctor->getHospitalName()."<br>");

$lor = new Doctor();
$lor->setHospitalName($hospital_title);
$lor->setName("Марков А.Р.");
$lor->setOrientation("лор");
var_dump("Наш лор ". $lor->getName()."<br>");

$ortoped = new Doctor();
$ortoped->setHospitalName($hospital_title);
$ortoped->setName("Явила П.Л.");
$ortoped->setOrientation("ортопед");
var_dump("Наш ортопед ". $ortoped->getName()."<br>");
//$ortoped->checkPatient($patient1); //выдаст ошибку так как пациент еще не записался к нему на прием

$patient1 = new Patient();
$patient1->setName("Бурайкина Тамара Григорьевна");
var_dump("Зарегистрировался пациент ". $patient1->getName());

$patient1->makeAppointment($lor);
$patient1->makeAppointment($ortoped);
$lor->checkPatient($patient1);
$ortoped->checkPatient($patient1);
$headDoctor->checkPatient($patient1);




