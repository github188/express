<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>支付</title>
	<base href="<?php echo site_url()?>">
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/css.css" />
<script type="text/javascript" src="js/jquery1.9.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/sdmenu.js"></script>
<script type="text/javascript" src="js/laydate/laydate.js"></script>
<style>
	.pay-order{
		font-size: 20px;
		font-family: "微软雅黑";
	}
	#sub{
		width: 150px;
		height: 40px;
		border: none;
		background: #2f70df;
		color: #fff;
		margin-left: 350px;
		font-size: 16px;
		font-family: "微软雅黑";
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
        订单支付
      </ul>
      <div class="title_right"><strong>订单号查询</strong></div>  
      <div class="pay-order" style="width:900px; margin:auto">
        <form action="user/pay_order_success" method="post">
			<span style="color:#f00;">请认真核对订单信息！！！</span>
          <br><br>
		  订单号：<span style="color:#f00;"><?php echo $order->order_id;?></span><br><br>
		  物品名称：<span style="color:#f00;"><?php echo $order->product_name;?></span> &nbsp;&nbsp;&nbsp;物品种类：<span style="color:#f00;"><?php echo $order->product_kind;?></span> &nbsp;&nbsp;&nbsp;总重量：<span style="color:#f00;"><?php echo $order->product_weight;?>Kg</span> <br><br>
		  发件地址：<span style="color:#f00;"><?php echo $order->send_address;?></span> &nbsp;&nbsp;&nbsp;收件地址：<span style="color:#f00;"><?php echo $order->receive_address;?></span> &nbsp;&nbsp;&nbsp;<br><br>
		  发件人姓名：<span style="color:#f00;"><?php echo $order->send_name;?></span> &nbsp;&nbsp;&nbsp;电话号码：<span style="color:#f00;"><?php echo $order->send_tel;?></span><br><br>
		  收件人姓名：<span style="color:#f00;"><?php echo $order->receive_name;?></span> &nbsp;&nbsp;&nbsp;电话号码：<span style="color:#f00;"><?php echo $order->receive_tel;?></span><br><br>
          总价格：<span style="color:#f00;"><?php echo $order->product_price;?>元</span> (其中其中价格1Kg以内收费10元，每超出1Kg额外收费5元）<br><br>
          支付成功后工作人员将会去您家中取件，如果您填写的重量与实际重量不符，工作人员会与您处理差价！<br><br><br><br>
			<input type="hidden" name="id" value="<?php echo $order->order_id;?>">
			<input type="hidden" name="state" value="1">
			<input id="sub" type="submit" value="支付"/>
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
</script>
</body>
</html>
