<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Complain_model extends CI_Model{
    public function save_complain($arr){
        $this->db->insert('t_complain',$arr);
        return $this->db->insert_id();
    }
    public function get_all_complain(){
        $this->db->select('*');
        $this->db->from('t_complain');
        return $this->db->get()->result();
    }
}