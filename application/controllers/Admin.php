<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("order_model");
        $this->load->model("complain_model");
    }
    //跳转至管理员主页
    public function admin_index()
    {
        $this->load->view('admin_index');
    }
    //跳转至系统消息页面
    public function admin_message()
    {
        $result = $this->complain_model->get_all_complain();
        $arr = array('complains'=>$result);
        $this->load->view('admin_message',$arr);
    }
    //跳转至订单号查询页面
    public function admin_express_check()
    {
        $this->load->view('admin_express_check');
    }
    //跳转至所有订单页面
    public function admin_order_all()
    {
        $orders = $this->order_model->get_all_order();
        $arr = array('orders'=>$orders);
        $this->load->view('admin_order_all',$arr);
    }
    //跳转至未付款页面
    public function admin_order_no_pay()
    {
        $result = $this->order_model->get_order_by_state(0);
        $arr = array('orders'=>$result);
        $this->load->view('admin_order_no_pay',$arr);
    }
    //跳转至未发货页面
    public function admin_order_no_send()
    {
        $result = $this->order_model->get_order_by_state(1);
        $arr = array('orders'=>$result);
        $this->load->view('admin_order_no_send',$arr);
    }
    //跳转至已发货页面
    public function admin_order_no_receive()
    {
        $result = $this->order_model->get_order_by_state(2);
        $arr = array('orders'=>$result);
        $this->load->view('admin_order_no_receive',$arr);
    }
    //跳转至已完成页面
    public function admin_order_finish()
    {
        $result = $this->order_model->get_order_by_state(3);
        $arr = array('orders'=>$result);
        $this->load->view('admin_order_finish',$arr);
    }
    public function receive()
    {
        $id = $this->input->get('id');
        $state = $this->input->get('state');
        $this->order_model->update_order_state_by_id($id,$state);
        redirect('admin/admin_order_all');
    }
    public function logout()
    {
        $this->session->unset_userdata("login_admin");
        redirect('admin/admin_index');
    }
}