<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="../ichart/css/login.css" type="text/css" />
<link rel="stylesheet" href="../ichart/css/style.css" media="screen" type="text/css" />
<script type="text/javascript" src="../ichart/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
var name;
var cookie_name;
cookie_name=getCookie('username');
	
$(function(){
   $("#toggleLogin").toggle(function(){
		$("#login").parent("div").animate({ height : 65 } , 520 );
		$("#login").animate({marginTop : 0 } , 500 );
		$(this).blur();
   },function(){
		$("#login").parent("div").animate({ height : 0 } , 500 );
		$("#login").animate({marginTop : -65 } , 520 ); 
		$(this).blur();
   }); 
   document.onclick = function (event)  
        {     
            var e = event || window.event;  
            var elem = e.srcElement||e.target;  
                    
			if(elem.id!='login'&&elem.id!='log'&&elem.id!='pwd'&&elem.id!='rememberme'&&elem.id!='o')  
			{  
					$("#login").parent("div").animate({ height : 0 } , 500 );
					$("#login").animate({marginTop : -65 } , 520 ); 
					return;  
			} 
			elem = elem.parentNode;       
             
        } 
		if(cookie_name!='')
			document.getElementById('toggleLogin').innerHTML = cookie_name;
})
function getCookie(c_name){
　　　　if (document.cookie.length>0){　　//先查询cookie是否为空，为空就return ""
　　　　　　c_start=document.cookie.indexOf(c_name + "=")　　//通过String对象的indexOf()来检查这个cookie是否存在，不存在就为 -1　　
　　　　　　if (c_start!=-1){ 
　　　　　　　　c_start=c_start + c_name.length+1　　//最后这个+1其实就是表示"="号啦，这样就获取到了cookie值的开始位置
　　　　　　　　c_end=document.cookie.indexOf(";",c_start)　　//其实我刚看见indexOf()第二个参数的时候猛然有点晕，后来想起来表示指定的开始索引的位置...这句是为了得到值的结束位置。因为需要考虑是否是最后一项，所以通过";"号是否存在来判断
　　　　　　　　if (c_end==-1) c_end=document.cookie.length　　
　　　　　　　　return unescape(document.cookie.substring(c_start,c_end))　　//通过substring()得到了值。想了解unescape()得先知道escape()是做什么的，都是很重要的基础，想了解的可以搜索下，在文章结尾处也会进行讲解cookie编码细节
　　　　　　} 
　　　　}
　　　　return ""
}　
function A_xmlhttprequest() {
	if(window.ActiveXObject) {
		xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
	} else if(window.XMLHttpRequest) {
		xmlHttp = new XMLHttpRequest();
	}
}
function login_check() {
	A_xmlhttprequest();
    name = document.getElementById('log').value;
	var password = document.getElementById('pwd').value;
	xmlHttp.open("GET","../register/login.php?username="+name+"&password="+password,true);
	xmlHttp.onreadystatechange = receive_op;
	xmlHttp.send(null);
	return false;
}
function receive_op() {
	var reveive =  xmlHttp.responseText;
	document.getElementById('toggleLogin').innerHTML = reveive;
	if(reveive[0]!='登')
	{
		document.cookie="username="+reveive+";expires="+0;
		//document.cookie="loginname="+name+";expires="+0;
		window.location.href="./more.php";
	} 
	return 1;
}
function bluehover(){
	document.getElementById('content').style.backgroundColor= '#4186b2';
	document.getElementById('input').style.backgroundColor= '#4186b2';
}
function redhover(){
	document.getElementById('content').style.backgroundColor= '#eb6e61';
	document.getElementById('input').style.backgroundColor= '#eb6e61';
}
function misshome() {
	if(cookie_name==''){
		alert("请先登录");
		return false;
	}
	else{
		A_xmlhttprequest();
		xmlHttp.open("GET","./setmiss.php?toname=you&sendname="+cookie_name+"&action=5",true);
		alert("信息已发送~");
		xmlHttp.send(null);
		return true;
	}
}
function missyou() {
	if(cookie_name==''){
		alert("请先登录");
		return false;
	}
	else{
		A_xmlhttprequest();
		xmlHttp.open("GET","./setmiss.php?toname=you&sendname="+cookie_name+"&action=6",true);
		alert("她已收到你的思念");
		xmlHttp.send(null);
		return true;
	}
}
function send_test(){
var obj=document.getElementsByName('scenttype');
	for(i=0;i<obj.length;i++){
		if(obj[i].checked)
		{
			var action = obj[i].value;
		}
	}
	if(cookie_name==''){
		alert("请先登录");
		return false;
	}
	else{
		A_xmlhttprequest();
		xmlHttp.open("GET","./setmiss.php?toname=you&sendname="+cookie_name+"&action="+action,true);
		alert("信息已发送~");
		xmlHttp.send(null);
		return true;
	}
}
function showtime(){
	document.getElementById('scent').style.display=none;
}

