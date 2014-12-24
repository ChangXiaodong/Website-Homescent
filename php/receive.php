<?php
include_once"pdo_function.php";
include_once"file.php";
/*
$date =time();
$date = date("G_i_s",$date + 3600 * 8);//东8区时间

$name = 'data.txt';
$file = new file($name);
//if($_POST){

$temperature = $_POST['temperature'];
$file->WriteChar($temperature);
$humidity = $_POST['humidity'];
$file->WriteChar($humidity);
$MQ138 = $_POST['MQ138'];
$file->WriteChar($MQ138);
$MQ5 = $_POST['MQ5'];
$file->WriteChar($MQ5);*/



//pdo_insert_sensor($realname,$highpressure,$lowpressure,$heart_beat,$weight);
$temperature = $_POST['temperature'];
$humidity = $_POST['humidity'];
$MQ138 = $_POST['MQ138'];
$MQ5 = $_POST['MQ5'];
$name = $_POST['name'];
pdo_insert_sensor($name,$temperature,$humidity,$MQ138,$MQ5);
?>