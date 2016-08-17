<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>主页</title>
    <base href="<?php echo site_url()?>">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/css.css" />
    <link rel="stylesheet" href="css/order.css" />
    <script type="text/javascript" src="js/jquery1.9.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/sdmenu.js"></script>
    <script type="text/javascript" src="js/laydate/laydate.js"></script>
    <style>
        .index p{
            text-indent: 15px;
            font-family: 微软雅黑;
            font-size: 16px;
        }
        .index img{
            margin-left: 150px;
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
                <a href="user/index">首页</a>
            </ul>
            <div class="index" style="width:900px; margin:auto">
                <br><br>
                <img src="img/logo.jpg" alt=".index">
                <p>XX快递品牌初创1993年，公司致力于民族品牌的建设和发展，不断完善终端网络、中转运输网络和信息网络三网一体的立体运行体系，立足传统快递业务，全面进入电子商务物流领域，以专业的服务和严格的质量管理来推动中国物流和快递行业的发展，成为对国民经济和人们生活最具影响力的民营快递企业之一。</p>
                <p>进入21世纪之后，随着中国快递市场的迅猛发展，XX快递的网络广度和深度进一步加强，基本覆盖到全国地市级以上城市和发达地区地市县级以上城市，尤其是在江浙沪地区，基本实现了派送无盲区。</p>
                <p>2007年，XX快递有限公司（以下简称"XX快递"）正式成立，注册资本5000万，接替成立于1997年的上海盛彤实业有限公司作为XX快递网络总公司行使对整个网络的管理权，拥有注册商标"STOXX快递"，负责对XX快递网络加盟商的授权许可、经营指导、品牌管理等。随着国内快递需求的多样化，XX快递在继续提供传统快递服务的同时，也在积极开拓新兴业务，包括与阿里巴巴集团合作提供C2C和B2C电子商务物流配送服务、第三方物流和仓储服务、代收货款业务贵重物品通道服务等，在国内（包括港、澳、台地区）建立了庞大的信息采集、市场开发、物流配送、快件收派等业务机构，建立服务客户的全国性网络，同时，也积极拓展国际件服务，为国内最重要的电子商务物流供应商。</p>
                <p>经过十多年的发展，XX快递在全国范围内形成了完善、流畅的自营速递网络。截至目前，公司共有独立网点及分公司830家；服务网点及门店5000余家，中转部62个，占地1240亩。各中转部在2011年年底全部实现半自动化分拣，且所有中转部和90%以上的网点公司已配备监控设备，在上海、北京、广州等大城市安装了10余台安检机。全网络公司车辆20000余辆，跨省级网络车近600辆(装配GPRS)。2010年上半年，日均业务量140万票，下半年日均业务量180万票，最高峰达到260万票，全年业务总量6亿余票。全网络共有从业人员约10万人，2011年全年业务量将达到7.5亿票，年营业额预计为95亿元，力争达到100亿元，全网总投资额约10亿元，XX快递目前已成为国内快递网络最完整、规模最大的民营快递体系。</p>
                <p>在未来，公司将继续致力于民族品牌的建设和发展，继续秉承"用心成就你我"的服务宗旨，加大投入、规范管理，为社会提供更加优质、安全、便捷的快递服务，不断推动XX快递向前发展，提升企业品牌价值，创造民族快递的奇迹。</p>
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
</script>
</body>
</html>
