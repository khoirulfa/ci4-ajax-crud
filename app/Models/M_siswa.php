<?php  
  
namespace App\Models;  
  
use CodeIgniter\Model;  
  
class M_siswa extends Model  
{
   protected $table = "siswa";
   protected $useTimeStamps = true;
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
}