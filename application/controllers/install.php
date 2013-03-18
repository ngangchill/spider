<?php

class Install extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); $this->load->dbforge(); }

    public function index()
    {
        error_reporting(E_ALL);
        //使用数据库维护类的时候，无法指定timestamp的默认类型为CURRENT_TIMESTAMP
        $query = "create table `sites` (
                    `site_id` int(10) not null auto_increment,
                    `url` varchar(255) not null,
                    `title` varchar(255) not null,
                    `addtime` timestamp default CURRENT_TIMESTAMP,
                    `md5` varchar(32) not null,
                    primary key(`site_id`)
                    )";

        $this->db->query($query);
        $this->load->view('install');
    }
}
