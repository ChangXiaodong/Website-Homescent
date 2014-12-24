<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="./ichart/login.css" type="text/css" />
<link rel="stylesheet" href="./ichart/css/style.css" media="screen" type="text/css" />

<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
$(function(){
   $("#toggleLogin").toggle(function(){
		$("#login").parent("div").animate({ height : 105 } , 520 );
		$("#login").animate({marginTop : 0 } , 500 );
		$(this).blur();
   },function(){
		$("#login").parent("div").animate({ height : 0 } , 500 );
		$("#login").animate({marginTop : -105 } , 520 ); 
		$(this).blur();
   }); 
   document.onclick = function (event)  
        {     
            var e = event || window.event;  
            var elem = e.srcElement||e.target;  
                    
			if(elem.id!='login'&&elem.id!='log'&&elem.id!='pwd'&&elem.id!='rememberme'&&elem.id!='o')  
			{  
					$("#login").parent("div").animate({ height : 0 } , 500 );
					$("#login").animate({marginTop : -105 } , 520 ); 
					return;  
			} 
			elem = elem.parentNode;       
             
        }  
})
</script>

</head>

<body>

	<div style="margin:0px;overflow:hidden;position:relative;height:0px;">
		<div id="login" style="margin:-105px 0px 0px;height:auto;">
			<div class="loginContent">
				<form action="#" method="post">
					<label for="log"><b>用户名: </b></label>
					<input class="field" type="text" name="log" id="log" value="" size="23" />
					<label for="pwd"><b>密码:</b></label>
					<input class="field" type="password" name="pwd" id="pwd" size="23" />
					<input type="submit" name="submit" value="" class="button_login" id='o'/>
					<input type="hidden" name="redirect_to" value="" id='o'/>
				</form>
				<div class="left"><label for="rememberme"><input name="rememberme" id="rememberme" class="rememberme" type="checkbox" checked="checked" value="forever" />保持登录</label></div>
				<div class="right" id='o'>还不会员? <a href="#" id='o'>注册</a> | <a href="#" id='o'>忘记密码?</a></div>
			</div>
		</div> 
	</div> 


    <div id="top">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<li id='o'>您好</li>
			<li>|</li>
			<li><a id="toggleLogin" href="#">登录</a></li>
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
    <a href='onehour.php'>
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
    <a href='../api/more.html'>
      <div class='card bg-04'>
        <span class='card-content'>更多功能</span>
      </div>
    </a>
  </div>
  <div class='card-wrapper'>
    <a href='../abstract.php'>
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
</body>
</html>

<?php


?>