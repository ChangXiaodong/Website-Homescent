<?php

$servername = "127.0.0.1";
$mysqlname = "root";
$mysqlpsw = "";	
$login_database="user";
$datavalue_database = "values";//���ݴ�����
$firstname = '';
/*
*Name;login_check
*Input:	$name:�û���  $psw:����
*Output:Success  1,False 0
*Method:�����ݿ������½�Ƿ�Ϸ�
*/
function login_check($name,$psw){
	global $servername;
	global $mysqlname;
	global $mysqlpsw;
	global $login_database;
	global $firstname;
	try{
		$dbh  = new  PDO ("mysql:host=127.0.0.1;dbname=$login_database",$mysqlname,$mysqlpsw );
	} 
	catch ( PDOException $e ) {
		print  "Error!: ".$e->getMessage ()."<br/>" ;
		die();
	}
	$stmt  =  $dbh -> prepare ( "SELECT password,firstname FROM login where name LIKE '$name'" );
	$stmt -> execute ();
	$rowsNumber = $stmt->fetchColumn();//�洢�û���Ϊ$name������
	
	foreach($stmt as $row){
		 
	
	$rowsNumber=$row['password'];
	if($rowsNumber == $psw){
		$firstname = $row['firstname'];
		return 1;
	}
	else{
		
		return 0;
	}
	}
}
function namecheck($name){
		global $servername;
		global $mysqlname;
		global $mysqlpsw;
		global $login_database;
		global $datavalue_database;
		try{
			$dbh  = new  PDO ("mysql:host=127.0.0.1;dbname=$login_database",$mysqlname,$mysqlpsw );
			$dbh->query("SET NAMES utf8");
		} 
		catch ( PDOException $e ) {
			print  "Error!: ".$e->getMessage ()."<br/>" ;
			die();
		}
		$stmt  =  $dbh -> prepare ( "SELECT name FROM login where name LIKE '$name'" );
		$stmt -> execute ();
		$rowsNumber = $stmt->fetchColumn();//�洢�û���Ϊ$name������
		return  $rowsNumber;
		/*if($rowsNumber == $psw){
			
			return 1;
		}
		else{
			
			return 0;
		}*/
}
function register($name,$psw,$phone,$firstname,$gender){
		global $servername;
		global $mysqlname;
		global $mysqlpsw;
		global $login_database;
		global $datavalue_database;
		try {
		$dbh  = new  PDO ("mysql:host=127.0.0.1;dbname=$login_database",$mysqlname,$mysqlpsw );
		$dbh->query("SET NAMES utf8");
		} 
		catch ( PDOException $e ) {
			print  "Error!: "  .  $e -> getMessage () .  "<br/>" ;
			die();
		}
		$date =time();
		$date = date("Y-m-d H:i:s ",$date + 3600 * 8);//��8��ʱ��
		$stmt  =  $dbh -> prepare ( "INSERT INTO login (name,date,password,phone,gender,firstname) VALUES (:name,:date,:password,:phone,:gender,:firstname)" );

		$stmt -> bindParam ( ':name' ,  $name );
		$stmt -> bindParam ( ':date' ,  $date);
		$stmt -> bindParam ( ':password' ,  $psw );
		$stmt -> bindParam ( ':phone' ,  $phone );
		$stmt -> bindParam ( ':gender' ,  $gender );
		$stmt -> bindParam ( ':firstname' ,  $firstname );

		$stmt -> execute ();//ִ�в���
}
/*
*Name;pdo_insert_sensor
*Input:	$name:�û���  $value1:ֵ1	$value2:ֵ2		$value3:ֵ3
*Output:NONE
*Method:�Ѵ��������ݺ��û�����ʱ��д�����ݿ�
*/
function pdo_insert_sensor($name,$tem,$humidity,$MQ138,$MQ5){
		global $servername;
		global $mysqlname;
		global $mysqlpsw;
		global $login_database;
		global $datavalue_database;
		try {
		$dbh  = new  PDO ("mysql:host=127.0.0.1;dbname=$datavalue_database",$mysqlname,$mysqlpsw );
		} 
		catch ( PDOException $e ) {
			print  "Error!: "  .  $e -> getMessage () .  "<br/>" ;
			die();
		}
		$date =time();
		$date = date("Y-m-d H:i:s ",$date + 3600 * 8);//��8��ʱ��
		$stmt  =  $dbh -> prepare ( "INSERT INTO userdata (username,date,temperature,humidity,MQ138,MQ5) VALUES (:username,:date,:temperature,:humidity,:MQ138,:MQ5)" );

		$stmt -> bindParam ( ':username' ,  $name );
		$stmt -> bindParam ( ':date' ,  $date);
		$stmt -> bindParam ( ':temperature' ,  $tem );
		$stmt -> bindParam ( ':humidity' ,  $humidity );
		$stmt -> bindParam ( ':MQ138' ,  $MQ138 );
		$stmt -> bindParam ( ':MQ5' ,  $MQ5 );

		$stmt -> execute ();//ִ�в���
	}