</script>
<body>
	<div style="margin:0px;overflow:hidden;position:relative;height:0px;">
		<div id="login" style="margin-top:0px;height:70px; ">
			<div class="loginContent" style="margin-top:-10px;">
				<form action="#" method="post">
					<label for="log"><b>用户名: </b></label>
					<input class="field" type="text" name="log" id="log" value="" size="23" />
					<label for="pwd"><b>密码:</b></label>
					<input class="field" type="password" name="pwd" id="pwd" size="23" />
					<input type="button" name="submit" value="" class="button_login" id='o' onclick="login_check();"/>
					<input type="hidden" name="redirect_to" value="" id='o'/>
				</form>
				<div class="left"><label for="rememberme"><input name="rememberme" id="rememberme" class="rememberme" type="checkbox" checked="checked" value="forever" />保持登录</label></div>
				<div class="right" id='o'>还不会员? <a href="../register/register.html" id='o'>注册</a> | <a href="#" id='o'>忘记密码?</a></div>
			</div>
		</div> 
	</div> 

   <div id="top">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<li id='o'>您好</li>
			<li>|</li>
			<li><a id="toggleLogin" href=''>登录</a></li>
		</ul>
	</div>
	<div class='card-holder'>
	  <font face=黑体>
  <div class='card-wrapper'>
    <a href='../index.html'>
      <div class='card bg-01'>
        <span class='card-content'>主页</span>
      </div>
    </a>
  </div>
  <div class='card-wrapper'>
    <a href='../ichart/onehour.php'>
      <div class='card bg-02'>
        <span class='card-content'>数据查看</span>
      </div>
    </a>
  </div>
  <div class='card-wrapper'>
    <a href='../dynamic/dynamic.php'>
      <div class='card bg-03'>
        <span class='card-content'>动态数据</span>
      </div>
    </a>
  </div>
  <div class='card-wrapper'>
    <a href='../more/more.php'>
      <div class='card bg-04'>
        <span class='card-content'>更多功能</span>
      </div>
    </a>
  </div>
  <div class='card-wrapper'>
    <a href='../abstract/abstract.php'>
      <div class='card bg-05'>
        <span class='card-content'>产品简介</span>
      </div>
    </a>
  </div>
  <div class='card-wrapper'>
    <a href='../about.php'>
      <div class='card bg-06'>
        <span class='card-content'>关于我们</span>
      </div>
    </a>
  </div>
  </font>
</div>

<link rel="stylesheet" href="stylesheets/screen.css" type="text/css" media="screen" title="no title" >
<div class="ph-post1-wrapper">
		<h1></h1>
		<a class="button" data-title="想家了" href="" onmouseover='bluehover();' onclick="misshome();">
			<span><span >Father And Mother I Love You</span></span>
		</a>
		<a class="button button1" data-title="想她了" href="" onmouseover='redhover();' onclick="missyou();">
			<span><span >Missing You</span></span>
		</a>
		<a class="button button2" data-title="功能演示" href="" onclick="showtime();">
			<span><span >Show Time</span></span>
		</a>
		
</div>
<link rel="stylesheet" href="stylesheets/styles.css">
<div id='content'>
		<section>
			<div>
				<input class='input' id='input' type='text' value='你在忙吗？我好想你~'>
			</div>
		</section>
</div>
	
<div class='scenttype' id='scent'>
<input type='radio' name='scenttype' value='1' checked>过生日
<input type='radio' name='scenttype' value='2'>儿童节
<input type='radio' name='scenttype' value='3'>早餐时间
<input type='radio' name='scenttype' value='4'>空气极好
<input type='radio' name='scenttype' value='5'>家的呼唤
<input type='radio' name='scenttype' value='6'>心情不好
<input type='radio' name='scenttype' value='7'>马上要下雨
<input type='radio' name='scenttype' value='8'>睡觉时间
<input type='button' value="Start" class='button4' onclick="send_test();">
</div>
	
</body>

