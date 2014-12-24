<?php
//include_once"../php/pdo_function.php";
$start_time=$_GET['start_time'];
$end_time=$_GET['end_time'];
$type=$_GET['type'];
$dbh  = new  PDO ("mysql:host=localhost;dbname=values",'root','' );
$value ='';
$res = $dbh->query("SELECT $type FROM userdata where date between \"$start_time\" AND \"$end_time\"",PDO::FETCH_ASSOC);
foreach ($res as $row) {
		foreach ($row as $a){
			$value .= $a.';';
			
		}
		//print_r ( $row );
		//echo "<br>";
		//return $row['ecg'];
	}
	echo $value;
?>