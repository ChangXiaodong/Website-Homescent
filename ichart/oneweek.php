<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="css/login.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
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
		window.location.href="./oneweek.php";
	} 
	return 1;
}
</script>
</head>
<body>
	<div style="margin:0px;overflow:hidden;position:relative;height:0px;">
		<div id="login" style="margin-top:0px;height:65px; ">
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
			<li><a id="toggleLogin">登录</a></li>
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
</body>
</html>
<script>
//PHP向JS传参数，需提前声明
var temperature=[],date=[],time=[],data_num,humidity=[];
var MQ138 = ['0'],MQ5=['0'];
var start_datevalue,start_timevalue,end_datevalue,end_timevalue;
</script>

<?php
include_once"../php/pdo_function.php";
$a = 0;
$name='aaa';
@$name=$_COOKIE["username"]; 
//$data->pdo_insert_sensor('xiaoxiami','30','30','30','30');
//$data->pdo_insert_sensor('xiaoxiami','10','60','90','50');
$date =time();
$end_time = date("Y-m-d H:i:s",$date + 3600 * 8);
$enddatevalue=substr($end_time,0,10);
$endtimevalue = date("H:i",$date + 3600 * 8);

$starttime = date("H:i:s",$date + 3600 * 8-3600*24*7);//一周
$startdate = date("Y-m-d",$date + 3600 * 8-3600*24*7);
$start_time = $startdate." ".$starttime;
$startdatevalue=$startdate;
$starttimevalue = date("H:i",$date + 3600 * 8-3600*7);
$dbh = new  PDO ("mysql:host=127.0.0.1;dbname=values",'root','');
$res = $dbh->query("SELECT temperature,humidity,MQ138,MQ5,date FROM userdata where username=\"$name\" AND date between \"$start_time\" AND \"$end_time\"",PDO::FETCH_ASSOC);
$result_arr = $res->fetchAll();
foreach($result_arr as $r){
	//print_r($r);
	$date = substr($r['date'],0,10);
			$date_buf = "\"$date\"";
			echo "<script>date[$a] = $date_buf;</script>";
			
			$time = substr($r['date'],10);
			$date_buf = "\"$time\"";
			echo "<script>time[$a] = $date_buf;</script>";
			if(!empty($r['temperature'])){
				$buffer = $r['temperature'];
				echo "<script>temperature[$a] = $buffer;</script>";
			}
			else
				echo "<script>temperature[$a] = 0;</script>";
			if(!empty($r['humidity'])){
				$buffer = $r['humidity'];
				echo "<script>humidity[$a] = $buffer;</script>";
			}
			else
				echo "<script>humidity[$a] = 0;</script>";
			if(!empty($r['MQ138'])){
				$buffer = $r['MQ138'];
				echo "<script>MQ138[$a] = $buffer;</script>";
			}
			else
				echo "<script>MQ138[$a] = 0;</script>";
			if(!empty($r['MQ5'])){
				$buffer = $r['MQ5'];
				echo "<script>MQ5[$a] = $buffer;</script>";
			}
			else
				echo "<script>MQ5[$a] = 0;</script>";
			$a++;
		}
		//echo "<br>";
		$node_num = $res->rowCount();
		echo "<script>data_num = $node_num;</script>";
?>

<html>
	<!-- STYLES -->

	<link rel="stylesheet" type="text/css" href="slip/stylesheets/reset.css">
	<link rel="stylesheet" type="text/css" href="slip/stylesheets/typography.css">
	<link rel="stylesheet" type="text/css" href="slip/stylesheets/styles.css">
	<link rel="stylesheet" type="text/css" href="slip/stylesheets/github.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">

