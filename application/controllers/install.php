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
        //Just a test comment
        $query = "create table `sites` (
                    `site_id` int(10) not null auto_increment,
                    `url` varchar(255) not null,
                    `title` varchar(255) not null,
                    `short_desc` text not null,
                    `indexdata` timestamp default CURRENT_TIMESTAMP,
                    primary key(`site_id`)
                    )";

        $this->db->query($query);
        $this->load->view('install');
    }
}
