<?php
/**
 * File Name: admin.php
 * Writer:    fanxr
 * Date:      2013年3月1日
 * Time:      10点43分
 * Contact:   taglete@gmail.com
 */

//管理界面各种功能控制器
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //admin管理界面
        $this->load->helper('url');
        $this->load->view('admin');
    }

    public function addsites()
    {
        //增加站点的方法
        $this->load->database();
        $this->siteinfo['url'] = $this->input->get_post('url');
        $this->siteinfo['title'] = $this->input->get_post('title');
        $this->siteinfo['short_desc'] = $this->input->get_post('short_desc');
        $this->db->insert('sites', $this->siteinfo);
        echo json_encode($this->siteinfo);
    }

    public function curltest()
    {
        $url = "http://xrong.net";
        $ch = curl_init($url);
        $fp = fopen("homepage.txt", "w");
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }
}