<!--[if lt IE 7]>  <body class="ie ie6 lte9 lte8 lte7"> <![endif]-->
<!--[if IE 7]>     <body class="ie ie7 lte9 lte8 lte7"> <![endif]-->
<!--[if IE 8]>     <body class="ie ie8 lte9 lte8">      <![endif]-->
<!--[if IE 9]>     <body class="ie ie9 lte9">           <![endif]-->
<!--[if gt IE 9]>  <body class="ie">                    <![endif]-->
<!--[if !IE]><!-->                            <!--<![endif]-->
<div id="wrapper">
	<!-- HEADER ends -->
	<!-- MAIN CONTAINER -->
	<div id="body_wrapper">
		<!-- CONTENT -->
		<!-- CONTENT ends-->
		<section>
			<article>
				<div class='tabs'>
					<ul class='horizontal'>
						<li ><a href="onehour.php">一小时</a></li>
						<li><a href="threehour.php" >三小时</a></li>
						<li><a href="oneday.php" >一天</a></li>
						<li style="background: #a0cac0;border-bottom: 4px solid #68a697;"><a style="color: white;" href="oneweek.php" >一周</a></li>
						<li><a href="onemonth.php" >一个月</a></li>
						<li ><a  href="threemonth.php" >三个月</a></li>
					</ul>
			</article>
		</section>	
	</div>
	<!-- MAIN CONTAINER ends -->
</div>

</html>
<div id='center' class="center"></div>
<div class="draw_box">
<div id='canvasDiv' class="canvasDiv" ></div>
<script type="text/javascript" src="ichart.1.2.min.js"></script>
<div class='checktype'>
<input type="checkbox" id="type1" onclick="update()">温度
<input type="checkbox" id="type2" onclick="update()">湿度
<input type="checkbox" id="type3" onclick="update()">甲醛浓度
<input type="checkbox" id="type4" onclick="update()">空气质量
</div>

