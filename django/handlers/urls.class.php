<?php
namespace Ngin\Handlers;
/**
* phpNgin - simple PHP framework
*
* @package	phpNgin
* @author 	Nickson Ariemba
* @version 	Alpha 1.1
*/

/**
* Url handler
*/
class Url extends AnotherClass
{
	/**
	* Get requested app url
	* @param string
	* @return string
	*/
	public function getRequestedAppUrl($url)
	{
		$parsedUrl = parse_url($url);
		$requestedApp = explode('/', $parsedUrl['path']);
		return $requestedApp[2];
	}
}
?>