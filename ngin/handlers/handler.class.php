<?php 
namespace Ngin\Handlers;
include'router.class.php';
/**
* phpNgin - simple PHP framework
*
* @package	phpNgin
* @author 	Nickson Ariemba
* @version 	Alpha 1.0
*
*/

/**
* Start
*/
class Start extends Router
{
	/**
	* get and set needed page files
	* @param
	* @return IDK yet
	*/
	public function loadPage($page)
	{
		$controller = self::getController($page);
	}
}
?>