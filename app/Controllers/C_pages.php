<?php namespace App\Controllers;

class C_pages extends BaseController
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
