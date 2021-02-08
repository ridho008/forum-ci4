<?php namespace App\Models;

use CodeIgniter\Model;

class ReplyModel extends Model
{
   protected $table = 'reply';
   protected $primaryKey = 'id';
   protected $allowedFields = ['id_thread', 'id_user', 'isi', 'created_at', 'created_by', 'updated_at', 'updated_by'];
   protected $returnType = 'App\Entities\Reply';
   protected $useTimestamps = false;

   public function getJoin($id)
   {
      return $this->db->table('reply')
            ->select('reply.id, reply.isi, reply.created_at, user.nama, user.avatar')
            ->join('user', 'user.id = reply.id_user', 'left')
            ->where('reply.id_thread', $id)
            ->get()->getResult();
   }
}