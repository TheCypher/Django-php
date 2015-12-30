<?php
/**
* phpNgin - simple PHP framework
*
* @package	phpNgin
* @author 	Nickson Ariemba
* @version 	Alpha 1.0
*
*/

/**
* baseController
*/

Abstract class BaseController
{
	/**
	* All controllers must have an index method
	*/
	abstract function index($view);
}
?>