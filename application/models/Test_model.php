<?php

class Test_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    function getTest() {
        $this->db->select('*');
        $this->db->from('test');
        return $this->db->get()->row();
    }
}