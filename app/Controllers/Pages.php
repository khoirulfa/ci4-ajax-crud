<?php namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		$metaData = [
			'pageTitle' => 'Dashboard',
			'title' => 'Selamat Datang'
		];
		return view('index', $metaData);
	}

	//--------------------------------------------------------------------

}
