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
        $this->load->database();
        $dbarray = array();
        $this->load->library('crawling');
        $pageContent = $this->crawling->getPageContent('http://mobile.163.com');
        $urls = $this->crawling->filterUrls($pageContent['content']);
        foreach ($urls as $key => $value)
        {
            $dbarray[] = array(
                'url' => $key,
                'title' => iconv($pageContent['charset'], 'utf-8', $value),
                'md5' => md5($key),
            );
        }

        $this->db->insert_batch('sites', $dbarray);
    }

    public function gettitle()
    {
        $this->load->library('crawling');
        $url = 'http://mobile.163.com/';
        echo $this->crawling->getTitle($url);
    }

    public function test()
    {
        $this->load->library('crawling');
        $info = $this->crawling->getUrlContent('http://mobile.163.com');
        print_r($info);
    }
}
