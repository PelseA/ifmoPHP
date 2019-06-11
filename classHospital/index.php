<?php
require_once "HeadDoctor.php";
require_once "Doctor.php";
require_once "Hospital.php";
require_once "Patient.php";
//require_once "Request.php";//не смогла применить класс как хотела
$hospital = new Hospital();
$hospital->setName("Лечебница 'Новый век'");
var_dump($hospital);

$headDoctor = new HeadDoctor($hospital);
$headDoctor->setName("Брагин В.П.");
$headDoctor->setOrientation('терапевт');
var_dump("Создан объект 'Главный врач'<br> ");
var_dump($headDoctor);
$headDoctor->setName("Прагин В.П.");
var_dump("Изменили имя 'Главного врача'<br> ");
var_dump($headDoctor);

$hospital = new Hospital();
var_dump("<br>Название госпиталя: ".$headDoctor->getHospitalName()."<br>");

$lor = new Doctor($hospital);
$lor->setName("Марков А.Р.");
$lor->setOrientation("лор");
var_dump("Наш лор ". $lor->getName()."<br>");

$ortoped = new Doctor($hospital);
$ortoped->setName("Явила П.Л.");
$ortoped->setOrientation("ортопед");
var_dump("Наш ортопед ". $ortoped->getName()."<br>");
//$ortoped->checkPatient($patient1); //выдаст ошибку так как пациент еще не записался к нему на прием

$patient1 = new Patient($hospital);
$patient1->setName("Бурайкина Тамара Григорьевна");
var_dump("Зарегистрировался пациент ". $patient1->getName());
var_dump("Данные о пациенте: <br>");
var_dump($patient1);
//запишем пациента в массив госпиталя
$hospital->addPatient($patient1);
var_dump("пациенты клиники: <br>");
$hospital->getPatients();

$patient1->makeAppointment($lor);
$patient1->makeAppointment($ortoped);
$lor->checkPatient($patient1);
$ortoped->checkPatient($patient1);
$headDoctor->checkPatient($patient1);




