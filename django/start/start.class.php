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
use Django\Start\Render as Render;

/**
* Start
*/
class Start extends Render
{
	/**
	* get requested page
	* @param string
	* @return string
	*/
	public function load($page)
	{
		$url = parse_url($page);
		$pages = explode('/', $url['path']);
		self::checkUrl($pages['2']);
		
		# Check if url exists
		if ($this->urlExist['url']) {
			# Then check if app listed in the Url exists
			self::checkApp($this->urlExist['app']);	
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
			$view = $this->urlExist['view'];

			if (!self::checkView($view['template'])) {
				return print('This template "'.$view['template'].'" does not exist.');
			}
			self::renderView($view);
		}
		else
		{
			# If not return and print this
			return print_r('This app "'.$this->urlExist['app'].'" does not exist');
		}
	}
}
?>