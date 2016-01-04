<?php
namespace Django\Start;

include('vendor/autoload.php');
use Project\Settings as ProjectSettingsClass;
use Project\Urls as ProjectUrlsClass;
/**
* Render
*/
class Render
{

	private $projectSettings;
	private $projectUrls;

	function __construct()
	{
		$this->projectSettings = new ProjectSettingsClass;
		$this->projectUrls = new ProjectUrlsClass;
	}


	/**
	* Does URL exist 
	* True or False
	*/
	protected $urlExist = [
		'url'=>False, 
		'app'=>"appName", 
		'view'=>"/url"
	];


	/**
	* Does App exist 
	* True or False
	*/
	protected $appExist = [
		'app'=>False, 
		'installed'=>False
	];

	/**
	* Check if URL is set
	* @param string
	* 
	* The urlExist will return and ['url'=>True or False, 'App'=>"What the app the URL is requesting"]
	*/
	protected function checkUrl($url)
	{
		$urlPLusView = $this->projectUrls->urlPatterns($url);

		$this->urlExist['url'] =  $urlPLusView['url'];
		$this->urlExist['app'] = $urlPLusView['app'];
		$this->urlExist['view'] = $urlPLusView['view'];
	}


	/**
	* Check if app exists
	* @param string
	* @return idk yet
	*/
	protected function checkApp($app)
	{
		$site_path = realpath(dirname(__FILE__));
		
		# Check if app is installed
		if (in_array($app, $this->projectSettings->INSTALLED_APPS())) {
			$this->appExist['installed'] = True;
		}
		
		# Check if app exist
		if (is_dir($site_path.'/../../site/'.$app)) {
			$this->appExist['app'] = True;
		}
	}


	/**
	* Check if requested template view exists
	* @param string
	* @return bool
	*/
	protected function checkView($view)
	{
		$site_path = realpath(dirname(__FILE__));
		if (file_exists($site_path.'/../../site/templates/'.$view)) {
			return True;
		}
	}


	/**
	* Render requested template view
	* @param array
	*/
	protected function renderView($view)
	{
		$site_path = realpath(dirname(__FILE__));
		$load = $view['renderToPage'];
		include($site_path.'/../../site/templates/'.$view['template']);
	}
}
?>