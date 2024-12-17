<?php
require_once APPPATH . 'controllers/common/CommonLoader.php';

class Member extends CommonLoader
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
    }


    function register() {
        $post = $this->input->post();

        // 아이디 중복 체크_s
        $idChk = $this->Member_model->checkIdDuple($post['id']);
        if($idChk > 0) {
            echo $this->ajax_error_form('ID already exists!');
            return;
        }

        $input_data = array(
            'id' => $post['id'],
            'pw' => password_hash($post['pw'], PASSWORD_BCRYPT),
            'name'=> $post['name'],
            'email' => $post['email'],
            'birthday' => $post['birthday'],
            'gender' => $post['gender'],
            'region' => $post['region'],
        );

        $res = $this->Member_model->insertMember($input_data);

        $this->db->trans_begin();
        if($res > 0) {
            $this->db->trans_commit();
            echo $this->ajax_success_form('성공');
        } else {
            $this->db->trans_rollback();
            echo $this->ajax_error_form('가입실패');
        }
    }




}
