<?php
include_once"pdo_function.php";

for($i=0;$i<50;$i++)
pdo_insert_sensor('xiaoxiami',rand(20,30),rand(50,80),rand(10,90),rand(30,100));
echo 'ok';
?>