<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 12-12-5
 * Time: 下午2:42
 * To change this template use File | Settings | File Templates.
 */

class Pages extends CI_Controller {
    public function view($page = 'home') {
        if (! file_exists('application/views/pages'.$page.'.php')){
            show_404();
        }
        $date['title'] = ucfirst($page);
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}