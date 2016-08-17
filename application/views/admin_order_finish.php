<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>已完成订单</title>
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
	 <div class="logo">XX快递管理系统管理员界面</div>
    <?php include 'admin_header.php';?>
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
                 <span>系统消息</span>
                 <a href="admin/admin_message">用户投诉</a>
             </div>
             <div>
                 <span>查询快递</span>
                 <a href="admin/admin_express_check">订单号查询</a>
             </div>
             <div class="collapsed">
                 <span>订单查询</span>
                 <a href="admin/admin_order_all">所有订单</a>
                 <a href="admin/admin_order_no_pay">未付款订单</a>
                 <a href="admin/admin_order_no_send">未发货订单</a>
                 <a href="admin/admin_order_no_receive">已发货订单</a>
                 <a href="admin/admin_order_finish">已完成订单</a>
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
        <a href="admin/admin_index">首页</a> <span class="divider">/</span>
        <a href="javascript:;">订单查询</a> <span class="divider">/</span>
        已完成订单
      </ul>
      <div class="title_right"><strong>已完成订单</strong></div>  
      <div class="order express-check" style="width:900px; margin:auto">
          <table>
              <?php
              foreach($orders as $order){
                  ?>
                  <tr class="order-title">
                      <td width="25%">时间：<?php echo $order->order_date;?></td>
                      <td width="15%">订单号：<?php echo $order->order_id;?></td>
                      <td width="60%" colspan="3">下单人：<?php echo $order->username;?></td>
                  </tr>
                  <tr>
                      <td>物品名称：<?php echo $order->product_name;?></td>
                      <td>物品类型：<?php echo $order->product_kind;?></td>
                      <td>物品重量：<?php echo $order->product_weight;?>Kg</td>
                      <td>运送费用：<?php echo $order->product_price;?>元</td>
                      <?php
                      if($order->order_state == 0){
                          ?>
                          <td style="text-align: center" rowspan="3">等待买家付款</td>
                          <?php
                      }else if($order->order_state == 1){
                          ?>
                          <td style="text-align: center" rowspan="3"><a href="admin/receive?id=<?php echo $order->order_id;?>&state=2" style="margin-top: 10px; background:#2f70df;display: inline-block;width: 80px;text-align:center;text-indent:0;color:#fff;">立即发货</a></td>
                          <?php
                      }else if($order->order_state == 2){
                          ?>
                          <td rowspan="3">等待买家确认收货</td>
                          <?php
                      }else if($order->order_state == 3){
                          ?>
                          <td style="text-align: center" rowspan="3">交易已完成</td>
                          <?php
                      }
                      ?>
                  </tr>
                  <tr>
                      <td colspan="2">发件地址：<?php echo $order->send_address;?></td>
                      <td>发件人：<?php echo $order->send_name;?></td>
                      <td>电话号码：<?php echo $order->send_tel;?></td>
                  </tr>
                  <tr>
                      <td colspan="2">收件地址：<?php echo $order->receive_address;?></td>
                      <td>收件人：<?php echo $order->receive_name;?></td>
                      <td>电话号码：<?php echo $order->receive_tel;?></td>
                  </tr>
                  <tr class="wuliu">
                      <td colspan="5">始发站：<span style="color:red;">哈尔滨</span>-->中转站：<span style="color:red;">沈阳</span>-->中转站：<span style="color:red;">北京</span>-->中转站：<span style="color:red;">天津</span>-->终点站：<span style="color:red;">天堂</span><br>&nbsp;&nbsp;&nbsp;配送员小宋正在配送：联系电话：13355566777 请注意保持电话开机</td>
                  </tr>
                  <?php
              }
              ?>

          </table>
      </div>
    </div>     
  </div>
</div>
<!-- <script src="js/order_up.js"></script>         -->
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
