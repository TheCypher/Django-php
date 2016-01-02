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
use Project\Settings as ProjectSettingsClass;
use Project\Urls as ProjectUrlsClass;

/**
* Start
*/
class Start
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
	private $urlExist = [
		'url'=>False, 
		'app'=>"appName", 
		'view'=>"/url"
	];


	/**
	* Does App exist 
	* True or False
	*/
	private $appExist = [
		'app'=>False, 
		'installed'=>False
	];


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
			return print_r('This URL "/'.$pages['2'].'" is not defined');
		}


		# Check if app is installed
		if (!$this->appExist['installed']) {
			# If app is not installed return and print this
			return print_r('This app "'.$this->urlExist['app'].'" is not installed');
		}


		# Check if app exists, 
		if ($this->appExist['app']) {
			# Then check if it is installed in the "mysite->settings page"
			$this->appExist['installed'];
			print_r($this->urlExist['view']);
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
	private function checkApp($app)
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

		// echo "<br>";
		// print_r($this->urlExist);
	}
}
?>