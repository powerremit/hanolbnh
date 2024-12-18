<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mypage extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('course_lang');
    }


	public function index()
	{

		if(!isset($this->session->idx)) {
			redirect('/');
		}

        $data['title'] = 'main';
//        $data['includes'] = $this->load->view('/front/include/includes', '', true);
        $data['header'] = $this->load->view('/front/include/header', '', true);
//        $data['aside'] = '';
        $data['contents'] = $this->load->view('/front/content/mypage_view', '', true);
        $data['common_js'] = $this->load->view('/front/content_js/include/common_js', '', true);
        $data['contents_js'] = $this->load->view('/front/content_js/mypage_js', '', true);
        $data['footer'] = $this->load->view('/front/include/footer', '', true);
		$this->load->view(__VIEW_PATH_LAYOUT, $data);
	}

}
