<?php
namespace Project;

$site_path = realpath(dirname(__FILE__));
include($site_path.'/../../vendor/autoload.php');

use Django\Abstracts\Urls as DjangoUrls;
use Project\Home\Views\Home as HomeViews;


/**
* Project URLS
*/
class Urls extends DjangoUrls
{
	public $homeViews;

	function __construct()
	{
		$this->homeViews = new HomeViews();	
	}
	

	/**
	* 
	* @param String
	*/
	public function urlPatterns($url)
	{
		$urlpatterns = [
			#'page'=>['app', $this->appViewsClass->view()],
			'index'=>['home', $this->homeViews->index()]
		];
		return self::checkUrl($url, $urlpatterns);
	}


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