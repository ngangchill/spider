<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * @author Me
 * @version $Id$
 * @copyright Me, 24 March, 2013
 * @package default
 **/

class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->library('simple_html_dom');
        $raw = file_get_html('http://www.baidu.com');
        foreach ($raw->find('a') as $element) 
        {
            echo $element->href. '<br>';
        }
    }

    public function reflect()
    {
        $this->load->library('simple_html_dom');
        $temp = new ReflectionClass($this->simple_html_dom);
        Reflection::export($temp);
    }
}
