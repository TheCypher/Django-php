<?php
namespace Project\Home\Views;
/**
* Views
*/
class Home
{
	public function index()
	{
		$renderToPage = [
			'title'=>"This is the index page",
			'about'=>"I dont know what to do right now"
		];

		return ['template'=>"home/index.html", 'renderToPage'=>$renderToPage];
	}

	public function about()
	{
		$renderToPage = [
			'title'=>"This is the about page",
			'about'=>"I dont know what to do right now"
		];

		return ['template'=>"home/about.html", 'renderToPage'=>$renderToPage];
	}
}
?>