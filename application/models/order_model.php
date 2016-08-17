<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order_model extends CI_Model{
    public function save_order($arr){
        $this->db->insert('t_order',$arr);
        return $this->db->insert_id();
    }
    public function get_order_by_id($id,$user_id){
        $this->db->select('*');
        $this->db->from('t_order');
        $this->db->where('order_id',$id);
        $this->db->where('user_id',$user_id);
        return $this->db->get()->row();
    }
    public function update_order_state_by_id($id,$state){
        $this->db->where('order_id',$id);
        $this->db->update('t_order',array('order_state'=>$state));
    }
    public function get_all_order_by_id($user_id){
        $this->db->select('*');
        $this->db->from('t_order');
        $this->db->where('user_id',$user_id);
        return $this->db->get()->result();
    }
    public function get_all_order(){
        $this->db->select('*');
        $this->db->from('t_order');
        $this->db->join('t_user','t_user.user_id=t_order.user_id');
        return $this->db->get()->result();
    }
    public function get_all_order_by_state($user_id,$state){
        $this->db->select('*');
        $this->db->from('t_order');
        $this->db->where('order_state',$state);
        $this->db->where('user_id',$user_id);
        return $this->db->get()->result();
    }
    public function get_order_by_state($state){
        $this->db->select('*');
        $this->db->from('t_order');
        $this->db->join('t_user','t_user.user_id=t_order.user_id');
        $this->db->where('order_state',$state);
        return $this->db->get()->result();
    }
    public function get_express_address($order_id){
        $this->db->select('*');
        $this->db->from('t_address');
        $this->db->where('order_id',$order_id);
        return $this->db->get()->result();
    }
    public function get_courier($order_id){
        $this->db->select('*');
        $this->db->from('t_courier');
        $this->db->where('order_id',$order_id);
        return $this->db->get()->row();
    }
}