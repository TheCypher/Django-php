<?php
namespace Project;

$site_path = realpath(dirname(__FILE__));
include($site_path.'/../../vendor/autoload.php');

use Django\Abstracts\Settings as DjangoSettings;
/**
* Project settings
*/
Class Settings extends DjangoSettings
{
	/**
	* Application definition
	*/	
	public function INSTALLED_APPS()
	{
		return $apps = [
			'home',
			'nick'
		];	
	}
}
?>