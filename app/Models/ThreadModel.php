<?php namespace App\Models;

use CodeIgniter\Model;

class ThreadModel extends Model
{
   protected $table = 'thread';
   protected $primaryKey = 'id';
   protected $allowedFields = ['judul', 'id_kategori', 'isi', 'created_at', 'created_by', 'updated_at', 'updated_by'];
   protected $returnType = 'App\Entities\Thread';
   protected $useTimestamps = false;

   public function getJoin($limit, $offset, $keyword)
   {
      return $this->db->table("thread")
      ->select("thread.id, thread.judul, kategori.kategori, user.nama")
      ->join("kategori", "thread.id_kategori = kategori.id", "left")
      ->join("user", "thread.created_by = user.id", "left")
      ->like('thread.isi', $keyword)
      ->orLike('thread.judul', $keyword)
      ->get($limit, $offset)->getResult();
   }

   public function countThread($keyword)
   {
      return $this->db->table("thread")
      ->select("thread.id, thread.judul, kategori.kategori, user.nama")
      ->join("kategori", "thread.id_kategori = kategori.id", "left")
      ->join("user", "thread.created_by = user.id", "left")
      ->like('thread.isi', $keyword)
      ->orLike('thread.judul', $keyword)
      ->countAllResults();
   }
}