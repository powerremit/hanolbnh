<?php
require_once APPPATH . 'controllers/common/CommonLoader.php';

class Contact extends CommonLoader
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('email'); // Email 라이브러리 로드
    }



}
