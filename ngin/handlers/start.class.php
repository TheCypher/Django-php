<?php 
namespace Ngin\Handlers;
//include'router.class.php';
/**
*
* @package	phpNgin
* @author 	Nickson Ariemba
* @version 	Alpha 1.0
*
*/

/**
* Start
*/
class Start
{
	/**
	* get requested page
	* @param string
	* @return string
	*/
	public function getPage($page)
	{
		$url = parse_url($page);
		$pages = explode('/', $url['path']);
		print_r($pages['2']);
	}
}
?>