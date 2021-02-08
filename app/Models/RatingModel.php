<?php namespace App\Models;

use CodeIgniter\Model;

class RatingModel extends Model
{
   protected $table = 'rating';
   protected $primaryKey = 'id';
   protected $allowedFields = ['id_thread', 'id_user', 'star'];
   protected $returnType = 'App\Entities\Rating';
   protected $useTimestamps = false;
   

   public function sumRating($id)
   {
      // $db = \Config\Database::connect();
      return $this->db->table('rating')
                      ->select('SUM(star) AS star')
                      ->where('id_thread', $id)
                      ->get()->getRow();
   }

   public function countRating($id)
   {
      return $this->db->table('rating')
                      ->where('id_thread', $id)
                      ->countAllResults();
   }
}