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


    function insertRegion($option) {
        $this->db->set('ip', $option['ip']);
        $this->db->where('id', $option['id']);
        $this->db->update('tbl_member');

        return $this->db->affected_rows() > 0 ? 'success' : 'fail';
    }

    function getStoredPw($id) {
        $this->db->select('pw');
        $this->db->from('tbl_member');
        $this->db->where('id', $id);
        return $this->db->get()->row('pw');
    }


    function loginSessionSet($option) {
        $this->db->select('*');
        $this->db->from('tbl_member');
        $this->db->where('id', $option['id']);
        $result = $this->db->get()->row();

        if(isset($result)) {
            $set_data = array(
                'idx'=> $result->idx,
                'id' => $result->id,
                'email' => $result->email,
                'tel' => $result->tel,
                'gender' => $result->gender,
                'region' => $result->region,
            );

            $this->session->set_userdata($set_data);

            $a = $this->session->userdata();
            $b = $this->session->idx;

            log_message('debug', 'Setting Session Data: ' . print_r($set_data, true));  // 데이터가 올바르게 전달되는지 확인
            return true;
        }
        else{
            return false;
        }
    }

}