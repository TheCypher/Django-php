<?php
namespace Django\Abstracts;
/**
*
* @package	phpNgin
* @author 	Nickson Ariemba
* @version 	Alpha 1.0
*
*/

/**
* Abstract settings
*/
Abstract class Urls
{
	/**
	* Application definition
	*/	
	abstract function urlPatterns($url);

	/**
	* check if requested url is defined
	* @param string, array
	* @return array or bool
	*/
	protected function checkUrl($url, $urlpatterns)
	{
		if (array_key_exists($url, $urlpatterns)) {
			return [
				'url'=>True,
				'app'=>$urlpatterns[$url][0],
				'view'=>$urlpatterns[$url][1]
			];
		}
		else
		{
			return False;
		}
	}
}
?>