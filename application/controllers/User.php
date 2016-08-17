<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("order_model");
        $this->load->model("complain_model");
    }
    //跳转至主页
    public function index()
    {
        $this->load->view('index');
    }

    //跳转至在线下单页面
    public function order_up()
    {
        $user_id = $this->session->userdata("login_user")->user_id;
        if($user_id){
            $sendProvince = $this->input->post('sendProvince');
            $sendCity = $this->input->post('sendCity');
            $sendAddress = $this->input->post('sendAddress');
            $sendName = $this->input->post('sendName');
            $sendTel = $this->input->post('sendTel');
            $receiveProvince = $this->input->post('receiveProvince');
            $receiveCity = $this->input->post('receiveCity');
            $receiveAddress = $this->input->post('receiveAddress');
            $receiveName = $this->input->post('receiveName');
            $receiveTel = $this->input->post('receiveTel');
            $productName = $this->input->post('productName');
            $productWeight = $this->input->post('productWeight');
            $kind = $this->input->post('kind');
            $sendAddress = $sendProvince ."省". $sendCity ."市". $sendAddress;
            $receiveAddress = $receiveProvince ."省". $receiveCity."市". $receiveAddress;
            $productPrice = $productWeight>1?(10+($productWeight-1)*5):10;
            if($sendProvince == "" || $sendCity == "" || $sendAddress == "" || $receiveProvince == "" || $receiveCity == "" || $receiveAddress == "" || $sendName == "" || $sendTel == "" || $receiveName == "" || $receiveTel == "" || $productName == "" || $productWeight == "" || $kind == ""){
                $this->load->view('order_up');
            }else{
                $arr = array(
                    'send_address'=>$sendAddress,
                    'receive_address'=>$receiveAddress,
                    'product_name'=>$productName,
                    'product_weight'=>$productWeight,
                    'product_kind'=>$kind,
                    'send_name'=>$sendName,
                    'send_tel'=>$sendTel,
                    'receive_name'=>$receiveName,
                    'receive_tel'=>$receiveTel,
                    'user_id'=>$user_id,
                    'product_price'=>$productPrice
                );
                $result = $this->order_model->save_order($arr);
                if($result){
                    redirect('user/pay_order?id='.$result);
                }else{
                    $this->load->view('order_up');
                }
            }
        }else{
            redirect('user/login');
        }

    }
    //跳转至支付订单页面
    public function pay_order()
    {
        $id = $this->input->get('id');
        $user_id = $this->session->userdata("login_user")->user_id;
        if($user_id){
            $result = $this->order_model->get_order_by_id($id,$user_id);
            $arr = array('order'=>$result);
            $this->load->view('pay_order',$arr);
        }else{
            redirect('user/login');
        }

    }
    //执行订单支付成功操作
    public function pay_order_success()
    {
        $id = $this->input->post('id');
        $state = $this->input->post('state');
        $this->order_model->update_order_state_by_id($id,$state);
        $this->load->view('pay_order_success');
    }
    //确认收货
    public function receive()
    {
        $id = $this->input->get('id');
        $state = $this->input->get('state');
        $this->order_model->update_order_state_by_id($id,$state);
        redirect('user/order_all');
    }
    //跳转至订单号查询页面
    public function express_check()
    {
        $user_id = $this->session->userdata("login_user")->user_id;
        if($user_id){
            $this->load->view('express_check');
        }else{
            redirect('user/login');
        }

    }
    //执行按照订单号查询订单操作
    public function get_order_by_id()
    {
        $id = $this->input->get('id');
        $user_id = $this->session->userdata("login_user")->user_id;
        $result = $this->order_model->get_order_by_id($id,$user_id);
        echo json_encode($result);
    }
    //跳转至所有订单页面
    public function order_all()
    {
        $user_id = $this->session->userdata("login_user")->user_id;
        if($user_id){
            $orders = $this->order_model->get_all_order_by_id($user_id);
            foreach($orders as $order){
                $order->express_address = $this->order_model->get_express_address($order->order_id);
                $order->courier = $this->order_model->get_courier($order->order_id);
            }
            $arr = array('orders'=>$orders);
            $this->load->view('order_all',$arr);
        }else{
            redirect('user/login');
        }

    }
    //跳转至未付款订单页面
    public function order_no_pay()
    {
        $user_id = $this->session->userdata("login_user")->user_id;
        if($user_id){
            $result = $this->order_model->get_all_order_by_state($user_id,0);
            $arr = array('orders'=>$result);
            $this->load->view('order_no_pay',$arr);
        }else{
            redirect('user/login');
        }

    }
    //跳转至未发货页面
    public function order_no_send()
    {
        $user_id = $this->session->userdata("login_user")->user_id;
        if($user_id){
            $result = $this->order_model->get_all_order_by_state($user_id,1);
            $arr = array('orders'=>$result);
            $this->load->view('order_no_send',$arr);
        }else{
            redirect('user/login');
        }

    }
    //跳转至已发货页面
    public function order_no_receive()
    {
        $user_id = $this->session->userdata("login_user")->user_id;
        if($user_id){
            $result = $this->order_model->get_all_order_by_state($user_id,2);
            $arr = array('orders'=>$result);
            $this->load->view('order_no_receive',$arr);
        }else{
            redirect('user/login');
        }

    }
    //跳转至已完成页面
    public function order_finish()
    {
        $user_id = $this->session->userdata("login_user")->user_id;
        if($user_id){
            $result = $this->order_model->get_all_order_by_state($user_id,3);
            $arr = array('orders'=>$result);
            $this->load->view('order_finish',$arr);
        }else{
            redirect('user/login');
        }

    }
    //跳转至用户投诉页面
    public function complain()
    {
        $user_id = $this->session->userdata("login_user")->user_id;
        if($user_id){
            $this->load->view('complain');
        }else{
            redirect('user/login');
        }

    }
    //执行投诉操作
    public function do_complain()
    {
        $user_id = $this->session->userdata("login_user")->user_id;
        $order_id = $this->input->post('order_id');
        $order_date = $this->input->post('order_date');
        $username = $this->input->post('username');
        $usertel = $this->input->post('usertel');
        $product_price = $this->input->post('product_price');
        $content = $this->input->post('content');
        $arr = array(
            'user_id'=>$user_id,
            'date'=>$order_date,
            'username'=>$username,
            'usertel'=>$usertel,
            'product_price'=>$product_price,
            'complain_content'=>$content,
            'order_id'=>$order_id

        );
        $result = $this->complain_model->save_complain($arr);
        if($result){
            $this->load->view('complain_success');
        }
    }
    //查询订单还是否有效
    public function check_order_num()
    {
        $user_id = $this->session->userdata("login_user")->user_id;
        $id = $this->input->get('id');
        $result = $this->order_model->get_order_by_id($id,$user_id);
        if($result){
            echo 'success';
        }else{
            echo 'file';
        }
    }
    //跳转至注册页面
    public function regist()
    {
        $this->load->view('regist');
    }
    //跳转至注册失败页面
    public function regist_error()
    {
        $this->load->view('regist_error');
    }
    //跳转至注册成功页面
    public function regist_success()
    {
        $this->load->view('regist_success');
    }
    //执行注册操作并且验证
    public function do_reg()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if($username == "" || $password == ""){
            redirect('user/regist_error');
        }else{
            $data = array(
                'username'=>$username,
                'password'=>$password
            );
            $this->user_model->save($data);
            redirect('user/regist_success');
        }
    }
    //跳转至登录页面
    public function login()
    {
        $this->load->view('login');
    }
    //跳转至登录失败操作
    public function login_error()
    {
        $this->load->view('login_error');
    }
    //执行登录操作
    public function check_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->user_model->get_by_username_password($username,$password);
        if($user){

            if($user->is_admin == 1){
                $this->session->set_userdata("login_admin",$user);
                redirect('admin/admin_index');
            }else{
                $this->session->set_userdata("login_user",$user);
                redirect('user/index');
            }
        }else{
            redirect('user/login_error');
        }
    }
    //执行注销操作
    public function logout()
    {
        $this->session->unset_userdata("login_user");
        redirect('user/index');
    }
}