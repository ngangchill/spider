<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crawling
{
    public $url;
    public function getUrlContent($url)
    {
        $handle = fopen($url, "r");
        if ($handle)
        {
            $content = stream_get_contents($handle, 1024*1024);
            return $content;
        } 
        else
        {
            return false;
        }
    }

    public function filterUrls($content)
    {
        $reg = '|<a.*href="(.*)".*>.*</[^>]+>|U';
        if (preg_match_all($reg, $content, $results))
        {
            return $results[1];
        }
    }
}
