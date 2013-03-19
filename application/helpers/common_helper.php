<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//获取目标页面的编码
function getCharset($ch, $pageContent)
{
    $charset = '';
    $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
    preg_match('|(text/html;)?\s*charset=(.*)|i', $contentType, $match);
    if (isset($match[2]))
    {
        $charset = $match[2];
    }
    else
    {
        preg_match('|<meta[^>]+charset="(.*)".*/>|i', $pageContent, $match);
        if (isset($match[1]))
        {
            $charset = $match[1];
        }
    }
    return $charset;
}
