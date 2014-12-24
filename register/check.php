<?php
header("Content-type: text/html; charset=utf-8");
include_once'../php/pdo_function.php';
$name=$_GET['name'];
$rowsNumber = namecheck($name);
if($rowsNumber=='')
{
	echo 1;
}
else{
	echo 0;
}
?>
