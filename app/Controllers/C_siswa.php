<?php namespace App\Controllers;

use App\Models\M_siswa;

class C_siswa extends BaseController
{
	protected $siswaModel;
	public function __construct()
	{
		$this->siswaModel = new M_siswa();
	}

	public function index()
	{
		$metaData = [
			'pageTitle' => 'Tabel Data Siswa',
			'title' 		=> 'Data Siswa',
			'students'	=> $this->siswaModel->findAll()
		];
		return view('siswa/index', $metaData);
	}

	//--------------------------------------------------------------------

}
