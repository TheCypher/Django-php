<?php 
namespace Django\Start;
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
	* Does URL exist 
	* True or False
	*/
	private $urlExist = [];


	/**
	* Does App exist 
	* True or False
	*/
	private $appExist = [];


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


		# Check if app exists, 
		if ($this->appExist['app']) {
			# Then check if it is installed in the "mysite->settings page"
			print_r($this->appExist['installed']);
		}
		else
		{
			# If not return and print this
			return print_r('This app "'.$this->urlExist['app'].'" does not exist');
		}


		# Check if app is installed
		if ($this->appExist['installed']) {
			# Then get app views
			/* This method is not yet created */
			$this->getAppView($this->appExist['app']);
		}
		else
		{
			# If app is nor installed return and print this
			return print_r('This app "'.$this->urlExist['app'].'" is not installed');
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
		$this->urlExist = ['url'=>True, 'app'=>"nick"];
	}


	/**
	* Check if app exists
	* @param string
	* @return idk yet
	*/
	private function checkApp($app)
	{
		// $this->app = new App($app);
		$this->appExist = ['app'=>True, 'installed'=>False];
	}
}
?>