<?php 
namespace Django\Start;
/**
*
* @package	phpNgin
* @author 	Nickson Ariemba
* @version 	Alpha 1.0
*
*/

include('vendor/autoload.php');
use Project\Settings as ProjectSettings;

/**
* Start
*/
class Start
{
	/**
	* Does URL exist 
	* True or False
	*/
	private $urlExist = [];


	/**
	* Does App exist 
	* True or False
	*/
	private $appExist = ['app'=>False, 'installed'=>False];


	/**
	* get requested page
	* @param string
	* @return string
	*/
	public function load($page)
	{
		$url = parse_url($page);
		$pages = explode('/', $url['path']);
		$this->checkUrl($pages['2']);
		
		# Check if url exists
		if ($this->urlExist['url']) {
			# Then check if app listed in the Url exists
			$this->checkApp($this->urlExist['app']);	
		}
		else
		{
			# If not return and print this
			return print_r('This URL does not exist');
		}


		# Check if app is installed
		if ($this->appExist['installed']) {
			# Then get app views
			/* This method is not yet created */
			//$this->getAppView($this->appExist['app']);
		}
		else
		{
			# If app is nor installed return and print this
			return print_r('This app "'.$this->urlExist['app'].'" is not installed');
		}


		# Check if app exists, 
		if ($this->appExist['app']) {
			# Then check if it is installed in the "mysite->settings page"
			$this->appExist['installed'];
		}
		else
		{
			# If not return and print this
			return print_r('This app "'.$this->urlExist['app'].'" does not exist');
		}
	}


	/**
	* Check if URL is set
	* @param string
	* 
	* The urlExist will return and ['url'=>True or False, 'App'=>"What the app the URL is requesting"]
	*/
	private function checkUrl($url)
	{
		// $this->urlExist = new Urls($url);
		$this->urlExist = ['url'=>True, 'app'=>"home"];
	}


	/**
	* Check if app exists
	* @param string
	* @return idk yet
	*/
	private function checkApp($app)
	{
		$site_path = realpath(dirname(__FILE__));
		$ProjectSettings = new ProjectSettings();
		
		# Check if app is installed
		if (in_array($app, $ProjectSettings->INSTALLED_APPS())) {
			$this->appExist['installed'] = True;
		}
		
		# Check if app exist
		if (is_dir($site_path.'/../../site/'.$app)) {
			$this->appExist['app'] = True;
		}

		print_r($this->appExist);
	}
}
?>