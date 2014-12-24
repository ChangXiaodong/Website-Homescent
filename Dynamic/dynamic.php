<?php
$date =time();
$startdate = date("Y-m-d",$date + 3600 * 8-3600*24);
$enddate = date("Y-m-d",$date + 3600 * 8);

$starttime = date("H:i",$date + 3600 * 8-3600*24);
$endtime = date("H:i",$date + 3600 * 8);
?>

<title></title>
<html>
<link rel="stylesheet" href="../ichart/css/login.css" type="text/css" />
<link rel="stylesheet" href="../ichart/css/style.css" media="screen" type="text/css" />
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<script type="text/javascript" src="../ichart/js/jquery-1.4.2.min.js"></script>
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
	var cookie_name=getCookie('username');
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
	var username = document.getElementById('log').value;
	var password = document.getElementById('pwd').value;
	xmlHttp.open("GET","../register/login.php?username="+username+"&password="+password,true);
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
	}
	
	return 1;
}
</script>

<body>
<div id='test'>
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
    <a href='dynamic.php'>
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
<script type='text/javascript' src='js/jquery-1.9.1.min.js'></script>
<script type='text/javascript' src='js/jquery.flot.js'></script>    
<div class="head">
	<h2  align="center">家香--动态曲线</h2>
</div>
<div class="data">
<div id="chart-4" style="height: 300px;width:70%;left:200px;top:80px;"></div>
</div>
<div id="draw"></div>
<style>
.head{
position:relative;
height:40px;
width:240px;
left:39%;
top:10%;
font-family:黑体;
font-size:20px;
}
</style>
<div class='checktype' >
<input type="radio" name="select_type" value="temperature" checked>温度
<input type="radio" name="select_type" value="humidity" >湿度
<input type="radio" name="select_type" value="MQ138" >甲醛浓度
<input type="radio" name="select_type" value="MQ5" >空气质量
</div>
<div class='time'>
开始日期：<input type="date" name="startdate" id ="startdate" value = "<?php echo $startdate?>" />
<input type="time" name="starttime" id="starttime" value = "<?php echo $starttime?>" /><br>
结束日期：<input type="date" name="enddate" id="enddate" value = "<?php echo $enddate?>" />
<input type="time" name="endtime" id="endtime" value = "<?php echo $endtime?>"/><br>
</div>
<input type="button" name="set" value="开始绘图" class='draw' onclick="start_draw();"/>

<script type="text/javascript">
var xmlHttp;
var buffer = new Array();
var res = new Array();
var count = 0;
var sec = 0;
var aa = 0;
var set_flag = 0;
var pit_id = 0;
var data = new Array();
function A_xmlhttprequest() {
	if(window.ActiveXObject) {
		xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
	} else if(window.XMLHttpRequest) {
		xmlHttp = new XMLHttpRequest();
	}
}
function getvalue() {
	var i =0;
	var obj=document.getElementsByName('select_type');
	for(i=0;i<obj.length;i++){
		if(obj[i].checked)
		{
			var select = obj[i].value;
		}
	}
	var startdate = document.getElementById('startdate').value;
	var starttime = document.getElementById('starttime').value;
	var enddate = document.getElementById('enddate').value;
	var endtime = document.getElementById('endtime').value;
	var start=startdate+' '+starttime;
	var end=enddate+' '+endtime;
	
	A_xmlhttprequest();
	xmlHttp.open("GET","read.php?type="+select+'&start_time='+start+'&end_time='+end,true);
	xmlHttp.onreadystatechange = receive_op;
	xmlHttp.send(null);
	return false;

}
function receive_op() {
	var reveive =  xmlHttp.responseText;
	var i=0;
	buffer = reveive.split(";");
	//document.getElementById('test').innerHTML = buffer.length;
	return 1;
}
function start_draw(){
	buffer.length=0;
	res.length=0;
	data.length=0;
	aa=0;
	getvalue();
	clearInterval(pit_id);

	draw();
}
function draw(){
	var ForReading=1; 
    if($("#chart-4").length > 0){
        var totalPoints = 50;	//数据总数
        var updateInterval = 100;   //扫面时间  单位ms
        var plot = $.plot($("#chart-4"), [ getData() ], {
            series: { shadowSize: 0 }, //线阴影
            yaxis: { min: 0, max: 100 },
            xaxis: { show: true }  //背景网格
        });
		//buffer.length = 0;
		
        //update(); 	
		pit_id=setInterval(update, updateInterval);	
    }
    function update() {

        plot.setData([ getData() ]);
        // since the axes don't change, we don't need to call plot.setupGrid()
        plot.draw();
        //setTimeout(update, updateInterval);
    }
    function getData() {
		var y;
		
        if (data.length > 0)
            data = data.slice(1);
        // do a random walk
		if(set_flag==1&&aa<=buffer.length-1){
					//y = Math.random()*100;
					//document.getElementById('test').innerHTML = buffer[aa];
					y =  buffer[aa++];
					if (y < 0)
						y = 0;
					if (y > 100)
						y = 100;
					data.push(y);
			}
		else{
				while (data.length < totalPoints) {
				y =  50;
				data.push(y);
				set_flag = 1;
			}
			
		}
		
		//document.getElementById('draw').innerHTML = sec;
		//document.getElementById('data').innerHTML = buffer.length;
		/*if(count==buffer.length){
			count = 0;
			select(++sec);
		}*/
        
		
        // zip the generated y values with the x values
		res.length = 0;
        for (var i = 0; i < data.length; ++i)
            res.push([i, data[i]])
        return res;
    }
	//指定位置显示
    function showTooltip(x, y, contents) {
        $('<div class="ct">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y,
            left: x + 10,
            border: '1px solid #000',
            padding: '3px',
            opacity: '0.7',
            'background-color': '#000',            
            color: '#fff'            
        }).appendTo("body").fadeIn(200);
    }    

    var previousPoint = null;
    
};
</script>
