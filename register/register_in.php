<?php
header("Content-type: text/html; charset=utf8");
include_once"../php/pdo_function.php";
echo $name=$_POST['username'];
echo $phone=$_POST['phone'];
echo $password=$_POST['password'];
echo $firstname=$_POST['firstname'];
echo $gender=$_POST['gender'];
register($name,$password,$phone,$firstname,$gender);
echo "注册成功";
header("refresh:3;url=../index.html");
print('正在加载，请稍等...三秒后自动跳转~~~');
?>