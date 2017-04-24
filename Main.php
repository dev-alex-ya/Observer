<?php
require_once 'Event.php';
require_once 'Observable.php';

$timezone = 180;
$timestamp = mktime(11, 43, 0, 4, 24, 2017);//время в вашей временной зоне

$dateTimeUTC = new DateTime("@".$timestamp);//переходим к UTC


$observable = new Observable();
$observable->setDateTime($dateTimeUTC);


$subject_1 = new Subject($observable);
$subject_1->setTime('07:15');
$subject_1->setMessage('Пора на работу');
$subject_1->setTimezone($timezone);
$subject_1->setDaysOfWeek(0b1111100); //пн,вт,ср,чт,пт

$subject_2 = new Subject($observable);
$subject_2->setTime('18:35');
$subject_2->setMessage('Пора в кино!');
$subject_2->setTimezone($timezone);
$subject_2->setDaysOfWeek(0b0000011); //сб,вс

$subject_3 = new Subject($observable);
$subject_3->setTime('18:35');
$subject_3->setMessage('Сегодня треннировка!');
$subject_3->setTimezone($timezone);
$subject_3->setDaysOfWeek(0b1010100); //пн,ср,пт

$observable->notify();
