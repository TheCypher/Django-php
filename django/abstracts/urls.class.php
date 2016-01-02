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
}
?>