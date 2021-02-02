<?php  
  
namespace App\Models;  
  
use CodeIgniter\Model;  
  
class siswaModel extends Model  
{
   protected $table = 'siswa';
   protected $primaryKey = 'id';
   // protected $useTimeStamps = true;
   protected $allowedFields = [
      'nama', 'nisn', 'nis', 'tem_lahir', 'tan_lahir', 'kelas', 'jurusan', 'j_kelamin', 'alamat', 'pic'
   ];

   public function getSiswa($id = false)
   {
      if ($id == false) {
         return $this->findAll();
      }
      return $this->where(['id' => $id])->first();
   }

   protected $validationRules = [
      'nis'    => 'required|is_unique[siswa.nis]',
      'nisn'   => 'required|is_unique[siswa.nisn]',
      'nama'   => 'required',
   ];

   protected $validationMessages = [
      'nis' => [
         'required' => '{field} tidak boleh kosong',
         'is_unique' => '{field} sudah terdaftar'
      ],
      'nisn' => [
         'required' => '{field} tidak boleh kosong',
         'is_unique' => '{field} sudah terdaftar'
      ],
      'nama'   => [
         'required'   => '{field} tidak boleh kosong'
      ]
   ];
}