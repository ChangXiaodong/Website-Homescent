<?php
include_once'../php/pdo_function.php';
$rowsNumber = '';
if(!empty($_GET['username'])){
	
	$name = $_GET['username'];
	$pwd = $_GET['password'];
	try{
		$dbh  = new  PDO ("mysql:host=127.0.0.1;dbname=$login_database",$mysqlname,$mysqlpsw );
	} 
	catch ( PDOException $e ) {
		print  "Error!: ".$e->getMessage ()."<br/>" ;
		die();
	}
	$stmt  =  $dbh -> prepare ( "SELECT password,name FROM login where name LIKE '$name'" );
	$stmt -> execute ();
	//$rowsNumber = $stmt->fetchColumn();//存储用户名为$name的密码
	
	foreach($stmt as $row){
		 $rowsNumber=$row['password'];
		 $firstname = $row['name'];

	}
	if($rowsNumber==$pwd){
		echo $firstname;
	}
	else{
		echo "登录失败";
	}
}
	

?>

