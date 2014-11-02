<?php
/**
 * @package   ImpressPages
 */
 
namespace Plugin\Jquery1x;

class Event
{
    public static function ipBeforeController()
    {
        if(preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT']) && !ipIsManagementState())
        {
            \Ip\ServiceLocator::pageAssets()->removeJavaScript(ipFileUrl('Ip/Internal/Core/assets/ipCore/jquery.js'));
            ipAddJs('http://code.jquery.com/jquery-1.11.1.min.js', null, 10);
        }      
    }
}
