<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model{
    public function save($data){
            $this->db->insert('t_user',$data);
            return $this->db->affected_rows();
    }
    public function get_by_username_password($username,$password){
            $query = $this->db->get_where("t_user",array("username"=>$username,"password"=>$password));
            return $query->row();
    }
//    public function get_user_by_id($user_id){
//           $this->db->select('*');
//           $this->db->from('t_user');
//           $this->db->where('t_user.user_id',$user_id);
//           return $this->db->get()->row();
//    }
//    public function open_huiyuan_by_id($user_id){
//            $this->db->where('user_id',$user_id);
//            $this->db->update('t_user',array('is_huiyuan'=>1));
//    }
//    public function check_name($name){
//            $query = $this->db->get_where('t_user',array('username'=>$name));
//            return $query->row();
//    }
}