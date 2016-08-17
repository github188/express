<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单号查询</title>
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
			 <div>
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
        <a href="javascript:;">查询快递</a> <span class="divider">/</span>
        订单号查询
      </ul>
      <div class="title_right"><strong>订单号查询</strong></div>  
      <div class="express-check" style="width:300px; margin:auto">
          <br><br>
          快递查询：<br>
          <input class="search-con" type="text" value="请输入订单号"/><br><br>
          <input type="button" value="查询" id="sub"/>
      </div>
		<br>
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
	$('#sub').on('click', function(){
		if($searchBox.val() == "请输入订单号"){
			alert("请输入订单号再试！");
		}else{
			$.get('user/get_order_by_id',{id:$searchBox.val()},function(data){
				if(data){
					$('.order').remove();
					var state;
					if(data.order_state == 0){
						state = '<td style="text-align: center" rowspan="3">待付款<br><a href="user/pay_order?id='+data.order_id+'" style="background:#2f70df;display: inline-block;width: 80px;text-align:center;text-indent:0;color:#fff;">立即付款</a></td>';
					}else if(data.order_state == 1){
						state='<td style="text-align: center" rowspan="3">等待卖家发货</td>';
					}else if(data.order_state == 2){
						state='<td rowspan="3"><span class="see">查看物流</span><br><a href="user/receive?id='+data.order_id+'&state=3" style="margin-top: 10px; background:#2f70df;display: inline-block;margin-left: 25px;width: 80px;text-align:center;text-indent:0;color:#fff;">确认收货</a></td>';
					}else if(data.order_state == 3){
						state='<td style="text-align: center" rowspan="3">交易已完成</td>';
					}
					var html = '<div class="order express-check" style="width:900px; margin:auto">'
						+'<table>'
						+'<tr class="order-title">'
						+'<td width="25%">时间：'+data.order_date+'</td>'
						+'<td width="75%" colspan="4">订单号：'+data.order_id+'</td>'
						+'</tr>'
						+'<tr>'
						+'<td>物品名称：'+data.product_name+'</td>'
						+'<td>物品类型：'+data.product_kind+'</td>'
						+'<td>物品重量：'+data.product_weight+'Kg</td>'
						+'<td>运送费用：'+data.product_price+'元</td>'
						+state
						+'</tr>'
						+'<tr>'
						+'<td colspan="2">发件地址：'+data.send_address+'</td>'
						+'<td>发件人：'+data.send_name+'</td>'
						+'<td>电话号码：'+data.send_tel+'</td>'
						+'</tr>'
						+'<tr>'
						+'<td colspan="2">收件地址：'+data.receive_address+'</td>'
						+'<td>收件人：'+data.receive_name+'</td>'
						+'<td>电话号码：'+data.receive_tel+'</td>'
						+'</tr>'
						+'<tr class="wuliu">'
						+'<td colspan="5">始发站：<span style="color:red;">哈尔滨</span>-->中转站：<span style="color:red;">沈阳</span>-->中转站：<span style="color:red;">北京</span>-->中转站：<span style="color:red;">天津</span>-->终点站：<span style="color:red;">天堂</span><br>&nbsp;&nbsp;&nbsp;配送员小宋正在配送：联系电话：13355566777 请注意保持电话开机</td>'
						+'</tr>'
						+'</table>'
						+'</div>';
					$('.right_cont').append(html);
					$('.order .see').on('click', function(){
						$(this).parent().parent().next().next().next().toggle().siblings('.wuliu').hide();
					});
				}else{
					alert("此订单不存在！");
				}

			},'json');
		}
	});
</script>
</body>
</html>
