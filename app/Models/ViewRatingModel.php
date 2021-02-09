<?php namespace App\Models;

use CodeIgniter\Model;

class ViewRatingModel extends Model
{
   protected $table = 'view_rating';
   protected $allowedFields = ['id_thread' ,'sum_star', 'count_star', 'rating'];
   protected $returnType = 'object';

   public function topThread()
   {
      return $this->db->table('view_rating')
                      ->select('thread.judul, view_rating.id_thread, view_rating.sub_star, view_rating.rating')
                      ->join('thread', 'thread.id = view_rating.id_thread', 'left')
                      ->orderBy('view_rating.rating', 'DESC')
                      ->orderBy('view_rating.sub_star', 'DESC')
                      ->get(10,0);
   }
}