/*
*Name;pdo_read_sensor
*Input:	$start_time:��ʼʱ�� $end_time:��ֹʱ��  $type:����������
*Output:Success  1,False 0
*Method:�����ݿ��ж�ȡ��Ӧ����
*/
function pdo_read_sensor($start_time,$end_time){	
		global $servername;
		global $mysqlname;
		global $mysqlpsw;
		global $login_database;
		global $datavalue_database;
		$dbh  = new  PDO ("mysql:host=127.0.0.1;dbname=values",$mysqlname,$mysqlpsw );
		return $res = $dbh->query("SELECT temperature,humidity,MQ138,MQ5,date FROM userdata where date between \"$start_time\" AND \"$end_time\"",PDO::FETCH_ASSOC);
	}

	
function insert_missinfo($sendname,$toname,$action){
		global $servername;
		global $mysqlname;
		global $mysqlpsw;
		global $login_database;
		global $datavalue_database;
		$finished = 0;
		try {
		$dbh  = new  PDO ("mysql:host=127.0.0.1;dbname=miss",$mysqlname,$mysqlpsw );
		} 
		catch ( PDOException $e ) {
			print  "Error!: "  .  $e -> getMessage () .  "<br/>" ;
			die();
		}
		$date =time();
		$date = date("Y-m-d H:i:s ",$date + 3600 * 8);//��8��ʱ��
		$stmt  =  $dbh -> prepare ( "INSERT INTO info (sendname,toname,finished,date,action) VALUES (:sendname,:toname,:finished,:date,:action)" );

		$stmt -> bindParam ( ':sendname' ,$sendname );
		$stmt -> bindParam ( ':toname' ,$toname);
		$stmt -> bindParam ( ':finished' ,$finished );
		$stmt -> bindParam ( ':date' ,$date );
		$stmt -> bindParam ( ':action' ,$action );

		$stmt -> execute ();//ִ�в���
}
function update_missinfo(){
	$date =time();
	$end_time = date("Y-m-d H:i:s",$date + 3600 * 8);
	$enddatevalue=substr($end_time,0,10);
	$endtimevalue = date("H:i",$date + 3600 * 8);

	$starttime = date("H:i:s",$date + 3600 * 8-3600*24);
	$startdate = date("Y-m-d",$date + 3600 * 8-3600*24);
	$start_time = $startdate." ".$starttime;
	$startdatevalue=$startdate;
	$starttimevalue = date("H:i",$date + 3600 * 8-3600*24);
	$dbh = new  PDO ("mysql:host=127.0.0.1;dbname=miss",'root','');
	$res = $dbh->query("SELECT action FROM info where finished=0 AND date between \"$start_time\" AND \"$end_time\"",PDO::FETCH_ASSOC);
	$result_arr = $res->fetchAll();
	foreach ($result_arr as $r){  
		foreach($r as $v){
			//$res = $dbh->query("UPDATE `info` SET `finished`=1 WHERE `id`=\"$v\"");  
			$action = $v;
		}	
	}
	if(empty($result_arr))
	{
		return 'kong';
	}
	else
	{
		$res = $dbh->query("SELECT id FROM info where finished=0 AND date between \"$start_time\" AND \"$end_time\"",PDO::FETCH_ASSOC);
		$result_arr = $res->fetchAll();
		foreach ($result_arr as $r){  
			foreach($r as $v){
				$res = $dbh->query("UPDATE `info` SET `finished`=1 WHERE `id`=\"$v\"");  
			}	
		}
		return 'miss'.$action;
	}
	

}
?>