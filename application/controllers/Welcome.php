<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct(){
        parent::__construct();
        $this->lang->load('main_lang');
    }

    public function index()
	{
        $data['title'] = 'main';
//        $data['includes'] = $this->load->view('/front/include/includes', '', true);
        $data['header'] = $this->load->view('/front/include/header', '', true);
//        $data['aside'] = '';
        $data['contents'] = $this->load->view('/front/main', '', true);
//        $data['common_js'] = $this->load->view('/front/content_js/include/common_js', '', true);
//        $data['contents_js'] = $this->load->view('/front/content_js/main_js', $data, true);
        $data['footer'] = $this->load->view('/front/include/footer', '', true);
		$this->load->view(__VIEW_PATH_LAYOUT, $data);
	}
}
