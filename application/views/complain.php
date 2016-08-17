<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户投诉</title>
	<base href="<?php echo site_url()?>">
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/css.css" />
<link rel="stylesheet" href="css/order.css" />
<script type="text/javascript" src="js/jquery1.9.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/sdmenu.js"></script>
<script type="text/javascript" src="js/laydate/laydate.js"></script>
<style>
	.express-check{
		font-size: 16px;
		font-family: "微软雅黑";
	}
	.express-check input{
		height: 30px;
		width: 300px;
		text-align: center;
		font-size: 16px;
		font-family: "微软雅黑";
	}
	#sub{
		width: 150px;
		height: 40px;
		border: none;
		background: #2f70df;
		color: #fff;
		margin-left: 75px;
	}
	.order table{
		width: 100%;
	}
	.order table td{
		border: 1px solid #ccc;
		height: 30px;
		font-size: 16px;
		font-family: "微软雅黑";
		/*text-align: center;*/
		text-indent: 15px;
		line-height: 30px;
	}
	.order .see{
		background:#2f70df;
		text-align:center;
		text-indent:0;
		color:#fff;
		cursor:pointer;
	}
	.order .wuliu{
		display: none;
	} 
</style>
</head>

<body>
<div class="header">
	 <div class="logo">XX快递管理系统</div>
	 <?php include 'header.php';?>
</div>
<!-- 顶部 -->                
<div id="middle">
     <div class="left">
     
     <script type="text/javascript">
var myMenu;
window.onload = function() {
	myMenu = new SDMenu("my_menu");
	myMenu.init();
};
</script>

		 <div id="my_menu" class="sdmenu">
			 <div class="collapsed">
				 <span>在线下单</span>
				 <a href="user/order_up">在线下单</a>
			 </div>
			 <div class="collapsed">
				 <span>查询快递</span>
				 <a href="user/express_check">订单号查询</a>
			 </div>
			 <div class="collapsed">
				 <span>订单查询</span>
				 <a href="user/order_all">所有订单</a>
				 <a href="user/order_no_pay">未付款订单</a>
				 <a href="user/order_no_send">未发货订单</a>
				 <a href="user/order_no_receive">已发货订单</a>
				 <a href="user/order_finish">已完成订单</a>
			 </div>
			 <div>
				 <span>用户投诉</span>
				 <a href="user/complain">用户投诉</a>
			 </div>
		 </div>

     </div>
     <div class="Switch"></div>
     <script type="text/javascript">
	$(document).ready(function(e) {
    $(".Switch").click(function(){
	$(".left").toggle();
	 
		});
});
</script>
  <div class="right"  id="mainFrame">     
    <div class="right_cont">
      <ul class="breadcrumb">当前位置：
		  <a href="user/index">首页</a><span class="divider">/</span>
        <a href="javascript:;">用户投诉</a> <span class="divider">/</span>
        用户投诉
      </ul>
      <div class="title_right"><strong>用户投诉</strong></div>  
      <div style="width:900px; margin:auto">
      	<br><br><br><br>
      	<form action="user/do_complain" method="post">
   <table class="table table-bordered" >
     <tr>
       <td width="12%" align="right" nowrap="nowrap" bgcolor="#f1f1f1">订单号：</td>
       <td width="38%"><input type="text" name="order_id" id="input" class="span1-1"  /></td>
       <td width="12%" align="right" bgcolor="#f1f1f1">发货日期：</td>
       <td><input type="text" name="order_date" class="laydate-icon span1-1" id="Calendar" value="2015-08-25"  /></td>
     </tr>
     <tr>
       <td align="right" nowrap="nowrap" bgcolor="#f1f1f1">客户姓名：</td>
       <td><input type="text" name="username" id="input3" class="span1-1"  /></td>
       <td align="right" bgcolor="#f1f1f1">客户电话：</td>
       <td><input type="text" name="usertel" id="input4" class="span1-1"  /></td>
     </tr>
     <tr>
       <td align="right" nowrap="nowrap" bgcolor="#f1f1f1">运费：</td>
       <td><input type="text" name="product_price" id="input2" class="span1-1"  /></td>
       <td align="right"></td>
       <td></td>
     </tr>
     <tr>
       <td align="right" nowrap="nowrap" bgcolor="#f1f1f1">投诉内容：</td>
       <td colspan="3"><textarea name="content" id="input9" class="span10"></textarea></td>
       </tr>
   </table>
   <table  class="margin-bottom-20 table  no-border" >
        <tr>
     	<td class="text-center"><input type="submit" value="确定" class="btn btn-info " style="width:80px;" /></td>
     </tr>
 </table>
     </form> 
   </div> 
    </div>     
  </div>
</div>
<script src="js/order_up.js"></script>
<script src="js/order.js"></script>      
<script>
!function(){
laydate.skin('molv');
laydate({elem: '#Calendar'});
}();
$('#input').blur(function(){
	$.get('user/check_order_num',{id:$(this).val()},function(data){
		if(data == 'file'){
			alert('请输入有效的订单号');
		}
	},'text');
});
</script>
</body>
</html>
