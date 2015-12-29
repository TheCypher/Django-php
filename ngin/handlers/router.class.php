<?php 
namespace Ngin\Handlers;
/**
* phpNgin - simple PHP framework
*
* @package	phpNgin
* @author 	Nickson Ariemba
* @version 	Alpha 1.0
*
*/

/**
* router
*/
class Router
{
	/**
	* Check if controller exists
	* @param array
	* @return array
	*/
	protected function checkController($page)
	{
		$controllerPath = __SITE_PATH . '/app/controllers/'.$page['page'].'.controller.php';
		
		if (file_exists($controllerPath)) {
			$controller = $page['controller'].'Controller';
			$return = [
				'check'=>"1", 
				'controllerPath'=>"$controllerPath",
				'controller'=>"$controller"
			];
		}
		else
		{
			$errorControllerPath = __SITE_PATH . '/app/controllers/nginControllers/error.controller.php';
			$return = [
				'check'=>"0", 
				'controllerPath'=>"$errorControllerPath",
				'controller'=>"ErrorController"
			];
		}
		return($return);
	}


	/**
	* Get controller
	* @param array
	*/
	protected function getController($page)
	{
		$page['controller'] = ucfirst($page['page']);
		$checkController = self::checkController($page);

		$baseController = __SITE_PATH . '/app/ngin/base.controller.class.php';
		include_once $baseController;

		switch ($checkController['check']) {
			case '1':
				include_once $checkController['controllerPath'];
				$controller = $checkController['controller'];
				$controller = new $controller();

				$view = __SITE_PATH . '/app/views/'.$page['page'].'.html.php';
				$controller->index($view);
			break;
			
			case '0':
				include_once $checkController['controllerPath'];
				$controller = $checkController['controller'];
				$controller = new $controller();

				$viewPath = __SITE_PATH . '/app/views/nginViews/error.html.php';
				$view = [
					'view'=>"$viewPath",
					'error'=> 'INVALID CONTROLLER <b>"'.ucfirst($page['page']).'"</b> </br>'
				];
				$controller->index($view);
			break;
		}
	}
}
?>