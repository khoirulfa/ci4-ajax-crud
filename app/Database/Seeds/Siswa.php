<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Siswa extends Seeder
{
	public function run()
	{	
		// Majors
		$majors = [
			['major_name' => 'IPA'],
			['major_name' => 'IPS'],
			['major_name' => 'BAHASA'],
		];
		$this->db->table('majors')->insertBatch($majors);

		// Classes
		$classes = [
			['class_name' => 'X'],
			['class_name' => 'XI'],
			['class_name' => 'XII'],
		];
		$this->db->table('classes')->insertBatch($classes);
	}
}
