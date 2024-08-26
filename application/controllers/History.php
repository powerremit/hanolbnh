<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {


    public function __construct(){
        parent::__construct();
        $this->lang->load('history_lang');
    }
	public function index()
	{
        $data['title'] = 'main';
//        $data['includes'] = $this->load->view('/front/include/includes', '', true);
        $data['header'] = $this->load->view('/front/include/header', '', true);
//        $data['aside'] = '';
        $data['contents'] = $this->load->view('/front/content/history', '', true);
//        $data['common_js'] = $this->load->view('/front/content_js/include/common_js', '', true);
//        $data['contents_js'] = $this->load->view('/front/content_js/main_js', $data, true);
        $data['footer'] = $this->load->view('/front/include/footer', '', true);
		$this->load->view(__VIEW_PATH_LAYOUT, $data);
	}

    function vietnam () {
        $data['title'] = 'main';
//        $data['includes'] = $this->load->view('/front/include/includes', '', true);
        $data['header'] = $this->load->view('/front/include/header', '', true);
//        $data['aside'] = '';
        $data['contents'] = $this->load->view('/front/content/history/vietnam_view', '', true);
//        $data['common_js'] = $this->load->view('/front/content_js/include/common_js', '', true);
//        $data['contents_js'] = $this->load->view('/front/content_js/main_js', $data, true);
        $data['footer'] = $this->load->view('/front/include/footer', '', true);
        $this->load->view(__VIEW_PATH_LAYOUT, $data);
    }
    function mongolia () {
        $data['title'] = 'main';
//        $data['includes'] = $this->load->view('/front/include/includes', '', true);
        $data['header'] = $this->load->view('/front/include/header', '', true);
//        $data['aside'] = '';
        $data['contents'] = $this->load->view('/front/content/history/mongolia_view', '', true);
//        $data['common_js'] = $this->load->view('/front/content_js/include/common_js', '', true);
//        $data['contents_js'] = $this->load->view('/front/content_js/main_js', $data, true);
        $data['footer'] = $this->load->view('/front/include/footer', '', true);
        $this->load->view(__VIEW_PATH_LAYOUT, $data);
    }
    function iran () {
        $data['title'] = 'main';
//        $data['includes'] = $this->load->view('/front/include/includes', '', true);
        $data['header'] = $this->load->view('/front/include/header', '', true);
//        $data['aside'] = '';
        $data['contents'] = $this->load->view('/front/content/history/iran_view', '', true);
//        $data['common_js'] = $this->load->view('/front/content_js/include/common_js', '', true);
//        $data['contents_js'] = $this->load->view('/front/content_js/main_js', $data, true);
        $data['footer'] = $this->load->view('/front/include/footer', '', true);
        $this->load->view(__VIEW_PATH_LAYOUT, $data);
    }
    function malaysia () {
        $data['title'] = 'main';
//        $data['includes'] = $this->load->view('/front/include/includes', '', true);
        $data['header'] = $this->load->view('/front/include/header', '', true);
//        $data['aside'] = '';
        $data['contents'] = $this->load->view('/front/content/history/malaysia_view', '', true);
//        $data['common_js'] = $this->load->view('/front/content_js/include/common_js', '', true);
//        $data['contents_js'] = $this->load->view('/front/content_js/main_js', $data, true);
        $data['footer'] = $this->load->view('/front/include/footer', '', true);
        $this->load->view(__VIEW_PATH_LAYOUT, $data);
    }
    function indonesia () {
        $data['title'] = 'main';
//        $data['includes'] = $this->load->view('/front/include/includes', '', true);
        $data['header'] = $this->load->view('/front/include/header', '', true);
//        $data['aside'] = '';
        $data['contents'] = $this->load->view('/front/content/history/indonesia_view', '', true);
//        $data['common_js'] = $this->load->view('/front/content_js/include/common_js', '', true);
//        $data['contents_js'] = $this->load->view('/front/content_js/main_js', $data, true);
        $data['footer'] = $this->load->view('/front/include/footer', '', true);
        $this->load->view(__VIEW_PATH_LAYOUT, $data);
    }
    function pakistan () {
        $data['title'] = 'main';
//        $data['includes'] = $this->load->view('/front/include/includes', '', true);
        $data['header'] = $this->load->view('/front/include/header', '', true);
//        $data['aside'] = '';
        $data['contents'] = $this->load->view('/front/content/history/pakistan_view', '', true);
//        $data['common_js'] = $this->load->view('/front/content_js/include/common_js', '', true);
//        $data['contents_js'] = $this->load->view('/front/content_js/main_js', $data, true);
        $data['footer'] = $this->load->view('/front/include/footer', '', true);
        $this->load->view(__VIEW_PATH_LAYOUT, $data);
    }
}
