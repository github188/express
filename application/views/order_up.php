<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线下单</title>
	<base href="<?php echo site_url()?>">
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/css.css" />
<link rel="stylesheet" href="css/order_up.css" />
<script type="text/javascript" src="js/jquery1.9.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/sdmenu.js"></script>
<script type="text/javascript" src="js/laydate/laydate.js"></script>

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
			 <div>
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
			 <div class="collapsed">
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
		  <a href="user/index">首页</a> <span class="divider">/</span>
        <a href="javascript:;">在线下单</a> <span class="divider">/</span>
        在线下单
      </ul>
      <div class="title_right"><strong>在线下单</strong></div>  
      <div class="up-order" style="width:900px; margin:auto">
        <form action="user/order_up" method="post">
          <br>
          *发件地址： &nbsp;&nbsp;&nbsp;<input class="search-con" type="text" value="黑龙江" name="sendProvince"/>&nbsp;&nbsp;省 <input class="search-con" type="text" value="哈尔滨" name="sendCity"/>&nbsp;&nbsp;市 <input class="search-con" style="width:330px;" type="text" value="请填写详细地址（例如XX路，XX号）" name="sendAddress"/><br><br>
          *收件地址： &nbsp;&nbsp;&nbsp;<input class="search-con" type="text" value="黑龙江" name="receiveProvince"/>&nbsp;&nbsp;省 <input class="search-con" type="text" value="哈尔滨" name="receiveCity"/>&nbsp;&nbsp;市 <input class="search-con" style="width:330px;" type="text" value="请填写详细地址（例如XX路，XX号）" name="receiveAddress"/><br><br>
          *物品名称： &nbsp;&nbsp;&nbsp;<input class="search-con" type="text" value="物品名称" name="productName"/> &nbsp;<br><br>
          *物品重量： &nbsp;&nbsp;&nbsp;<input class="search-con" type="text" value="物品重量" name="productWeight"/> &nbsp;Kg<br><br>
          *物品类型： &nbsp;&nbsp;&nbsp;<input type="radio" name="kind" value="常规"/> 常规&nbsp;&nbsp; <input type="radio" name="kind" value="易碎"/> 易碎 <br><br>
          *发件人信息： <input class="search-con" type="text" value="姓名" name="sendName"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="search-con" type="text" value="手机号码" name="sendTel"><br><br>
          *收件人信息： <input class="search-con" type="text" value="姓名" name="receiveName"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="search-con" type="text" value="手机号码" name="receiveTel"/><br><br><br>
          <input type="submit" value="生成订单" id="sub"/>
        </form>
      </div>
    </div>     
  </div>
</div>
<script src="js/order_up.js"></script>        
<script>
!function(){
laydate.skin('molv');
laydate({elem: '#Calendar'});
}();
$searchBox = $(".search-con");
$searchBox.focus(function(){
	$(this).addClass('focus');
	if($(this).val() == this.defaultValue){
		this.value = "";
	}
}).blur(function(){
	$(this).removeClass('focus').val(this.value == ""?this.defaultValue:this.value);
});
</script>
</body>
</html>
