<?php
$fp = fsockopen("192.168.137.2", 49159, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "HTTP/1.1 200 OK\r\n";
    $out .= "Date: Sun, 20 Jul 2014 07:09:19 GMT\r\n";
    $out .= "Server: Apache/2.4.4 (Win64) PHP/5.4.12\r\n";
	$out .= "X-Powered-By: PHP/5.4.12\r\n";
	$out .= "Content-Length: 0\r\n";
	$out .= "Keep-Alive: timeout=5, max=100\r\n";
	$out .="Connection: Keep-Alive\r\n";
	$out .="Content-Type: text/html\r\n";
	/*$out .="Accept-Language: zh-CN,zh;q=0.8\r\n\r\n";
	$out .="temperature=5";
	$out .="&humidity=5";
	$out .="&MQ138=55";
	$out .="&MQ5=55";*/
    fwrite($fp, $out);
    /*while (!feof($fp)) {
        echo fgets($fp, 128);
    }*/
    fclose($fp);
	echo "ok";
}
?>