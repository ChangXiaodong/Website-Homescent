<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include_once"API.php";
$post = new API_POST();
$tpl_temp = urlencode("#highpressure#=$highpressure&#lowpressure#=$lowpressure&#heart#=$heart");
$post->request('http://v.juhe.cn/sms/send',"key=cc0d7238ff63e5c51894fb505f2cbdbd&dtype=json&mobile=$phone&tpl_id=258&tpl_value=$tpl_temp");
/*$a=$post->request('http://web.juhe.cn:8080/environment/air/cityair','key=76065f76afdef941969faa44c5ac9980&dtype=json&city=beijing');
$data=json_decode($a);
foreach($data as $row){
	print_r($row);
}*/
?>