<?php

class Member_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    function checkIdDuple($id) {
        $this->db->select('count(*) as cnt');
        $this->db->from('tbl_member');
        $this->db->where('id', $id);
        return $this->db->get()->row('cnt');
    }

    function insertMember($option) {
        $this->db->set('id', $option['id']);
        $this->db->set('pw', $option['pw']);
        $this->db->set('name', $option['name']);
        $this->db->set('email', $option['email']);
        $this->db->set('birthday', $option['birthday']);
        $this->db->set('gender', $option['gender']);
        $this->db->set('region', $option['region']);
        $this->db->set('reg_dt', 'now()', false);
        $this->db->insert('tbl_member');
        return $this->db->insert_id();
    }
}