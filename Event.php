<?php
/**
 * @package   ImpressPages
 */
 
namespace Plugin\Jquery1x;

class Event
{
    public static function ipBeforeController()
    {        
        if(!ipIsManagementState())
        {
            $ieOnly = ipGetOption('Jquery1x.ieOnly');
            
            if(
                ($ieOnly == "Yes" && preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'])) || 
                ($ieOnly == "UnderIE9" && preg_match('/MSIE ([0-8]{1,}[\.0-8]{0,});/', $_SERVER['HTTP_USER_AGENT']))
            )
            {
                \Ip\ServiceLocator::pageAssets()->removeJavaScript(ipFileUrl('Ip/Internal/Core/assets/ipCore/jquery.js'));
                ipAddJs('http://code.jquery.com/jquery-1.11.1.min.js', null, 10);
            } 
        }      
    }
}
