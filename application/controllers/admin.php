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
        $this->load->helper('url');
        $this->load->view('sites');
    }
}