<div class="start">
<form  action="custom.php" method="post"  id="selectdate" name="select" onsubmit="">
开始日期：<input type="date" name="startdate" id ="startdate" required = "required" value = "<?php echo $startdatevalue?>"/>
<input type="time" name="starttime" id="starttime" required = "required" value="<?php echo $starttimevalue?>"/><br>
结束日期：<input type="date" name="enddate" id="enddate" value="<?php echo $enddatevalue?>" />
<input type="time" name="endtime" value="<?php echo $endtimevalue?>" id="endtime"/><br>
<input type="submit" name="set" value="自定义时间查询"/>
</div>
</div>
<div>
<script type="text/javascript">
/*var temperature_form = document.getElementByName('temperature');
document.select.temperature;
document.getElementById('show').innerHTML = "a";*/
$(function(){
			var temperature_data=[],humidity_data=[],MQ138_data=[],MQ5_data=[],t;
			var data=[];
			var data1={name : '温度',value:temperature_data,color:'#aad0db',line_width:2};
			var data2={name : '湿度',value:humidity_data,color:'#f68f70',line_width:2};
			var data3={name : '甲醛浓度',value:MQ138_data,color:'#00EE76',line_width:2};
			var data4={name : '空气质量',value:MQ5_data,color:'#8470FF',line_width:2};
			//根据选项传入数组
			for(var i=0;i<10;i++){
				t = 0;
				temperature_data.push(t);
				t = humidity[i];
				humidity_data.push(t);
				t = MQ138[i];
				MQ138_data.push(t);
				t = MQ5[i];
				MQ5_data.push(t);
			}
				data.push(data1);
		
			
					
			//创建x轴标签文本   
			//时间
			//var date = new Date()
			//date.setDate(date.getDate()-6);
			var labels = [];
			/*for(var i=0;i<6;i++){
				date.setDate(date.getDate()+1);
				labels.push(date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate());
			}*/
			for(var i=0;i<data_num;i++){
				//labels.push(date[i]);
				if(i%5 == 0)
				labels.push(i);
			}
			
			var chart = new iChart.LineBasic2D({
				//sub_option:{smooth:true,point_size:8,},
				animation: true,
				render : 'canvasDiv',
				data: data,
				align:'center',
				title : '最近一周',
				footnote : '小虾米 V2.0.0',
				width : 800,
				height : 400,
				background_color:'#FEFEFE',
				tip:{
					enable:true,
					shadow:true,
					move_duration:400,
					border:{
						 enable:true,
						 radius : 5,
						 width:2,
						 //color:'#3f8695'
					},
					listeners:{
						 //tip:提示框对象、name:数据名称、value:数据值、text:当前文本、i:数据点的索引
						parseText:function(tip,name,value,text,i){
							//return name+value;
							var backvalue = "时间 "+time[i];
							/*if(document.select.temperature.checked){
								backvalue = backvalue + "<br>"+"温度 " + temperature[i]
							}
							if(document.select.humidity.checked){
								backvalue = backvalue + "<br>"+"湿度 " + humidity[i]
							}*/
								return backvalue;
						}
					}

				},
				tipMocker:function(tips,i){
					//return "<div style='font-MQ5:1000'>"+
							//labels[i]+" "+//日期
							//(((i%12)*2<10?"0":"")+(i%12)*2)+":00"+//时间
							//time[i]+
							//"</div>"+tips.join("<br/>");
							//return "时间 "+time[i]+"<br>"+"温度 "+temperature[i]+"<br>"+"湿度 "+humidity[i];
							 var backvalue = "日期:"+date[i]+"<br>"+"时间:"+time[i];
							 if(type1.checked == 1){
								 backvalue = backvalue + "<br>"+"温度:" + temperature[i] + "℃";
							 }
							 if(type2.checked == 1){
								 backvalue = backvalue + "<br>"+"湿度：" + humidity[i]+ " %"
							 }
							 if(type3.checked == 1){
								 backvalue = backvalue + "<br>"+"甲醛浓度:" + MQ138[i]+" %"
							 }
							 if(type4.checked == 1){
								 backvalue = backvalue + "<br>"+"空气质量:" + MQ5[i]+" %"
							 }
								 return backvalue;
				},
				
				legend : {
					enable : true,
					row:1,//设置在一行上显示，与column配合使用
					column : 'max',
					valign:'top',
					sign:'bar',
					background_color:null,//设置透明背景
					offsetx:-80,//设置x轴偏移，满足位置需要
					border : true
				},
				crosshair:{
					enable:true,
					line_color:'#62bce9'//十字线的颜色
				},
				sub_option : {		//平滑曲线
					label:false,
					smooth:true,
					point_size:10
				},
				coordinate:{
					width:640,
					height:240,
					axis:{
						color:'#dcdcdc',
						width:1
					},
					//Y轴刻度设置
					scale:[{
						 position:'left',	
						 start_scale:50,			//起始刻度
						 end_scale:150,			//终止刻度
						 scale_space:20,			//每格长度
						 scale_size:2,			
						 scale_color:'#9f9f9f'
					},{
						 position:'bottom',	
						 labels:labels
					}]
				}
			});

		//开始画图
		chart.draw();

		//return false;
		});
		function update(){
			if(data_num <= 1){
				document.getElementById('center').innerHTML = "没有可以显示的数据<br>请检查您的登录状态或者查询时间";
			}
			var temperature_data=[],humidity_data=[],MQ138_data=[],MQ5_data=[],t;
			var data=[];
			var data1={name : '温度',value:temperature_data,color:'#aad0db',line_width:2};
			var data2={name : '湿度',value:humidity_data,color:'#f68f70',line_width:2};
			var data3={name : '甲醛浓度',value:MQ138_data,color:'#00EE76',line_width:2};
			var data4={name : '空气质量',value:MQ5_data,color:'#8470FF',line_width:2};
			//根据选项传入数组
			for(var i=0;i<data_num;i++){
				t = temperature[i];
				temperature_data.push(t);
				t = humidity[i];
				humidity_data.push(t);
				t = MQ138[i];
				MQ138_data.push(t);
				t = MQ5[i];
				MQ5_data.push(t);
			}
			if(type1.checked == 1){
				data.push(data1);
			}
			if(type2.checked == 1){
				data.push(data2);
			}
			if(type3.checked == 1){
				data.push(data3);
			}
			if(type4.checked == 1){
				data.push(data4);	
			}

			//创建x轴标签文本   
			//时间
			//var date = new Date()
			//date.setDate(date.getDate()-6);
			var labels = [];
			/*for(var i=0;i<6;i++){
				date.setDate(date.getDate()+1);
				labels.push(date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate());
			}*/
			for(var i=0;i<data_num;i++){
				//labels.push(date[i]);
				if(i%5 == 0)
				labels.push(i);
			}
			
			var chart = new iChart.LineBasic2D({
				//sub_option:{smooth:true,point_size:8,},
				animation: true,
				render : 'canvasDiv',
				data: data,
				align:'center',
				title : '最近一周',
				footnote : '小虾米 V2.0.0',
				width : 800,
				height : 400,
				background_color:'#FEFEFE',
				tip:{
					enable:true,
					shadow:true,
					move_duration:400,
					border:{
						 enable:true,
						 radius : 5,
						 width:2,
						 //color:'#3f8695'
					},
					listeners:{
						 //tip:提示框对象、name:数据名称、value:数据值、text:当前文本、i:数据点的索引
						parseText:function(tip,name,value,text,i){
							//return name+value;
							var backvalue = "时间 "+time[i];
							/*if(document.select.temperature.checked){
								backvalue = backvalue + "<br>"+"温度 " + temperature[i]
							}
							if(document.select.humidity.checked){
								backvalue = backvalue + "<br>"+"湿度 " + humidity[i]
							}*/
								return backvalue;
						}
					}

				},
				tipMocker:function(tips,i){
					//return "<div style='font-MQ5:1000'>"+
							//labels[i]+" "+//日期
							//(((i%12)*2<10?"0":"")+(i%12)*2)+":00"+//时间
							//time[i]+
							//"</div>"+tips.join("<br/>");
							//return "时间 "+time[i]+"<br>"+"温度 "+temperature[i]+"<br>"+"湿度 "+humidity[i];
							 var backvalue = "日期:"+date[i]+"<br>"+"时间:"+time[i];
							 if(type1.checked == 1){
								 backvalue = backvalue + "<br>"+"温度:" + temperature[i] + "℃";
							 }
							 if(type2.checked == 1){
								 backvalue = backvalue + "<br>"+"湿度：" + humidity[i]+ " %"
							 }
							 if(type3.checked == 1){
								 backvalue = backvalue + "<br>"+"甲醛浓度:" + MQ138[i]+" %"
							 }
							 if(type4.checked == 1){
								 backvalue = backvalue + "<br>"+"空气质量:" + MQ5[i]+" %"
							 }
								 return backvalue;
				},
				
				legend : {
					enable : true,
					row:1,//设置在一行上显示，与column配合使用
					column : 'max',
					valign:'top',
					sign:'bar',
					background_color:null,//设置透明背景
					offsetx:-80,//设置x轴偏移，满足位置需要
					border : true
				},
				crosshair:{
					enable:true,
					line_color:'#62bce9'//十字线的颜色
				},
				sub_option : {		//平滑曲线
					label:false,
					smooth:true,
					point_size:10
				},
				coordinate:{
					width:640,
					height:240,
					axis:{
						color:'#dcdcdc',
						width:1
					},
					//Y轴刻度设置
					scale:[{
						 position:'left',	
						 start_scale:50,			//起始刻度
						 end_scale:150,			//终止刻度
						 scale_space:20,			//每格长度
						 scale_size:2,			
						 scale_color:'#9f9f9f'
					},{
						 position:'bottom',	
						 labels:labels
					}]
				}
			});

		//开始画图
		chart.draw();
		//return false;
		};
</script>
