<?php namespace App\Controllers;

use App\Models\siswaModel;

class Siswa extends BaseController
{
	protected $siswaModel;
	public function __construct()
	{
		$this->siswaModel = new siswaModel();
	}

	public function index()
	{
		$data = [
			'pageTitle' => 'Tabel Data Siswa',
			'title' 		=> 'Data Siswa',
		];

		return view('siswa/index', $data);
	}

	public function getData()
	{
		if ($this->request->isAJAX()) {
			$metaData = [
				'students'	=> $this->siswaModel->findAll()
			];

			$message = [
				'data' => view('siswa/viewdata', $metaData)
			];

			echo json_encode($message);
		} else{
			exit('Request cannot be processed');
		};
	}

	public function addData()
	{
		if ($this->request->isAJAX()) {
			$message = [
				'data' => view('siswa/addmodal')
			];

			echo json_encode($message);
		} else {
			exit('Request cannot be processed');
		};
	}

	public function getDataForm()
	{
		return [
			'nis'			=> $this->request->getVar('nis'),
			'nisn'		=> $this->request->getVar('nisn'),
			'nama'		=> $this->request->getVar('nama'),
			'tem_lahir'	=> $this->request->getVar('tem_lahir'),
			'tan_lahir'	=> $this->request->getVar('tan_lahir'),
			'kelas'		=> $this->request->getVar('kelas'),
			'jurusan'	=> $this->request->getVar('jurusan'),
			'j_kelamin'	=> $this->request->getVar('j_kelamin'),
			'alamat'		=> $this->request->getVar('alamat'),
		];
	}

	public function savedata()
	{
		if ($this->request->isAJAX()) {
			$validation = \Config\Services::validation();

			$valid = $this->validate(
				$this->siswaModel->getValidationRules(),
				$this->siswaModel->getValidationMessages()
			);

			if(!$valid){
				$message = [  
					'error' => [
						'nis' 	=> $validation->getError('nis'),
						'nisn'	=> $validation->getError('nisn'),
						'nama'	=> $validation->getError('nama'),
					] 
				];
			} else {
				$formData = $this->getDataForm();
				$query = new siswaModel();
				$query->insert($formData);

				$message = [
					'sukses' => 'Success inserting data'
				];
			};
			echo json_encode($message);

		} else {
			exit('Request cannot be processed');
		};
	}

	//--------------------------------------------------------------------

}
