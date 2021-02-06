<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
	public function up()
	{
		/*
         * Kelas
         */
		$this->forge->addField([
			'class_id'         => ['type' => 'tinyint', 'constraint' => 3, 'null' => false, 'auto_increment' => true],
			'class_name'       => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
		]);
		$this->forge->addKey('class_id', true);
		$this->forge->createTable('classes', true);


		/*
         * Jurusan
         */
		$this->forge->addField([
			'major_id'         => ['type' => 'tinyint', 'constraint' => 3, 'null' => false, 'auto_increment' => true],
			'major_name'       => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
		]);
		$this->forge->addKey('major_id', true);
		$this->forge->createTable('majors', true);


		/*
         * Seluruh mapel
         */
		$this->forge->addField([
			'study_id'        => ['type' => 'tinyint', 'constraint' => 3, 'null' => false, 'auto_increment' => true],
			'study_name'      => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
		]);
		$this->forge->addKey('study_id', true);
		$this->forge->createTable('studies', true);


		/*
         * Pelajaran per kelas dan jurusan
         */
		$this->forge->addField([
			'id'           => ['type' => 'tinyint', 'constraint' => 3, 'null' => false, 'auto_increment' => true],
			'study_id'	 	=> ['type' => 'tinyint', 'constraint' => 3, 'null' => false],
			'major_id'	   => ['type' => 'tinyint', 'constraint' => 3, 'null' => false],
			'class_id'	   => ['type' => 'tinyint', 'constraint' => 3, 'null' => false],
			'teacher_id'   => ['type' => 'tinyint', 'constraint' => 3, 'null' => false],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('study_id', 'studies', 'study_id');
		$this->forge->addForeignKey('major_id', 'majors', 'major_id');
		$this->forge->addForeignKey('class_id', 'classes', 'class_id');
		$this->forge->createTable('lesson_map', true);


		/*
         * Siswa
         */
		$this->forge->addField([
			'student_id'         => ['type' => 'int', 'constraint' => 5],
			'nisn'               => ['type' => 'varchar', 'constraint' => 15,],
			'nis'                => ['type' => 'varchar', 'constraint' => 20,],
			'full_name'          => ['type' => 'varchar', 'constraint' => 255, 'unsigned' => false],
			'place_of_birth'     => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
			'date_of_birth'      => ['type' => 'date', 'null' => true],
			'major_id'	   		=> ['type' => 'tinyint', 'constraint' => 3, 'null' => false],
			'class_id'	   		=> ['type' => 'tinyint', 'constraint' => 3, 'null' => false],
			'gender'			      => ['type' => 'enum', 'constraint' => ['M', 'F']],
			'created_at'         => ['type' => 'datetime', 'null' => false, 'value' => 'current_timestamp'],
			'updated_at'         => ['type' => 'datetime', 'null' => true, 'value' => 'current_timestamp on update current_timestamp'],
			'status'             => ['type' => 'tinyint', 'default' => 1]
		]);
		$this->forge->addKey('student_id', true);
		$this->forge->addForeignKey('major_id', 'majors', 'major_id');
		$this->forge->addForeignKey('class_id', 'classes', 'class_id');
		$this->forge->createTable('students', true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		if($this->db->DBDriver != 'SQLite3'){
			$this->forge->dropForeignKey('students', 'students_class_id_foreign');
			$this->forge->dropForeignKey('students', 'students_major_id_foreign');
			$this->forge->dropForeignKey('lesson_map', 'lesson_map_class_id_foreign');
			$this->forge->dropForeignKey('lesson_map', 'lesson_map_major_id_foreign');
			$this->forge->dropForeignKey('lesson_map', 'lesson_map_study_id_foreign');
		}
		$this->forge->dropTable('classes');
		$this->forge->dropTable('majors');
		$this->forge->dropTable('studies');
		$this->forge->dropTable('lesson_map');
		$this->forge->dropTable('students');
	}
}
