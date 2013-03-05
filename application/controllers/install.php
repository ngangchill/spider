<?php

class Install extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function index()
    {
        error_reporting(E_ALL);
        $fields = array(
                      'site_id' => array(
                                       'type'           => 'int',
                                       'constraint'     => 10,
                                       'auto_increment' => true),
                      'url'     => array(
                                       'type'       => 'varchar',
                                       'constraint' => 255),
                      'title'   => array(
                                       'type'       => 'varchar',
                                       'constraint' => 255 ),
                   'short_desc' => array(
                                       'type' => 'text'),
                    'indexdate' => array(
                                       'type' => 'date'),
                  );
        $this->dbforge->add_key('site_id', true);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('sites');
        $this->load->view('install');
        }
    }
