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
	* @return array or bool
	*/
	public function urlPatterns($url)
	{
		$urlpatterns = [
			#'page'=>['app', $this->appViewsClass->view()],
			'index'=>['home', $this->homeViews->index()],
			'about'=>['home', $this->homeViews->about()]
		];
		return self::checkUrl($url, $urlpatterns);
	}
}
?>