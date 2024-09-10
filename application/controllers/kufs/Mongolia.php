<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mongolia extends CI_Controller
{

    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $year = $this->uri->segment(3);
        if(is_null($year)) {
            $year = '2016';
        }
        $data = array(
            'year' => $year,
        );
        $data['title'] = 'main';
//        $data['includes'] = $this->load->view('/front/include/includes', '', true);
        $data['header'] = $this->load->view('/front/include/header', '', true);
//        $data['aside'] = '';
        $data['contents'] = $this->load->view('/front/content/kufs_mongolia_view', $data, true);
        $data['common_js'] = $this->load->view('/front/content_js/include/common_js', '', true);
        $data['contents_js'] = $this->load->view('/front/content_js/kufs_mongolia_js', $data, true);
        $data['footer'] = $this->load->view('/front/include/footer', '', true);
        $this->load->view(__VIEW_PATH_LAYOUT, $data);
    }

    function festival () {
        $data['title'] = 'main';
//        $data['includes'] = $this->load->view('/front/include/includes', '', true);
        $data['header'] = $this->load->view('/front/include/header', '', true);
//        $data['aside'] = '';
        $data['contents'] = $this->load->view('/front/content/kufs_mongolia_fest_view', '', true);
        $data['common_js'] = $this->load->view('/front/content_js/include/common_js', '', true);
        $data['contents_js'] = $this->load->view('/front/content_js/kufs_mongolia_fest_js', '', true);
        $data['footer'] = $this->load->view('/front/include/footer', '', true);
        $this->load->view(__VIEW_PATH_LAYOUT, $data);
    }

    // 2017 페이지 라우팅 설정, routes.php
    public function year($year) {
        if ($year == '2017') {
            $data = array(
                'year' => $year,
            );
            $data['title'] = 'Mongolia 2017';
            $data['header'] = $this->load->view('/front/include/header', '', true);
            $data['contents'] = $this->load->view('/front/content/kufs_mongolia_2017_view', $data, true);
            $data['common_js'] = $this->load->view('/front/content_js/include/common_js', '', true);
            $data['contents_js'] = $this->load->view('/front/content_js/kufs_mongolia_2017_js', $data, true);
            $data['footer'] = $this->load->view('/front/include/footer', '', true);

            $this->load->view(__VIEW_PATH_LAYOUT, $data);
        } else {
            show_404();
        }
    }


}
