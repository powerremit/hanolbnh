<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {


	public function index()
	{
        $data['title'] = 'main';
//        $data['includes'] = $this->load->view('/front/include/includes', '', true);
        $data['header'] = $this->load->view('/front/include/header', '', true);
//        $data['aside'] = '';
        $data['contents'] = $this->load->view('/front/content/contact_view', '', true);
        $data['common_js'] = $this->load->view('/front/content_js/include/common_js', '', true);
        $data['contents_js'] = $this->load->view('/front/content_js/contact_js', '', true);
        $data['footer'] = $this->load->view('/front/include/footer', '', true);
		$this->load->view(__VIEW_PATH_LAYOUT, $data);
	}
}
