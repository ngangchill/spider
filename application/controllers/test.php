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
        $this->load->library('calendar');
        $reflect = new ReflectionClass('CI_Calendar');
        echo $reflect->getStartLine();
        $path = $reflect->getFileName();
        $temp = @file($path);
        echo $reflect->getEndLine();
        $len = $reflect->getEndLine() - $reflect->getStartLine() + 1;
        echo implode(array_slice($temp, $reflect->getStartLine() - 1, $len));
        // foreach ($func->getParameters() as $param)
        // {
        //     echo $param,'<br>';
        // }
    }
}
