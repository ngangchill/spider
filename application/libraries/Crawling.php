<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crawling
{
    public $url;

    //获取页面内容与页面编码，供其它函数使用
    public function getPageContent($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $pageContent = curl_exec($ch);
        $charset = getCharset($ch, $pageContent);
        $results = array(
            'content' => $pageContent,
            'charset' => $charset,
        );
        curl_close($ch);
        return $results;
    }

    public function filterUrls($content)
    {
        $reg = '|<a.*href="(http://mobile.163.com/\d{2}/\d{4}/\d{2}/\w{16}.html)".*>(.*)</a>|U'; //过滤出所有a标签
        // $reg = '|http://mobile.163.com/\d{2}/\d{4}/\d{2}/\w{16}.html|U'; //过滤所有文章页
        if (preg_match_all($reg, $content, $results))
        {
            // return $results;
            return array_combine($results[1], $results[2]);
        }
    }

    public function getTitle($url)
    {
        $reg = '|<title>(.*)</title>|';
        if (preg_match($reg, $this->getUrlContent($url), $result))
        {
            return $result[1];
        }
    }
}
