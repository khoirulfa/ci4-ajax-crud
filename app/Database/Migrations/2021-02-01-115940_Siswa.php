<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
   // public function up()
   // {
   //    /*
   // 	 * Siswa table
   // 	 */
   //    $this->forge->addField([
   //       'id'                 => [
   //          'type'            => 'int',
   //          'constraint'      => 5
   //       ],
   //       'nisn'               => [
   //          'type'            => 'varchar',
   //          'constraint'      => 15,
   //       ],
   //       'nis'                => [
   //          'type'            => 'varchar',
   //          'constraint'      => 20,
   //       ],
   //       'nama'               => [
   //          'type'            => 'varchar',
   //          'constraint'      => 255,
   //          'unsigned'        => false
   //       ],
   //       'tempat_lahir'       => [
   //          'type'            => 'varchar',
   //          'constraint'      => 100,
   //          'null'            => true
   //       ],
   //       'tanggal_lahir'      => [
   //          'type'            => 'date',
   //          'null'            => true
   //       ],
   //       'kelas_id_kelas'     => [
   //          'type'            => 'tinyint',
   //          'null'            => true
   //       ],
   //       'jurusan_id_jurusan' => [
   //          'type'            => 'tinyint'
   //       ],
   //       'jenis_kelamin'      => [
   //          'type'            => 'enum',
   //          'constraint'      => ['l', 'p']
   //       ],
   //       'created_at'         => [
   //          'type'            => 'datetime',
   //          'null'            => true,
   //          'value'           => 'current_timestamp'
   //       ],
   //       'updated_at'         => [
   //          'type'            => 'datetime',
   //          'null'            => true,
   //          'value'           => 'current_timestamp on update current_timestamp'
   //       ],
   //       'status'             => [
   //          'type'            => 'tinyint',
   //          'default'         => 1
   //       ]
   //    ]);
   //    $this->forge->addKey('id', true);
   //    $this->forge->addUniqueKey('kelas_id_kelas');
   //    $this->forge->addUniqueKey('jurusan_id_jurusan');
   //    $this->forge->createTable('siswa', true);

   // }
   public function up()
   {
      /*
         * Siswa
         */
      $this->forge->addField([
         'id'                 => [
            'type'            => 'int',
            'constraint'      => 5
         ],
         'nisn'               => [
            'type'            => 'varchar',
            'constraint'      => 15,
         ],
         'nis'                => [
            'type'            => 'varchar',
            'constraint'      => 20,
         ],
         'nama'               => [
            'type'            => 'varchar',
            'constraint'      => 255,
            'unsigned'        => false
         ],
         'tempat_lahir'       => [
            'type'            => 'varchar',
            'constraint'      => 100,
            'null'            => true
         ],
         'tanggal_lahir'      => [
            'type'            => 'date',
            'null'            => true
         ],
         'kelas_id_kelas'     => [
            'type'            => 'tinyint',
            'null'            => true
         ],
         'jurusan_id_jurusan' => [
            'type'            => 'tinyint'
         ],
         'jenis_kelamin'      => [
            'type'            => 'enum',
            'constraint'      => ['l', 'p']
         ],
         'created_at'         => [
            'type'            => 'datetime',
            'null'            => true,
            'value'           => 'current_timestamp'
         ],
         'updated_at'         => [
            'type'            => 'datetime',
            'null'            => true,
            'value'           => 'current_timestamp on update current_timestamp'
         ],
         'status'             => [
            'type'            => 'tinyint',
            'default'         => 1
         ]
      ]);
      $this->forge->addKey('id', true);
      $this->forge->addUniqueKey('kelas_id_kelas');
      $this->forge->addUniqueKey('jurusan_id_jurusan');
      $this->forge->createTable('siswa', true);


      /*
         * Jurusan
         */
      $this->forge->addField([
         'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
         'jurusan'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
         'id_jurusan' => ['type' => 'int', 'constraint' => 1, 'null' => false],
      ]);
      $this->forge->addKey('id', true);
      $this->forge->addKey('id_jurusan');
      $this->forge->createTable('jurusan', true);
      
      
      /*
         * Kelas
         */
      $this->forge->addField([
         'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
         'kelas'      => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
         'id_kelas'   => ['type' => 'int', 'constraint' => 1, 'null' => false],
      ]);
      $this->forge->addKey('id', true);
      $this->forge->addKey('id_kelas');
      $this->forge->createTable('kelas', true);
      
   }

   //--------------------------------------------------------------------

   public function down()
   {
      // Drop siswa table
      $this->forge->dropTable('siswa', true);
      $this->forge->dropTable('jurusan', true);
      $this->forge->dropTable('kelas', true);
   }
}
