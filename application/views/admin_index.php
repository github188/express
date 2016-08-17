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
        .index{
            text-align: center;
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
                <a href="admin/admin_index">首页</a>
            </ul>

            <div class="index" style="width:1000px; margin:auto">
                <br><br><br><br><br><br>
                <p style="font-family: 微软雅黑; font-size: 30px;">欢迎管理员回来！</p><br><br>
                <p style="font-family: 微软雅黑; font-size: 25px;">在这里您可以处理订单以及用户投诉信息</p><br><br>
                <p style="font-family: 微软雅黑; font-size: 20px;">祝您使用愉快</p>
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
